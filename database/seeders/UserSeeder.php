<?php

// namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Database\Seeder;

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Auth\Events\Registered;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new \App\Models\User();
        $admin->name = 'admin';
        $admin->email = 'admin@gmail.com';
        $admin->email_verified_at = now();
        $admin->password = \Hash::make('admin01');
        $admin->remember_token = \Str::random(60);
        $admin->created_at = now();
        $admin->updated_at = now();
        $admin->save();
        event(new Registered($admin));
        $admin->assignRole('admin');
        
        $doctor = new \App\Models\User();
        $doctor->name = 'doctor';
        $doctor->email = 'doctor@gmail.com';
        $doctor->email_verified_at = now();
        $doctor->password = \Hash::make('doctor01');
        $doctor->remember_token = \Str::random(60);
        $doctor->created_at = now();
        $doctor->updated_at = now();
        $doctor->save();
        event(new Registered($doctor));
        $doctor->assignRole('doctor');
        
        $staff = new \App\Models\User();
        $staff->name = 'staff';
        $staff->email = 'staff@gmail.com';
        $staff->email_verified_at = now();
        $staff->password = \Hash::make('staff01');
        $staff->remember_token = \Str::random(60);
        $staff->created_at = now();
        $staff->updated_at = now();
        $staff->save();
        event(new Registered($staff));
        $staff->assignRole('staff');
        
        $patient = new \App\Models\User();
        $patient->name = 'patient';
        $patient->email = 'patient@gmail.com';
        $patient->email_verified_at = now();
        $patient->password = \Hash::make('patient01');
        $patient->remember_token = \Str::random(60);
        $patient->created_at = now();
        $patient->updated_at = now();
        $patient->save();
        event(new Registered($patient));
        $patient->assignRole('patient');
    }
}
