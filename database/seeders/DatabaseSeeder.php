<?php

use Database\Seeders\AdminSeeder;
use Illuminate\Database\Seeder;
   
class DatabaseSeeder extends Seeder
{
    public function run()
    {
         $this->call(AdminSeeder::class);
    }
}