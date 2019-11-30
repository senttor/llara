 Мутаторы
 
 ```php
class User extends Model

 public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = strtolower($value);
    }
```
 
 ---
 
 > protected $casts  
 
 преобразовывают(приводят данные столбцов таблицы к требуемому формату)

 ```php
protected $casts = [
    'options' => 'array',
  ];
```
 
 ---
 
Accessors
 
> public function getParentTitleAttribute()

методы преобразовывающие данные полученные из бд  

 ---
 
Observers - Наблюдатели

```php
php artisan make:observer BlogPostObserver --model=Models/BlogPost

php artisan make:observer BlogCategoryObserver --model=Models/BlogCategory

```


собщить о том что данные классы будут слидить за событиями модели

добавляем след строки:
```php
app/Providers/AppServiceProvider.php >>  boot() method

+   BlogPost::observe(BlogPostObserver::class);
+   BlogCategory::observe(BlogCategoryObserver::class);

```

 
 ---
 
 **relationship**
 
 ---
 
 **свой request**
```php
php artisan make:request BlogCategoryUpdateRequest

php artisan make:request BlogPostUpdateRequest

```
 
  ---

**collect** 

 создает новый экземпляр коллеции
 
 ---
**middleware** - посредники
 
 ---

**генерация роутов и шаблонов для аутинтификации**
```
php artisan make:auth
```
 
 ---

**контроллеры  приложения**

_контролеры создаются до роутов_

- базовый
```
//base blog`s controller
php artisan make:controller Blog/BaseController
```
- котролер статей
```
 php artisan make:controller Blog/PostController
```

 
 ---
 
**Создать контролер с методами ресурса ...index(), create(), store(), show(), edit(), update(), destroy().**
```
REST
php artisan make:controller RestTestController  --resource

php artisan make:controller Blog/Admin/CategoryController --resource

php artisan make:controller Blog/Admin/PostController -r

```
 
 
 ---
 
 
**список активных роутов**
```
php artisan route:list
```
 
  ---
 
 
**ускоренная загрузка композер**

```php
composer global require hirak/prestissimo
depend sudo apt-get install php7.2-curl
```
 
  ---
 
 
 **psysh**
 
 Laravel Tinker: PsySH on Steroids
 ```
php artisan tinker
------------------
example:
show request
doc request
```
 
  ---
 
 
 ###### полное перестроенние БД oткат изменений
 
 ```php
php artisan migrate:refresh --seed
php artisan migrate:fresh

php artisan migrate:reset

```
 
 ---
 
 **Добавление фабрики**
 ```
php artisan make:factory BlogPostFactory --model="App\Models\BlogPost"
```
 
  ---
 
 **Helpers**
 
 ``
 https://laravel.com/docs/5.8/helpers
 ``
  
  ---
 
 **Запускаем сиды**
```
php artisan db:seed  // По умолчанию она выполнит класс DatabaseSeeder method run()  
php artisan db:seed --class=UsersTableSeeder
```

 
 ---

**Создаем сиды**

```
php artisan make:seeder UsersTableSeeder
php artisan make:seeder BlogCategoriesTableSeeder
```
 
---
 
 **column DB types** [link docs](https://laravel.com/docs/5.0/schema)
 
 ---

##### unsigned
от нуля и выше
 
 ---

**nullable** - допускает значение NULL - поле можно не заполнять

---

`--create=` указание того, что нужно создать новую таблицу ,а не добавить в существующую
`--table=`

---
**make model**

`php artisan make:model Flight`

_create model with migration_

`php artisan make:model Flight --migration`

or

`php artisan make:model Flight --migration`

_example_:

`php artisan make:model Models/BlogCategory -m`
 
создается папка Models и миграция blog_category

------------------------------------------------------------
##### create db 
```mysql
CREATE SCHEMA `laratest` DEFAULT CHARACTER SET utf8mb4 ;
```
**Laravel uses the utf8mb4**
```mysql
CREATE SCHEMA `laravel` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```
------------------------------------------------------------

**laravel-debugbar**
 //https://github.com/barryvdh/laravel-debugbar
 
//composer require barryvdh/laravel-debugbar --dev


------------------------------------------------------------
>__laravel plugin__  ==> with "Laravel IDE Helper Generator"

//`composer json`:
//add "require-dev": { "barryvdh/laravel-ide-helper": "^2.6",
       
//add in section "scripts"  info from man..


//[https://github.com/barryvdh/laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper)

//php artisan ide-helper:generate

//add to gitignore -> _ide_helper.php  /  .phpstorm.meta.php



------------------------------------------------------------
//система аунтификации
 php artisan make:auth
 ------------------------------------------------------------
```bash
 sudo chmod -R 777  storage && chmod -R 777 bootstarp/cache
```
------------------------------------------------------------


[]: https://laravel.com/docs/5.0/schema