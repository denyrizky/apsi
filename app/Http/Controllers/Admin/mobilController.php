<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mobil;
use App\Http\Controllers\Controller;

class mobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $datamobil = new Mobil;
        $datamobil->Nama_instansi = $request->get('nama');
        $datamobil->Alamat_instansi = $request->get('alamat');
        $datamobil->Alamat_Tempat_Donor = $request->get('alamatdonor');
        $datamobil->tanggal_waktu_pelaksanaan = $request->get('tanggal');
        $datamobil->Nama_Koordinator = $request->get('koordinator');
        $datamobil->Telp_Hp = $request->get('telp');
        $datamobil->Email = $request->get('email');
        $datamobil->Jumlah_pendonor = $request->get('jumlah');

        $datamobil->save();

        return redirect('/admin/mobil')->with('added_success', 'Data Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $datamobil = Mobil::all();
        return view('Admin/mobilunit',[
            "datamobil" =>$datamobil, 
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //dd($request->all());
        $datamobil = Mobil::findOrFail($id);
        // return view('pegawai.DataPendonor',compact('datadonor'));
        return response()->json($datamobil);
      }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $datamobil = Mobil::where('id', $request->get('id'))
        ->update([
            'Nama_instansi' => $request->get('nama'),
            'Alamat_instansi' => $request->get('alamat'),
            'Alamat_Tempat_Donor' => $request->get('alamatdonor'),
            'tanggal_waktu_pelaksanaan' => $request->get('tanggal'),
            'Nama_Koordinator' => $request->get('koordinator'),
            'Telp_Hp' => $request->get('telp'),
            'Email' => $request->get('email'),
            'Jumlah_pendonor' => $request->get('jumlah'),
        
        ]);

        return redirect('/admin/mobil')->with('updated_success', 'Data Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id){
        $datamobil = Mobil::find($id); 
        $datamobil->delete();
            return redirect('/admin/mobil')->with('success', 'Data telah dihapus.'); 
        }
    // public function delete($id){
    //     $datamobil = Mobil::where('id', $id)->delete();
    //     // DB::table('mobil_unit')->where('id', $id)->delete();
    //     return redirect('/admin/mobil')->with('hapus_success', 'Data Berhasil dihapus');
    // }
}
