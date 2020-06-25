<?php

use Illuminate\Database\Seeder;

class PoiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $times = 1000;
        for ($i=0; $i<$times; $i++){
            DB::table('poi')->insert([
                'name' => Str::random(10),
                'description' => Str::random(20),
                'x' => mt_rand(-180, 180),
                'y' => mt_rand(-90, 90),
                'service_id' => rand(1, 10),
                /*
                'x' => 42+(mt_rand(334862, 373855)/1000000),
                'y' => 13+(mt_rand(313979, 378465)/1000000),
                'service_id' => $i+1,
                */
            ]);
        }
    }
}
