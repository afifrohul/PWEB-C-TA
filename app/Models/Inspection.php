<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'date_inspection',
        'note',
        'status',
    ];

    public function patient()
    {
        return $this->belongsTo(User::class);
    }
    
    public function doctor()
    {
        return $this->belongsTo(User::class);
    }

    public function diagnoses()
    {
        return $this->belongsToMany(Diagnosis::class, 'diagnosis_inspection');
    }
    
    public function drugs()
    {
        return $this->belongsToMany(Drug::class, 'drug_inspection');
    }
}
