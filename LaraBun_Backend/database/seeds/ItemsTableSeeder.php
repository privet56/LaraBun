<?php

use Illuminate\Database\Seeder;
use App\Item;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->delete();
        $json = File::get("database/data-sample/items.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            Item::create(array(
                'id' => $obj->id,
                'res' => $obj->res,
                'name' => $obj->name,
                'bun_id' => $obj->bun_id
            ));
        }
    }
}
