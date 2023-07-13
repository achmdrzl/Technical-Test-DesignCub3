<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reg_Provinces extends Model
{
    use HasFactory;

    protected $table = 'reg_provinces';

    protected $fillable = [
        'name',
    ];

    public function regency()
    {
        return $this->hasMany(Reg_Regencies::class, 'province_id');
    }
}
