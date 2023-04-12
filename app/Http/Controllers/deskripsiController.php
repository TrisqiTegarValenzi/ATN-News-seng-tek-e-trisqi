<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use App\Models\Deskripsi;
use Illuminate\Http\Request;

class DeskripsiController extends Controller
{
    public function deskripsi_penghargaan(Request $request){

        $kontak = Kontak::all();
        $des = Deskripsi::find(1);
        return view('admin.deskripsi.index',['data' => $des , 'kontak' => $kontak ]);
    }
    public function insert(Request $request)
    {
        //dd($request->all());
       $des = Deskripsi::find(1)->update($request->all());
       return redirect()->back()->with('sukses', 'Berhasil Mengedit Data');
    }
    
    // public function tampilprivasi(Request $request){

    //     $kontak = Kontak::all();
    //     return view('privasi.index',['data' => $data,'kontak' => $kontak ]);
    // }

    // public function deskripsi_penghargaan(Request $request)
    // {
    //     // $kontak = Kontak::all();
    //     $data = Deskripsi::orderBy('created_at', 'desc')->get();
    //     return view('deskripsi.index',['data' => $data,'kontak' => $kontak ]);
    // }

}
