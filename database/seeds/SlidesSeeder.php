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
                'title' => 'WORLD CLASS SUPPORT',
                'description' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',
                'image_src' => 'seeds/slides/slide-01.jpg',
                'image_title' => 'slide-01.jpg',
            ],
            [
                'title' => 'PHOTOGRAPHY CREATIVE',
                'description' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',
                'image_src' => 'seeds/slides/slide-02.jpg',
                'image_title' => 'slide-02.jpg',
            ],
        ];
        app(Slide::class)->insert($data);

        foreach (Category::all() as $category) {
            data_set($data, '*.category_id', $category->id);
            app(Slide::class)->insert($data);
        }
        if (App::environment('local')) {
            factory(Slide::class, 0)->create();
        }
    }
}
