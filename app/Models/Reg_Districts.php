<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reg_Districts extends Model
{
    use HasFactory;

    protected $table = 'reg_districts';

    protected $fillable = [
        'regency_id', 'name'
    ];

    public function regency()
    {
        return $this->belongsTo(Reg_Regencies::class, 'regency_id');
    }

    public function villages()
    {
        return $this->hasMany(Reg_Villages::class, 'district_id');
    }

}
