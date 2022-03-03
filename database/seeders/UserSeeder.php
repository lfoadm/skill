<?php

namespace Database\Seeders;

use App\Models\Admin\Driver;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Jetstream\Jetstream;

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
            'name' => 'Leandro Oliveira',
            'email' => 'lfoadm@icloud.com',
            'password' => bcrypt('12345678'),
            'phone' => '(34) 99974-9344',
            'status' => 'actived',
            'type' => 'admin',
        ])->assignRole('superadmin');

        User::create([
            'name' => 'Igor Medeiros',
            'email' => 'igor@medeiros.com',
            'password' => bcrypt('12345678'),
            'phone' => '(34) 99887-7000',
            'status' => 'actived',
            'type' => 'manager',
        ])->assignRole('gerente');

        User::create([
            'name' => 'Kellen Borges',
            'email' => 'kellen@medeiros.com',
            'password' => bcrypt('12345678'),
            'phone' => '(34) 99999-7000',
            'status' => 'actived',
            'type' => 'manager',
        ])->assignRole('secretaria');

        $user1 = User::create([
            'name' => 'Motorista 01 Medeiros',
            'email' => 'motorista01@medeiros.com',
            'password' => bcrypt('12345678'),
            'phone' => '(34) 99999-7777',
            'status' => 'actived',
            'type' => 'driver',
        ])->assignRole('motorista');
            Driver::create([
                'user_id' => $user1->id,
            ]);

        $user2 = User::create([
            'name' => 'Motorista 02 Medeiros',
            'email' => 'motorista02@medeiros.com',
            'password' => bcrypt('12345678'),
            'phone' => '(34) 92222-2222',
            'status' => 'actived',
            'type' => 'driver',
        ])->assignRole('motorista');
            Driver::create([
                'user_id' => $user2->id,
            ]);

        $user3 = User::create([
            'name' => 'Motorista 03 Medeiros',
            'email' => 'motorista03@medeiros.com',
            'password' => bcrypt('12345678'),
            'phone' => '(34) 93333-3333',
            'status' => 'actived',
            'type' => 'driver',
        ])->assignRole('motorista');
            Driver::create([
                'user_id' => $user3->id,
            ]);

    }
}
