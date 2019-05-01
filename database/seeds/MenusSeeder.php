<?php

use Illuminate\Database\Seeder;
use App\Eloquent\Menu;

class MenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::truncate();
        app(Menu::class)->insert([
            [
                'name' => 'home',
                'url' => '/',
                'sort' => 0,
                'locked' => true,
            ],
            [
                'name' => 'blog',
                'url' => parse_url(route('blog'), PHP_URL_PATH),
                'sort' => 1,
                'locked' => true,
            ],
            [
                'name' => 'about',
                'url' => parse_url(route('about'), PHP_URL_PATH),
                'sort' => 2,
                'locked' => true,
            ],
            [
                'name' => 'contact',
                'url' => parse_url(route('contact'), PHP_URL_PATH),
                'sort' => 3,
                'locked' => true,
            ],

        ]);
        if (App::environment('local')) {
            factory(Menu::class, 10)->create();
        }
    }
}
