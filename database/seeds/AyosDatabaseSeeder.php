<?php

use Illuminate\Database\Seeder;

class AyosDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Establishments
        $this->call(EstablishmentTypesTableSeeder::class);
        $this->call(EstablishmentsDataTypeRowTableSeeder::class);
    }
}
