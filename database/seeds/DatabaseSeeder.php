<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(BlogCategoriesTableSeeder::class);
      //  $this->call(CommentsTableSeeder::class);
        factory(\App\Models\BlogPost::class, 100)->create(); // созд ать посты 100 штук
    }
}
