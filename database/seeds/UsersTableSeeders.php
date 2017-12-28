<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->get();
        if ($user->count() == 0) {
            DB::table('users')->insert([
                'name' => 'scopeSky First Admin',
                'email' => 'ScopeSkyAdmin@zaincash.iq',
                'password' => bcrypt('HaZC#$@'),
            ]);
        }else{
            return null;
        }
    }
}
