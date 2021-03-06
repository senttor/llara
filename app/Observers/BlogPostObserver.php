<?php

namespace App\Observers;

use App\Models\BlogPost;
use Carbon\Carbon;
use Illuminate\Support\Str;

class BlogPostObserver
{
    /**
     * обработка перед созданием записи
     *
     * @param BlogPost $blogPost
     */
    public function creating(BlogPost $blogPost)
    {
        $this->setPublishedAt($blogPost);
        $this->setSlug($blogPost);
        $this->setHtml($blogPost);
        $this->setUser($blogPost);
    }

    /**
     * обработка перед обновлением записи
     *
     * @param BlogPost $blogPost
     */
    public function updating(BlogPost $blogPost)
    {
       // $blogPost->isDirty() - узнаем изменялась ли модель
        // $blogPost->isDirty('is_published') - изменялось ли конкретное поле
        //$blogPost->getAttribute() -получаем значение которое сейчас будет записано в базу
        //$blogPost->getOriginal() - значение которое было перед сохранением в базе
        $this->setPublishedAt($blogPost);

        $this->setSlug($blogPost);

    }

    /**
     * если дата публикации не установлена, то устанавливаем датупубликации на текущую
     *
     * @param BlogPost $blogPos
     */

    protected function  setPublishedAt(BlogPost $blogPost)
    {
        $needSetPublished = empty($blogPost->published_at) && $blogPost->is_published;

        if ($needSetPublished) {
            $blogPost->published_at = Carbon::now();
        }
    }

    /**
     * Если поле слаг пустое, то заполеняем его конвертацией заголовка.
     *
     * @param BlogPost $blogPos
     */

    protected function  setSlug(BlogPost $blogPost)
    {
        if (empty($blogPost->slug)) {
            $blogPost->slug = Str::slug($blogPost->title);
        }

    }

    /**
     * Утсановка значения полю  content_html относительно поля content_raw
     *
     * @param BlogPost $blogPost
     */
    protected function setHtml(BlogPost $blogPost)
    {
        if ($blogPost->isDirty('content_raw')) { // єто поле изменено? dirty

            $blogPost->content_html = $blogPost->content_raw;
        }
    }

    /**
     * Если не указан user_id, то утсанавливаем пользователя по умолчанию
     *
     * @param BlogPost $blogPost
     */

    protected function setUser(BlogPost $blogPost)
    {
        $blogPost->user_id = auth()->id() ?? BlogPost::UNKNOWN_USER;
    }
    /**
     * Handle the blog post "created" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function created(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the blog post "updated" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function updated(BlogPost $blogPost)
    {
        //
    }

    /**
     * @param BlogPost $blogPost
     */
    public function deleting(BlogPost $blogPost)
    {
      //  dd(__METHOD__, $blogPost);
      //  return false; // ничего не произойдет
    }
    /**
     * Handle the blog post "deleted" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function deleted(BlogPost $blogPost)
    {
        //  dd(__METHOD__, $blogPost);
    }

    /**
     * Handle the blog post "restored" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function restored(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the blog post "force deleted" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function forceDeleted(BlogPost $blogPost)
    {
        //
    }
}
