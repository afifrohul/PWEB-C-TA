<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $afif = new \App\Models\User();
        $afif->name = 'afifrohul';
        $afif->email = 'afifrohul@abrori.com';
        $afif->email_verified_at = now();
        $afif->password = \Hash::make('afif2206');
        $afif->remember_token = \Str::random(60);
        $afif->created_at = now();
        $afif->updated_at = now();
        $afif->save();
    }
}
