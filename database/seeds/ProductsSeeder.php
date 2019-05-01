<?php

use Illuminate\Database\Seeder;
use App\Eloquent\Product;
use App\Eloquent\Category;
use Carbon\Carbon;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();
        $categories = app(Category::class)->where('type', 'product')->get(['id']);
        foreach ($categories as $item) {
            $data = [
                [
                    'category_id' => $item->id,
                    'name' => 'LIVINGROOM',
                    'intro' => 'Bring plans to life with our render service available for a range of plans and designs.',
                    'description' => 'Often the first room you walk into, a living area is a popular place for families and friends to gather, watch TV or just relax. Show buyers how the space can work by adding a virtual couch with chaise, a TV with beautiful view on the screen and a trendy coffee table. Seeing how a space can work will help buyers imagine themselves living in the home.',
                    'image_src' => 'seeds/1.jpg',
                    'image_title' => 'seeds/1.jpg',
                    'image_ba_title' => 'seeds/prod1.jpg',
                    'image_ba_src' => 'seeds/prod1.jpg',
                    'price' => 'AU$12.00',
                    'is_home' => true,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'category_id' => $item->id,
                    'name' => 'BEDROOM',
                    'intro' => 'Our team can add furniture to real estate photography to show potential buyers just how versatile the space is.',
                    'description' => 'Bedrooms without furniture can look rather drab and much smaller than they really are. Adding a bed, side table and chest of drawers can demonstrate just how big the room is and add life to the previously lifeless space.',
                    'image_src' => 'seeds/2.jpg',
                    'image_title' => 'seeds/2.jpg',
                    'image_ba_title' => 'seeds/prod2.jpg',
                    'image_ba_src' => 'seeds/prod3.jpg',
                    'price' => 'AU$21.00',
                    'is_home' => true,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'category_id' => $item->id,
                    'name' => 'KITCHEN',
                    'intro' => 'Clearly showcase your listing to potential buyers with an online floorplan available in a range of 2D and 3D options.',
                    'description' => 'The heart of the home, take advantage of the opportunity to declutter and restyle the kitchen to attract more buyers. A clean kitchen with modern styling will help a buyer imagine spending time with their family, cooking, eating and bonding in the central room of the home.',
                    'image_src' => 'seeds/3.jpg',
                    'image_title' => 'seeds/3.jpg',
                    'image_ba_title' => 'seeds/prod3.jpg',
                    'image_ba_src' => 'seeds/prod3.jpg',
                    'price' => 'AU$43.00',
                    'is_home' => true,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'category_id' => $item->id,
                    'name' => 'OUTDOOR',
                    'intro' => 'Our photo retouching service will take your exterior property photo from drab to fab by adding a beautiful dusk sky.',
                    'description' => 'Great curb appeal is essential when selling a home and it’s important in photos, too. Take this chance to show buyers just how cute a three-piece garden setting can be in the front yard or add a timber bench near the flowers to show how the front yard can be utilised.',
                    'image_src' => 'seeds/4.jpg',
                    'image_title' => 'seeds/4.jpg',
                    'image_ba_title' => 'seeds/prod4.jpg',
                    'image_ba_src' => 'seeds/prod4.jpg',
                    'price' => 'AU$56.00',
                    'is_home' => true,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ];
            Product::insert($data);
        }
    }
}
