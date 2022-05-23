<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Website;

class WebsiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        // Let's make sure everyone has the same password and 
        // let's hash it before the loop, or else our seeder 
        // will be too slow.

        Website::create([
            'website_url' => 'https://test.com',
            'website_title' => 'Test Website',

        ]);

        // And now let's generate a few dozen users for our app:
        for ($i = 0; $i < 5; $i++) {
            Website::create([
                'website_title' => $faker->name,
                'website_url' => $faker->url,
            ]);
        }
    }
}