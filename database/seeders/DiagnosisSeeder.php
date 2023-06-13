<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiagnosisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $diagnosis = new \App\Models\Diagnosis();
        $diagnosis->name = 'Batuk';
        $diagnosis->created_at = now();
        $diagnosis->updated_at = now();
        $diagnosis->save();
        
        $diagnosis = new \App\Models\Diagnosis();
        $diagnosis->name = 'Pilek';
        $diagnosis->created_at = now();
        $diagnosis->updated_at = now();
        $diagnosis->save();
        
        $diagnosis = new \App\Models\Diagnosis();
        $diagnosis->name = 'Demam';
        $diagnosis->created_at = now();
        $diagnosis->updated_at = now();
        $diagnosis->save();
        
        $diagnosis = new \App\Models\Diagnosis();
        $diagnosis->name = 'Radang';
        $diagnosis->created_at = now();
        $diagnosis->updated_at = now();
        $diagnosis->save();
        
        $diagnosis = new \App\Models\Diagnosis();
        $diagnosis->name = 'Pusing';
        $diagnosis->created_at = now();
        $diagnosis->updated_at = now();
        $diagnosis->save();
        
        $diagnosis = new \App\Models\Diagnosis();
        $diagnosis->name = 'Diare';
        $diagnosis->created_at = now();
        $diagnosis->updated_at = now();
        $diagnosis->save();

    }
}
