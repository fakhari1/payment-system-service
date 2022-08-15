<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use App\Models\User;
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

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com'
        ]);

        User::factory()->create([
            'name' => 'کاربر 1',
            'email' => 'user1@test.com'
        ]);

        User::factory()->create([
            'name' => 'کاربر 2',
            'email' => 'user2@test.com'
        ]);

        User::factory()->create([
            'name' => 'کاربر 3',
            'email' => 'user3@test.com'
        ]);

        User::factory()->create([
            'name' => 'کاربر 4',
            'email' => 'user4@test.com'
        ]);

        User::factory()->create([
            'name' => 'کاربر 5',
            'email' => 'user5@test.com'
        ]);

        User::factory()->create([
            'name' => 'کاربر 6',
            'email' => 'user6@test.com'
        ]);

        User::factory()->create([
            'name' => 'کاربر 7',
            'email' => 'user7@test.com'
        ]);

        User::factory()->create([
            'name' => 'کاربر 8',
            'email' => 'user8@test.com'
        ]);

        User::factory()->create([
            'name' => 'کاربر 9',
            'email' => 'user9@test.com'
        ]);

        User::factory()->create([
            'name' => 'کاربر 10',
            'email' => 'user10@test.com'
        ]);

        Product::factory(10)->create();


    }
}
