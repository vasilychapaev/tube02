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

        factory(User::class, 10)->create()->each(function ($user){
            $user->videos()->saveMany(
                factory(Video::class, rand(1, 10))->make()
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
