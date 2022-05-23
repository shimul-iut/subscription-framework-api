<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subscriber;

class SubscriberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       

        // And now let's generate a few dozen users for our app:
        for ($i = 1; $i < 5; $i++) {
            Subscriber::create([
                'website_id' => $i,
                'user_id' => $i,
            ]);
        }
    }
}
