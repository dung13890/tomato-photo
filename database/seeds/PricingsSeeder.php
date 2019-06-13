<?php

use Illuminate\Database\Seeder;
use App\Eloquent\Pricing;
use App\Eloquent\Config;

class PricingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app(Config::class)->whereIn('key', ['pricing_header', 'pricing_title'])->delete();
        app(Config::class)->create([
            'key' => 'pricing_header',
            'value' => ['PHOTO EDITING PRICING'],
        ]);
        app(Config::class)->create([
            'key' => 'pricing_title',
            'value' => ['Adjusting brightest and contrast, highlighting features and lightening shadows.'],
        ]);
        Pricing::truncate();
        Pricing::insert([
            [
                'icon' => 'fa fa-pencil',
                'title' => 'DAY TO NIGHT CONVERSION',
                'price' => 'From 5.0$',
                'description' => 'Adjusting brightest and contrast, highlighting features and lightening shadows.
Replacing outdoor dusk sky.
Turning on interior/exterior lighting and pool/garden lights.
Adding fire to fireplace, moons and stars.
Up to 12-24hrs Image Delivery',
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fa fa-lightbulb-o',
                'title' => 'PHOTO EDITING',
                'price' => 'From 7.0$',
                'description' => 'Free test
Noise reduction
White balance, contrast, exposure, lens correction, color adjustments.
Removal of Camera Flashes
Removal of Minor Reflections
Resizing, cropping and removing background.
Up to 12-24hrs Image Delivery',
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fa fa-diamond',
                'title' => 'RETOUCHING',
                'price' => 'From  10.0$',
                'description' => 'Color correction.
Brightest/Contract Adjustment.
Remove small spots, camera flashes, dust, glare, reflection…
Add green grass, trees, and small objects like lamp, chair or table…
Complete details for unfinished property.
Up to 12-24hrs Image Delivery',
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
