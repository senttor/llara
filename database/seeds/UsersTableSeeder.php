<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'name'      => 'Автор не известен',
                'email'     => 'author_unknown@tt.net',
                'password'  =>  bcrypt(str_random(16)),
            ],
            [
                'name'      => 'Автор Известен',
                'email'     => 'author1@xxt.t',
                'password'  =>  bcrypt('123123'),
            ],
        ];

        DB::table('users')-> insert($data);
    }
}
