<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = DB::table('groups')->select('id')->where('name', '=', 'administrateur')->get();
        $admin_id = $admin[0]->id;

        $lead = DB::table('groups')->select('id')->where('name', '=', 'lead')->get();
        $lead_id = $lead[0]->id;

        $user = DB::table('groups')->select('id')->where('name', '=', 'utilisateur')->get();
        $user_id = $user[0]->id;

        DB::table('users')->insert([
            [
            'name' => 'admin',
            'email' => 'admin@iteams.mg',
            'password' => Hash::make('secret'),
            'group_id' => $admin_id,
            ],
            [
            'name' => 'lead',
            'email' => 'lead@iteams.mg',
            'password' => Hash::make('secret'),
            'group_id' => $lead_id,
            ],
            [
            'name' => 'utilisateur',
            'email' => 'utilisateur@iteams.mg',
            'password' => Hash::make('secret'),
            'group_id' => $user_id,
            ],
        ]);
    }
}
