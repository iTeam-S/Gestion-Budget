<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $groups = [
            0 => [
                'name'=> 'utilisateur',
                'role'=> 'lecture seule',
                'permission'=> 0,
            ],
            1 => [
                'name'=> 'lead',
                'role'=> 'lecture et modification à valider',
                'permission'=> 1,
            ],
            2 => [
                'name'=> 'administrateur',
                'role'=> 'lecture et modification décisive',
                'permission'=> 2,
            ],
        ];

        DB::statement('delete from `'.env("DB_DATABASE").'`.groups;');
        foreach($groups as $group):
            DB::table('groups')->insert([
                'name' => $group['name'],
                'role' => $group['role'],
                'permission' => $group['permission'],

            ]);
        endforeach;
            
    }
}
