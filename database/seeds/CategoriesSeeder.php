<?php

use Illuminate\Database\Seeder;
use App\Eloquent\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        $data = [
            'Photo Editing',
            'Photo Enhancement',
            'Day To Dusk',
            'Item Removal',
            'Panorama Stitching',
            'Floor Plan',
            'Virtual Furniture',
        ];
        foreach ($data as $key => $name) {
            $index = $key+1;
            Category::create([
                'name' => $name,
                'image_src' => "seeds/p-0{$index}.jpg",
                'ceo_title' => 'WHY FILL YOUR EMPTY LISTING WITH VIRTUAL FURNITURE?',
                'description' => 'A homeowner or a realtor can get possible leads in selling their real estate by making an attractive first impression. This is why it is definitely crucial for property agencies and homeowners who are selling their properties to make sure that they are making a massive good impression to their prospective buyers. How can they do that? There is a lot of ways and online is the best platform for that. Online is where most of the businesses are happening today. It is already considered to be the biggest marketplace across the globe due to its broad coverage and influence. It is the perfect place for everyone to look for products and services. This is why creating an impressive online marketing campaign will surely invite more buyers, resulting in higher sales and we can help you with that. So, if you are a realtor for homes for sale, you should have your marketing campaign online. The latter comes in various methods and types. However, in property selling such as houses and apartments, virtual home staging is the most suited method. This is the most effective way for realtors and homeowners in selling their properties online. This method creates an appealing view of the properties, making it saleable. Our company provides the most updated and highly-optimized home staging that includes designing virtual furniture to create a more appealing property and space. What do you mean by virtual staging a house? It is a reliable step by step procedure in creating a pleasant and well-presented display of a house property. This is made possible by the incomparable technological advancement in home staging strategies. It is known to be more economical and effective compared to the traditional staging of vacant homes. In short, it is basically an optimized home staging technique to entice buyers. We can help you in building that perfect virtual house staging with the use of stunning and luxurious virtual furniture. In connection to this, we summarized some of the most effective ways that our virtual staging properties method can help realtors and homeowners like you in getting your properties and houses sold.',
                'collection_title' => 'Our gallery products',
                'collection_intro' => 'Our team can add furniture to real estate photography to show potential buyers just how versatile the space is.',
            ]);
        }
        if (App::environment('local')) {
            $categories = factory(Category::class, 20)->create();
        }
    }
}
