<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use App\Models\BusinessInformation;
use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Role::factory()->create([
            'name' => 'Super Admin',
            'news_access' => true,
            'menu_access' => true,
            'about_us_access' => true,
            'users_access' => true,
            'slider_gallery_access' => true,
            'gallery_access' => true,
            'contact_access' => true,
            'business_information_access' => true,
        ]);

        BusinessInformation::factory()->create();

        foreach (['top', 'middle', 'bottom'] as $position) {
            AboutUs::factory()->create([
                'position' => $position,
                'photo_left' => fake()->imageUrl(),
                'photo_right' => fake()->optional()->imageUrl(),
                'content' => fake()->paragraphs(3, true),
                'title' => fake()->sentence(),
            ]);
        }

        User::factory()->create([
            'name' => 'Test User',
            'password' => bcrypt('12345'),
            'role_id' => 1,
            'email' => 'nabildzikrika@gmail.com',
        ]);
    }
}
