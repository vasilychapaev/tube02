<?php

use App\Models\Video;
use App\User;
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
        factory(App\User::class, 50)->create()->each(function ($user) {
            $user->posts()->save(factory(App\Post::class)->make());
        });
        factory(User::class, 10)->create()->each(function ($user){
            $user->videos()->saveMany(
                factory(Video::class)->make()
            );

        });
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => 'vasilychapaev',
            'email' => 'vasilychapaev@gmail.com',
            'password' => bcrypt('123123')
        ]);

    }
}
