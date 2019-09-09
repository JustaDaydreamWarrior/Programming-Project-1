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
            'name' => 'Group54',
            'email' => 's123456@student.rmit.edu.au',
            'password' => bcrypt('password'),
            'contact-phone' => '1234-5478',
            'contact-email' => 'Group54@gmail.com',
            'state' => 'VIC',
            'city' => 'Melbourne',
        ]);

        DB::table('employers')->insert([
            'id' => '2',
            'name' => 'Techadon',
            'email' => 's123456@student.rmit.edu.au',
            'password' => bcrypt('password'),
            'contact-phone' => '9010-7020',
            'contact-email' => 'Group54@gmail.com',
            'state' => 'SA',
            'city' => 'Adelaide',
        ]);
    }
}
