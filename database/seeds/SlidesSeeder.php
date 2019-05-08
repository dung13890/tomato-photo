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
                'title' => 'World class support',
                'description' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',
                'image_src' => 'seeds/slides/slide-01.jpg',
                'image_title' => 'slide-01.jpg',
                'category_id' => 0,
            ],
            [
                'title' => 'Photograpy creative',
                'description' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',
                'image_src' => 'seeds/slides/slide-02.jpg',
                'image_title' => 'slide-02.jpg',
                'category_id' => 0,
            ],
            [
                'title' => 'Awesome services',
                'description' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',
                'image_src' => 'seeds/slides/slide-03.jpg',
                'image_title' => 'slide-03.jpg',
                'category_id' => 0,
            ],
            [
                'title' => '100% complete',
                'description' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',
                'image_src' => 'seeds/slides/slide-04.jpg',
                'image_title' => 'slide-04.jpg',
                'category_id' => 0,
            ],
            [
                'title' => 'About slide 01',
                'description' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.',
                'image_src' => 'seeds/about-us/about.jpg',
                'image_title' => 'slide-about.jpg',
                'category_id' => -1,
            ],
            [
                'title' => 'About slide 02',
                'description' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.',
                'image_src' => 'seeds/about-us/slide-01.jpg',
                'image_title' => 'slide-about-01.jpg',
                'category_id' => -1,
            ],
            [
                'title' => 'About slide 03',
                'description' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.',
                'image_src' => 'seeds/about-us/slide-02.jpg',
                'image_title' => 'slide-about-02.jpg',
                'category_id' => -1,
            ],
        ];

        app(Slide::class)->insert($data);

        if (App::environment('local')) {
            factory(Slide::class, 0)->create();
        }
    }
}
