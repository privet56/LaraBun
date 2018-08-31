<?php

use Illuminate\Database\Seeder;
use App\Bun;

class BunsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('buns')->delete();
        $json = File::get("database/data-sample/buns.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            Bun::create(array(
                'id' => $obj->id,
                'name' => $obj->name,
                'desc' => $obj->desc,
                'picture'=> $obj->picture,
                'user_id' => $obj->user_id
            ));
        }
    }
}
