<?php

use Illuminate\Database\Seeder;

class EmployerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employers')->insert([
            'id' => '1',
            'company_name' => 'Group54',
            'email' => 's123456@student.rmit.edu.au',
            'password' => bcrypt('password'),
            'contact_phone' => '1234-5478',
            'contact_email' => 'Group54@gmail.com',
            'state' => 'VIC',
            'city' => 'Melbourne',
        ]);

        DB::table('employers')->insert([
            'id' => '2',
            'company_name' => 'SilentRunner',
            'email' => 'group54@gmail.com',
            'password' => bcrypt('password'),
            'contact_phone' => '9010-7020',
            'contact_email' => 'group54@gmail.com',
            'state' => 'SA',
            'city' => 'Adelaide',
        ]);
    }
}
