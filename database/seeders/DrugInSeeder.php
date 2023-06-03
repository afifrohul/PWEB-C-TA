<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DrugInSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $drug = new \App\Models\DrugIn();
        $drug->drug_id = 2;
        $drug->date_in = "2023-06-02";
        $drug->amount = 100;
        $drug->created_at = now();
        $drug->updated_at = now();
        $drug->save();
        $drug = new \App\Models\DrugIn();
        $drug->drug_id = 1;
        $drug->date_in = "2023-05-02";
        $drug->amount = 190;
        $drug->created_at = now();
        $drug->updated_at = now();
        $drug->save();
        $drug = new \App\Models\DrugIn();
        $drug->drug_id = 3;
        $drug->date_in = "2023-07-02";
        $drug->amount = 120;
        $drug->created_at = now();
        $drug->updated_at = now();
        $drug->save();
    }
}
