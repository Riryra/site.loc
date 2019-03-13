<?php

use Illuminate\Database\Seeder;

class add_admin_user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $pass = (new \App\Users())->generatePassword('111');

        \Illuminate\Support\Facades\DB::table('users')->insert([
            'username' => 'Main Admin',
            'age' => '99',
            'email' => 'info@admin.com',
            'password' => $pass,
            'type' => \App\Users::TYPE_ADMIN
        ]);
    }
}
