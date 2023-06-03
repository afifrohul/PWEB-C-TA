<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DrugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $drug = new \App\Models\Drug();
        $drug->name = 'Paracetamol';
        $drug->description = 'Lorem ipsum dolor sit amet';
        $drug->type_id = 1;
        $drug->price = 5000;
        $drug->created_at = now();
        $drug->updated_at = now();
        $drug->save();

        $drug = new \App\Models\Drug();
        $drug->name = 'Promag';
        $drug->description = 'Lorem ipsum dolor sit amet';
        $drug->type_id = 2;
        $drug->price = 7000;
        $drug->created_at = now();
        $drug->updated_at = now();
        $drug->save();

        $drug = new \App\Models\Drug();
        $drug->name = 'Amoxilin';
        $drug->description = 'Lorem ipsum dolor sit amet';
        $drug->type_id = 3;
        $drug->price = 15000;
        $drug->created_at = now();
        $drug->updated_at = now();
        $drug->save();
        
        $drug = new \App\Models\Drug();
        $drug->name = 'Vitacimin C';
        $drug->description = 'Lorem ipsum dolor sit amet';
        $drug->type_id = 4;
        $drug->price = 15000;
        $drug->created_at = now();
        $drug->updated_at = now();
        $drug->save();
        
        $drug = new \App\Models\Drug();
        $drug->name = 'Enervon C';
        $drug->description = 'Lorem ipsum dolor sit amet';
        $drug->type_id = 5;
        $drug->price = 15000;
        $drug->created_at = now();
        $drug->updated_at = now();
        $drug->save();
    }
}
