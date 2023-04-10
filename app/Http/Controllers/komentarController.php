<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;

class komentarController extends Controller
{
    // public function baca($id)
    // {
    //     // Cari komentar terupdate dengan ID yang sesuai
    //     $komentar = Komentar::findOrFail($id);
        
    //     // Perbarui status pada komentar menjadi "dibaca"
    //     $komentar->status = 'dibaca';
    //     $komentar->save();
        
    //     // Kembalikan response dengan status HTTP 200 OK
    //     return response()->json(['success' => true], 200);
    // }
}
