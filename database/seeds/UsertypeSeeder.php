<?php

use Illuminate\Database\Seeder;

class UsertypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if (!DB::table('usertypes')->count()) {
            DB::unprepared(file_get_contents(__DIR__ . '/sql/usertypes.sql'));
        }
    }
}
