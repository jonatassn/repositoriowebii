<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::connection()->getPdo()->exec("drop view if exists registro_completo; create view registro_completo as select * from entries natural join especimens;");
    }
}
