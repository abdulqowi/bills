<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;
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
        User::create([
            'name'      => 'Kasir Indomaret',
            'email'     => 'kasir@mail.com',
            'password'  => Hash::make('12345678'),
        ]);

        User::create([
            'name'      => 'Goblo',
            'email'     => 'superadmin@role.test',
            'password'  => Hash::make('admin'),
        ]);

        $faker = \Faker\Factory::create();  
        for($i = 0; $i < 51; $i++) {
        $id = User::create([
            'name'      => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'password' => Hash::make('admin')
        ]);
        Customer::create([
            'user_id' => $id->id,
            'name' => $faker->name,
        ]);
        
        }
    }
}
