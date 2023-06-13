<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{

    use HasFactory;
    protected $table = 'drugs';
    protected $primaryKey = 'id';

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function drugIn()
    {
        return $this->hasMany(DrugIn::class);
    }

    public function drugOut()
    {
        return $this->hasMany(DrugOut::class);
    }
}