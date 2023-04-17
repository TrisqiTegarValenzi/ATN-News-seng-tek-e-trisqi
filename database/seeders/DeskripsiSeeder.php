<?php

namespace Database\Seeders;

use App\Models\Deskripsi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DeskripsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('deskripsi')->insert([
            'isi' =>'<div><span style="font-size: 14.4px;"><b></b></span></div><div><span style="font-size: 14.4px;"><b><br></b></span></div><div><span style="font-size: 14.4px;">Berikut Merupakan Penghargaan Website Kami :</span></div><div><span style="font-size: 14.4px;"></span></div>'
            
        ]);
    }
}
