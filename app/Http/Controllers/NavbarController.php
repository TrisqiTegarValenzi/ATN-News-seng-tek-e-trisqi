<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\Kategori;
use App\Models\Komentar;
use App\Models\penghargaan;
use App\Models\sosmed;
use App\Models\sponsor;
use App\Models\Notif;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NavbarController extends Controller
{
    
    public function index($id)
    {
        $data = Kategori::find($id);
        $kategori = Kategori::limit(5)->orderBy('created_at', 'desc')->get();
        $beritateratas = berita::where('status', 'diterima')->where('statususer', 'aman')->limit(2)->where('kategori_id', $id)->orderBy('view', 'desc')->get();
        $beritateratas1 = berita::where('status', 'diterima')->where('statususer', 'aman')->limit(1)->skip(2)->where('kategori_id', $id)->orderBy('view', 'desc')->get();
        $beritateratas2 = berita::where('status', 'diterima')->where('statususer', 'aman')->limit(2)->skip(3)->where('kategori_id', $id)->orderBy('view', 'desc')->get();
        $berita = berita::where('status', 'diterima')->where('statususer', 'aman')->where('kategori_id', $id)->limit(5)->orderBy('created_at', 'desc')->get();
        $kategori1 = Kategori::limit(5)->orderBy('created_at', 'desc')->get();
        $kategori2 = Kategori::limit(10)->orderBy('created_at', 'desc')->skip(5)->get();
        $berita3 = berita::where('kategori_id', $id)->limit(8)->where('status', 'diterima')->where('statususer', 'aman')->orderBy('updated_at', 'desc')->get();
        $navbar1 = berita::where('status', 'diterima')->where('kategori_id', $id)->where('statususer', 'aman')->limit(5)->orderBy('view', 'desc')->get();
        $iklan = sponsor::select('foto')->where('status', 'aktif')->where('paket', 'paket_hemat')->limit(1)->inRandomOrder()->first();
        $iklan1 = sponsor::select('foto')->where('status', 'aktif')->where('paket', 'paket_super')->limit(1)->inRandomOrder()->first();
        $beritalaris = berita::where('status', 'diterima')->where('statususer', 'aman')->limit(5)->orderBy('view', 'desc')->get();
        $penghargaan = penghargaan::limit(3)->orderBy('created_at', 'desc')->get();
        $sosmed = sosmed::limit(1)->orderBy('updated_at', 'desc')->get();
        // $notif = Notif::orderBy('created_at', 'desc')->get();
        $notif = [];
        if (Auth::check()) {
            $notif = Notification::where('induk_user', auth()->user()->id)->where('is_read', 0)->orderBy('created_at', 'desc')->get();
            // dd($notif);
        } 
        






        return view('kategori.index', ['data' => $data, 'kategori' => $kategori,'navbar1' => $navbar1, 
        'berita3' => $berita3,
        'kategori1' => $kategori1,
        'iklan' => $iklan,
        'berita' => $berita,
        'beritalaris' => $beritalaris,
        'iklan1' => $iklan1,
        'kategori2' => $kategori2,
        'beritateratas' => $beritateratas,
        'beritateratas1' => $beritateratas1,
        'beritateratas2' => $beritateratas2,
        'penghargaan' => $penghargaan,
        'sosmed' => $sosmed,
        'notif' => $notif,
    ]);
    }

    // public function baca($id){
    //     $data = Komentar::find($id);
    //     $data->update([
    //         'status' => 'dibaca'
    //     ]
    //     );
    //     return redirect()->route('/');

    // }
}
