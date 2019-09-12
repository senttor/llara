<?php  //phpinfo();
/*$i = 5;
for ($k = 1 ; $k < 20 ; $k++) {
    echo $k;

}*/

?>
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Test project</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Test project on Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
        <hr />

        <p><strong>Создаем сиды</strong></p>

        <pre><code>php artisan make:seeder UsersTableSeeder
</code></pre>

        <hr />

        <p><strong>column DB types</strong> <a href="https://laravel.com/docs/5.0/schema">link docs</a></p>

        <hr />

        <h5 id="unsigned">unsigned</h5>

        <p>от нуля и выше</p>

        <hr />

        <p><strong>nullable</strong> - допускает значение NULL - поле можно не заполнять</p>

        <hr />

        <p><code>--create=</code> указание того, что нужно создать новую таблицу ,а не добавить в существующую
            <code>--table=</code></p>

        <hr />

        <p><strong>make model</strong></p>

        <p><code>php artisan make:model Flight</code></p>

        <p><em>create model with migration</em></p>

        <p><code>php artisan make:model Flight --migration</code></p>

        <p>or</p>

        <p><code>php artisan make:model Flight --migration</code></p>

        <p><em>example</em>
            <code>php artisan make:model Models/BlogCategory -m</code> </p>

        <h2 id="supmodelsblog_categorysup"><sup>создается папка Models и миграция blog_category</sup></h2>

        <h5 id="createdb">create db</h5>

        <pre><code class="mysql language-mysql">CREATE SCHEMA `laratest` DEFAULT CHARACTER SET utf8mb4 ;
</code></pre>

        <p><strong>Laravel uses the utf8mb4</strong></p>

        <pre><code class="mysql language-mysql">CREATE SCHEMA `laravel` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
</code></pre>

        <hr />

        <p><strong>laravel-debugbar</strong>
            //https://github.com/barryvdh/laravel-debugbar</p>

        <p>//composer require barryvdh/laravel-debugbar --dev</p>

        <hr />

        <blockquote>
            <p><strong>laravel plugin</strong>  ==> with "Laravel IDE Helper Generator"</p>
        </blockquote>

        <p>//<code>composer json</code>:
            //add "require-dev": { "barryvdh/laravel-ide-helper": "^2.6",</p>

        <p>//add in section "scripts"  info from man..</p>

        <p>//<a href="https://github.com/barryvdh/laravel-ide-helper">https://github.com/barryvdh/laravel-ide-helper</a></p>

        <p>//php artisan ide-helper:generate</p>

        <p>//add to gitignore -> <em>ide</em>helper.php  /  .phpstorm.meta.php</p>

        <hr />

        <p>//система аунтификации
            php artisan make:auth</p>

        <hr />

        <pre><code class="bash language-bash"> sudo chmod -R 777  storage &amp;&amp; chmod -R 777 bootstarp/cache
</code></pre>

        <hr />

        <p>[]: https://laravel.com/docs/5.0/schema</p>
    </body>
</html>
