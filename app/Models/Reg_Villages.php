<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reg_Villages extends Model
{
    use HasFactory;

    protected $table = 'reg_villages';

    protected $fillable = [
        'district_id', 'village_name'
    ];

    public function district()
    {
        return $this->belongsTo(Reg_Districts::class, 'district_id');
    }

}
