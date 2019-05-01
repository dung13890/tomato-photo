<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(PostsSeeder::class);
        $this->call(SlidesSeeder::class);
        $this->call(MenusSeeder::class);
        $this->call(ContactsSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(ConfigsSeeder::class);
    }
}
