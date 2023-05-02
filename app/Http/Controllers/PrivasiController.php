<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use App\Models\Privasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrivasiController extends Controller
{
    public function privasi_admin(Request $request){

        $kontak = Kontak::all();
        $kontak1 = [];
        if (Auth::check()) {
            $kontak1 = Kontak::where('read', 0)->orderBy('created_at', 'desc')->get();
            // dd($notif);
        }
        $data = Privasi::find(1);
        return view('admin.privasi_admin.index',['data' => $data,'kontak' => $kontak, 'kontak1' => $kontak1 ]);
    }
    public function insert(Request $request){
        //dd($request->all());
       $data = Privasi::find(1)->update($request->all());
       return redirect()->back()->with('sukses', 'Berhasil Mengedit Data');
    }
    public function privasi(Request $request){

        $kontak = Kontak::all();
        $data = Privasi::orderBy('created_at', 'desc')->get();
        return view('privasi.index',['data' => $data,'kontak' => $kontak ]);
    }
    // public function tampilprivasi(Request $request){

    //     $kontak = Kontak::all();
    //     return view('privasi.index',['data' => $data,'kontak' => $kontak ]);
    // }

}
