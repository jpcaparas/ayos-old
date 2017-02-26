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
        // Required data
        $this->call(EstablishmentTypesTableSeeder::class);
        $this->call(EstablishmentsDataTypeRowTableSeeder::class);

        // Demo data (remove in production)
        $this->call(Demo\EstablishmentsTableSeeder::class);
    }
}
