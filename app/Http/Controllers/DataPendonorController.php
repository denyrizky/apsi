<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataPendonor;

class DataPendonorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function data()
    {
        $user=Auth::user();
        $datadonor = DataPendonor::all();
        $lastID = DataPendonor::getLastID();
        return view('pegawai.DataPendonor',["user"=>$user],[
            "datadonor" =>$datadonor, 
            "lastID" => $lastID
            ]);

    }
    public function cetak()
    {
        $user=Auth::user();
        $datadonor = DataPendonor::all();
        $lastID = DataPendonor::getLastID();
        return view('pegawai.cetak-donor',["user"=>$user],[
            "datadonor" =>$datadonor, 
            "lastID" => $lastID
            ]);

    }

    public function cetakpertanggal($tglawal, $tglakhir){
        // dd("Tanggal Awal : ".$tglawal. "Tanggal Akhir : ".$tglakhir);

        // $cetak = data_pendonors::with('data_pendonors')->whereBetween('tanggal_waktu',[$tglawal, $tglakhir])->get();
        $cetak = DB::table('data_pendonors')->whereBetween('created_at',[$tglawal, $tglakhir])->get();
        return view("/pegawai/Laporan", compact('cetak'));
    
    }

    public function input(Request $request)
    {
        $datadonor = new DataPendonor;
        $datadonor->reg_id = $request->get('reg_id');
        $datadonor->no_KTP = $request->get('ktp');
        $datadonor->Nama = $request->get('nama');
        $datadonor->Kelurahan = $request->get('kelurahan');
        $datadonor->Kecamatan = $request->get('kecamatan');
        $datadonor->Alamat = $request->get('alamat');
        $datadonor->Kode_pos = $request->get('kodepos');
        $datadonor->jenis_kelamin = $request->get('jk');
        $datadonor->tempat_lahir = $request->get('TL');
        $datadonor->tanggal_lahir = $request->get('TglL');
        $datadonor->status = $request->get('status');
        $datadonor->golongan_darah = $request->get('goldar');
        $datadonor->NoTelpon_Hp = $request->get('notel');

        $datadonor->save();

        return redirect('/datapendonor')->with('added_success', 'Data Berhasil ditambahkan');
    }

    

    // public function edit_single_data($id) {
    //     $output = 'Edit Artikel';
    //     $article = data_pendonors::where('id', $id)->first();
        
    //     return view('pegawai.DataPendonor', array(
    //       'content' => $output,
    //       'article' => $article
    //     ));
    //   }

    public function edit($id) {
        //dd($request->all());
        $datadonor = DataPendonor::findOrFail($id);
        // return view('pegawai.DataPendonor',compact('datadonor'));
        return response()->json($datadonor);
      }

    public function delete($id){
        DB::table('data_pendonors')->where('id', $id)->delete();
        return redirect('/datapendonor')->with('hapus_success', 'Data Berhasil dihapus');
    }
    public function update(Request $request)
    {
        $datadonor = DataPendonor::where('id', $request->get('id'))
        ->update([
            'no_KTP' => $request->get('ktp'),
            'Nama' => $request->get('nama'),
            'Kelurahan' => $request->get('kelurahan'),
            'Kecamatan' => $request->get('kecamatan'),
            'Alamat' => $request->get('alamat'),
            'Kode_pos' => $request->get('kodepos'),
            'jenis_kelamin' => $request->get('jk'),
            'tempat_lahir' => $request->get('TL'),
            'tanggal_lahir' => $request->get('TglL'),
            'status' => $request->get('status'),
            'golongan_darah' => $request->get('goldar'),
            'NoTelpon_Hp' => $request->get('notel'),

        ]);

        return redirect('/datapendonor')->with('updated_success', 'Data Berhasil diupdate');
    }

}
