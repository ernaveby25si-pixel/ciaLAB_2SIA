<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateFirstUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        user::craete([
            'name' => 'Admin',
            'email' => 'gatot@pcr.ac.id',
            'password' => Hash::make('gatotkaca')
        ]);
    }
}
