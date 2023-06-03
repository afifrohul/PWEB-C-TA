<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $type = new \App\Models\Type();
        $type->name = 'Kapsul';
        $type->created_at = now();
        $type->updated_at = now();
        $type->save();
        
        $type = new \App\Models\Type();
        $type->name = 'Pil';
        $type->created_at = now();
        $type->updated_at = now();
        $type->save();
        
        $type = new \App\Models\Type();
        $type->name = 'Tablet';
        $type->created_at = now();
        $type->updated_at = now();
        $type->save();
        
        $type = new \App\Models\Type();
        $type->name = 'Bubuk';
        $type->created_at = now();
        $type->updated_at = now();
        $type->save();
        
        $type = new \App\Models\Type();
        $type->name = 'Cair';
        $type->created_at = now();
        $type->updated_at = now();
        $type->save();
        
        $type = new \App\Models\Type();
        $type->name = 'Lainnya';
        $type->created_at = now();
        $type->updated_at = now();
        $type->save();
    }
}
