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

        $kontak = Kontak::find($id);
        return view('admin.tampilpesan.index', compact('kontak'));
    }
}
 