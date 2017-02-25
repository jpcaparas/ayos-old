<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EstablishmentTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        $establishmentTypes = [
            [
                ['reference' => 'food', 'name' => 'Restaurant / food business', 'created_at' => $now, 'updated_at' => $now],
                ['reference' => 'legal', 'name' => 'Legal / consultancy', 'created_at' => $now, 'updated_at' => $now],
                ['reference' => 'education', 'name' => 'Education / learning', 'created_at' => $now, 'updated_at' => $now],
                ['reference' => 'amusement', 'name' => 'Amusement', 'created_at' => $now, 'updated_at' => $now],
                ['reference' => 'info', 'name' => 'Information centre / Helpdesk', 'created_at' => $now, 'updated_at' => $now]
            ]
        ];

        foreach($establishmentTypes as $type) {
            \DB::table('establishment_types')
                ->insert($type);
        }
    }
}
