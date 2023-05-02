<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\Kontak;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class beritalarisController extends Controller
{
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $kontak = Kontak::all();
        $kontak1 = [];
        if (Auth::check()) {
            $kontak1 = Kontak::where('read', 0)->orderBy('created_at', 'desc')->get();
            // dd($notif);
        }
        $user = User::all();
        $berita = berita::where('judul', 'LIKE', '%'.$katakunci.'%')->where('status', 'diterima')->where('statususer', 'aman')->with('users')->orderBy('view', 'desc')->paginate(5)->withQueryString();
        return view('admin.berita terlaris.index', ['kontak' => $kontak, 'berita' => $berita, 'user' => $user, 'kontak1' => $kontak1]);
    }
  

    
}
