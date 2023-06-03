<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrugOut extends Model
{
    use HasFactory;
    protected $table = 'drug_outs';
    protected $primaryKey = 'id';
}
