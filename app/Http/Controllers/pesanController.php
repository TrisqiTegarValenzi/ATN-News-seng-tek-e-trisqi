<?php

namespace App\Http\Controllers;
use App\Models\Kontak;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Support\Facades\Schema;

use Illuminate\Http\Request;

class pesanController extends Controller
{
    public function index($id){

        $user = User::find($id);
        $fotouser = $user->fotouser;

        $kontak = Kontak::find($id);
        return view('admin.tampilpesan.index', compact('kontak','user','fotouser'));
    }

    public function bacapesan($id){
        $data = Kontak::find($id);
        $data->read = 1;
        $data->save();

        return redirect()->route('tampilpesan', ['id' => $id]);
    }
}
 