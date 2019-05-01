<?php

use Illuminate\Database\Seeder;
use App\Eloquent\Slide;
use App\Eloquent\Category;

class SlidesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slide::truncate();
        $data = [
            [
                'description' => 'WORLD CLASS SUPPORT',
                'image_src' => 'seeds/slider_1.jpeg',
                'image_title' => 'slider_1.jpeg',
            ],
            [
                'description' => 'PHOTOGRAPHY CREATIVE',
                'image_src' => 'seeds/slider_2.jpeg',
                'image_title' => 'slider_2.jpeg',
            ],
            [
                'description' => 'HELLO WORLD! CRAZY',
                'image_src' => 'seeds/slider_3.jpeg',
                'image_title' => 'slider_3.jpeg',
            ],
            [
                'description' => 'WORLD CLASS COMBINATION',
                'image_src' => 'seeds/slider_4.jpeg',
                'image_title' => 'slider_4.jpeg',
            ],
        ];
        app(Slide::class)->insert($data);

        foreach (Category::all() as $category) {
            data_set($data, '*.category_id', $category->id);
            app(Slide::class)->insert($data);
        }
        if (App::environment('local')) {
            factory(Slide::class, 10)->create();
        }
    }
}
