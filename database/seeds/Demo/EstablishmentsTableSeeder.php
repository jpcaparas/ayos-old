<?php

namespace Demo;

use Carbon\Carbon;
use DB;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class EstablishmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        $faker = Faker::create();
        $table = 'establishments';
        $recordCount = 200;

        for ($i = 0; $i < $recordCount; $i++) {
            DB::table($table)
                ->insert([
                    'name' => $faker->company,
                    'address' => $faker->address,
                    'phone' => $faker->phoneNumber,
                    'email' => $faker->email,
                    'url' => $faker->url,
                    'is_active' => $faker->boolean(),
                    'description' => $faker->paragraph,
                    'latitude' => $faker->latitude,
                    'longitude' => $faker->longitude,
                    'city' => $faker->city,
                    'region' => $faker->city,
                    'suburb' => $faker->city,
                    'postcode' => $faker->postcode,
                    'establishment_type_id' => mt_rand(1,5),
                    'founded_at' => $faker->dateTime,
                    'created_at' => $now,
                    'updated_at' => $now,
                 ]);
        }
    }
}
