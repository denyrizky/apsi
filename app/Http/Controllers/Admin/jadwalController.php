<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Jadwal;
use App\Http\Controllers\Controller;

class jadwalController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function show()
    {
        $datajadwal = Jadwal::all();
        return view('admin/jadwal',[
            "datajadwal" =>$datajadwal, 
            ]);
    }
}
