<?php

namespace App\Http\Controllers;

use App\Models\Reg_Districts;
use App\Models\Reg_Provinces;
use App\Models\Reg_Regencies;
use App\Models\Reg_Villages;
use Illuminate\Http\Request;

class DropdownController extends Controller
{

    public function getProvince()
    {
        $province = Reg_Provinces::all();
        return response()->json($province);
    }

    public function getKota($provinsiId)
    {
        $kota = Reg_Regencies::where('province_id', $provinsiId)->get();
        return response()->json($kota);
    }

    public function getKecamatan($kotaId)
    {
        $kecamatan = Reg_Districts::where('regency_id', $kotaId)->get();
        return response()->json($kecamatan);
    }

    public function getKelurahan($kecamatanId)
    {
        $kelurahan = Reg_Villages::where('district_id', $kecamatanId)->get();
        return response()->json($kelurahan);
    }
}
