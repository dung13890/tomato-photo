<?php

use Illuminate\Database\Seeder;
use App\Eloquent\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $user = app(User::class)->create([
            'username' => 'admin',
            'name' => 'Admin',
            'email' => 'admin@we-edit.com',
            'password' => 'realty-edits@123',
        ]);

        if (env('APP_ENV') == 'local' || env('APP_ENV') == 'dev') {
            factory(User::class, 50)->create();
        }
    }
}
