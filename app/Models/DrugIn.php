<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrugIn extends Model
{
    use HasFactory;
    protected $table = 'drug_ins';
    protected $primaryKey = 'id';

    public function drug()
    {
        return $this->belongsTo(Drug::class);
    }
}
