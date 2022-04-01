<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JournalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'hackaton',
            'sponsoring',
            'sortie',
            'projet',

        ];

        DB::statement('delete from journals');
        foreach($names as $name):
            DB::table('journals')->insert([
                'name' => $name,

            ]);
        endforeach;
    }
}
