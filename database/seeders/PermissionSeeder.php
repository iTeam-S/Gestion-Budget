<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['null', 0],
            ['lire', 1],
            ['ecrire', 2],

        ];


        foreach($permissions as $permission):
            DB::table('permissions')->insert([
                'name' => $permission[0],
                'value' => $permission[1],
        
            ]);

        endforeach;
    }
}
