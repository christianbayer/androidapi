<?php

use App\Tracker;
use Illuminate\Database\Seeder;

class TrackersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tracker::create([
            'user_id' => 1,
        ]);
    }
}
