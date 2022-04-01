<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('delete from users');
        DB::statement('delete from `'.env("DB_DATABASE").'`.groups;');
        DB::statement('delete from permissions;');
        DB::statement('delete from accounts;');
        DB::statement('delete from journals');




        $this->call([
            PermissionSeeder::class,
            GroupSeeder::class,
            UserSeeder::class,
            AccountSeeder::class,
            JournalSeeder::class,

        ]);
    }
}
