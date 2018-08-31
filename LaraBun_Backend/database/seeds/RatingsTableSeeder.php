<?php

use Illuminate\Database\Seeder;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ratings')->delete();
        
        DB::table('ratings')->insert([
            'user_id' => '1',
            'bun_id' => '1',
            'rating' => '1'
        ]);
    }
}
