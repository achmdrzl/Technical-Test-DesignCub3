<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reg_Regencies extends Model
{
    use HasFactory;

    protected $table = 'reg_regencies';

    protected $fillable = [
        'province_id', 'name'
    ];

    public function provinces()
    {
        return $this->belongsTo(Reg_Provinces::class, 'province_id');
    }

    public function district()
    {
        return $this->hasMany(Reg_Districts::class, 'regency_id');
    }
}
