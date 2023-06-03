<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DrugOutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $drug = new \App\Models\DrugOut();
        $drug->drug_id = 2;
        $drug->date_out = "2023-06-02";
        $drug->amount = 100;
        $drug->total_price = 133000;
        $drug->created_at = now();
        $drug->updated_at = now();
        $drug->save();
        $drug = new \App\Models\DrugOut();
        $drug->drug_id = 3;
        $drug->date_out = "2023-05-02";
        $drug->amount = 30;
        $drug->total_price = 10000;
        $drug->created_at = now();
        $drug->updated_at = now();
        $drug->save();
        $drug = new \App\Models\DrugOut();
        $drug->drug_id = 3;
        $drug->date_out = "2023-04-02";
        $drug->amount = 100;
        $drug->total_price = 15000;
        $drug->created_at = now();
        $drug->updated_at = now();
        $drug->save();
        $drug = new \App\Models\DrugOut();
        $drug->drug_id = 3;
        $drug->date_out = "2023-03-02";
        $drug->amount = 1000;
        $drug->total_price = 15000;
        $drug->created_at = now();
        $drug->updated_at = now();
        $drug->save();
        $drug = new \App\Models\DrugOut();
        $drug->drug_id = 3;
        $drug->date_out = "2023-03-02";
        $drug->amount = 100;
        $drug->total_price = 15000;
        $drug->created_at = now();
        $drug->updated_at = now();
        $drug->save();
        $drug = new \App\Models\DrugOut();
        $drug->drug_id = 3;
        $drug->date_out = "2023-02-02";
        $drug->amount = 210;
        $drug->total_price = 150000;
        $drug->created_at = now();
        $drug->updated_at = now();
        $drug->save();
        $drug = new \App\Models\DrugOut();
        $drug->drug_id = 3;
        $drug->date_out = "2023-07-02";
        $drug->amount = 100;
        $drug->total_price = 15000;
        $drug->created_at = now();
        $drug->updated_at = now();
        $drug->save();
        $drug = new \App\Models\DrugOut();
        $drug->drug_id = 3;
        $drug->date_out = "2023-08-02";
        $drug->amount = 12;
        $drug->total_price = 9000;
        $drug->created_at = now();
        $drug->updated_at = now();
        $drug->save();
        $drug = new \App\Models\DrugOut();
        $drug->drug_id = 3;
        $drug->date_out = "2023-09-02";
        $drug->amount = 100;
        $drug->total_price = 15000;
        $drug->created_at = now();
        $drug->updated_at = now();
        $drug->save();
        $drug = new \App\Models\DrugOut();
        $drug->drug_id = 1;
        $drug->date_out = "2023-10-02";
        $drug->amount = 100;
        $drug->total_price = 15000;
        $drug->created_at = now();
        $drug->updated_at = now();
        $drug->save();
        $drug = new \App\Models\DrugOut();
        $drug->drug_id = 2;
        $drug->date_out = "2023-11-02";
        $drug->amount = 200;
        $drug->total_price = 15000;
        $drug->created_at = now();
        $drug->updated_at = now();
        $drug->save();
        $drug = new \App\Models\DrugOut();
        $drug->drug_id = 3;
        $drug->date_out = "2023-12-02";
        $drug->amount = 40;
        $drug->total_price = 15000;
        $drug->created_at = now();
        $drug->updated_at = now();
        $drug->save();
    }
}
