<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Super Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456789'),
                'mobile' => '8056805606',
                'role' => 'Super Admin',
                'status' => '1',               
                'gender' => 'Female',              
                'dob' => '1988-01-08',
                'created_at' => '2023-10-27 15:26:08',
                'updated_at' => '2023-10-27 15:26:08',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Asokan',
                'email' => 'kasokan@gmail.com',
                'password' => Hash::make('123456789'),
                'mobile' => '9448710150',
                'role' => 'Tenant',
                'status' => '1',              
                'gender' => 'Male',              
                'dob' => '1962-01-12',
                'created_at' => '2023-10-27 15:26:08',
                'updated_at' => '2023-10-27 15:26:08',
            )
        ));
    }
}
