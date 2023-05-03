<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use App\Models\sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class iklanController extends Controller
{
    public function index(Request $request){

        $katakunci = $request->katakunci;
        $data = sponsor::where('sponsor', 'LIKE', '%'.$katakunci.'%')
                      ->paginate(5)
                      ->withQueryString();
    
        // Mengubah status iklan yang berakhir menjadi tidak aktif
        $expired_data = sponsor::where('akhir', '<', date('Y-m-d'))->get();
        foreach ($expired_data as $expired) {
            $expired->update(['status' => 'tidak aktif']);
        }

        $expireddata = sponsor::where('akhir', '>', date('Y-m-d'))->get();
        foreach ($expireddata as $expired) {
            $expired->update(['status' => 'aktif']);
        }
    
        $kontak = Kontak::all();
        $kontak1 = [];
        if (Auth::check()) {
            $kontak1 = Kontak::where('read', 0)->orderBy('created_at', 'desc')->get();
            // dd($notif);
        }
        return view('admin.iklan.index',['data' => $data, 'kontak' =>$kontak, 'kontak1' => $kontak1]);
    }
    

    public function tambahiklan(){
        $kontak = Kontak::all();
        $kontak1 = [];
        if (Auth::check()) {
            $kontak1 = Kontak::where('read', 0)->orderBy('created_at', 'desc')->get();
            // dd($notif);
        }
        return view('admin.iklan.tambahiklan', compact('kontak','kontak1'));
    }

    public function insertiklan(Request $request){
        $request->validate([

            // 'sponsor' => 'required|unique:sponsor',
            'sponsor'=>'required',
            'foto'=>'required|mimes:jpg, jpeg, png',
            'mulai'=>'required|date',
            'akhir'=>'required|date|after_or_equal:mulai',
        ],[
            // 'sponsor.unique' => 'Sponsor dengan nama tersebut sudah ada',
            'sponsor.required'=>'Kolom iklan Wajib Diisi',
            'foto.required'=>'Kolom Foto Wajib Diisi',
            'foto.mimes'=>'Foto Wajib Berformat JPG, JPEG & PNG',
            'mulai.required'=>'Kolom Tanggal Mulai Wajib Diisi',
            'akhir.required'=>'Kolom Tanggal Akhir Wajib Diisi',
            'akhir.after_or_equal'=>'Data Tanggal Yang diamasukkan Telah Berakhir',
           


        ]);

       
       $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis').".".$foto_ekstensi;
        $foto_file->move(public_path('fotoiklan'), $foto_nama);
    
        $data = sponsor::create([
            'sponsor' => $request->sponsor,
            'foto' => $foto_nama,
            'mulai' => $request->mulai,
            'akhir' => $request->akhir,
            'paket' => $request->paket,
            'status' => 'aktif'
           ]);
       return redirect()->route('iklan')->with('success','Data Berhasil Di Tambahkan');
    }

    public function tampiliklan($id){

        $kontak = Kontak::all();
        $kontak1 = [];
        if (Auth::check()) {
            $kontak1 = Kontak::where('read', 0)->orderBy('created_at', 'desc')->get();
            // dd($notif);
        }
        $data = sponsor::find($id);
        return view('admin.iklan.tampiliklan', compact('data', 'kontak', 'kontak1'));
    }
    
    public function updateiklan(Request $request, $id){
       $data = sponsor::find($id);
       if ($request->hasFile('foto')) {
        unlink(public_path('fotoiklan/' . $data->foto));
        $file = $request->file('foto');
        $filename = hash_file('md5', $file->path()) . '.' . $file->getClientOriginalExtension();
        $file->move('fotoiklan/', $filename);
        $data->foto = $filename;
        $data->save();
    }

    $data->update([
        'sponsor' => $request -> sponsor,
        // 'deskripsi' => $request -> deskripsi,
        'mulai' => $request -> mulai,
        'akhir' => $request -> akhir,
        'paket' => $request -> paket,
        'status' => 'aktif',
    ]);
        return redirect()->route('iklan')->with('success','Data Berhasil Di Update');

    }

    public function deleteiklan($id){
        $data = sponsor::find($id);
        unlink(public_path('fotoiklan/' . $data->foto));
        $data->delete();
        return redirect()->route('iklan')->with('success', 'Data Berhasil Di Delete' );
    }
}
