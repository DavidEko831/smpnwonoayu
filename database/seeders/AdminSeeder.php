<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Admin::create([
            'email' => 'smpn1wonoayu@semambung.com',
            'password' => Hash::make('speniwaadiwiyata')
        ]);
    }
}
