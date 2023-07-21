<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as FakerFactory;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $url_city = "https://api.rajaongkir.com/starter/city?key=9523a5543d2b75e44430e34e0e8c8afa";
    $json_str = file_get_contents($url_city);
    $json_obj = json_decode($json_str);
    $cities = [];
    foreach($json_obj->rajaongkir->results as $city){
        $cities[] = [
            'id' => $city->city_id,
            'province_id' => $city->province_id,
            'city' => $city->city_name,
            'type' => $city->type,
            'postal_code' => $city->postal_code,
        ];
    }
    DB::table('cities')->insert($cities);

    }
}
