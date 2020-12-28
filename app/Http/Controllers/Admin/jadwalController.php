<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Jadwal;
use App\User;
use App\Mobil;
use App\Barang;
use App\DetailJadwal;
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
        $dataPegawai = User::all();
        $dataUnit = Mobil::all();
        $dataBarang = Barang::all();
        return view('admin/jadwal',[
            "datajadwal" => $datajadwal, 
            "dataPegawai" => $dataPegawai,
            "dataUnit" => $dataUnit,
            "dataBarang" => $dataBarang
            ]);
    }

    public function cetak()
    {
        $datajadwal = Jadwal::all();
        $dataPegawai = User::all();
        $dataUnit = Mobil::all();
        $dataBarang = Barang::all();
        return view('admin/cetak-jadwal',[
            "datajadwal" => $datajadwal, 
            "dataPegawai" => $dataPegawai,
            "dataUnit" => $dataUnit,
            "dataBarang" => $dataBarang,
            ]);
    }
    public function cetakpertanggal($tglawal, $tglakhir){
        // dd("Tanggal Awal : ".$tglawal. "Tanggal Akhir : ".$tglakhir);

        // $cetak = Jadwal::with('Jadwal')->whereBetween('tanggal_waktu',[$tglawal, $tglakhir])->get();
        $cetak = DB::table('jadwal')->whereBetween('tanggal_waktu',[$tglawal, $tglakhir])->get();
        return view("/admin/cetak-pertgl", compact('cetak'));
    
    }

    public function tambah(Request $request){
        $post = $request->all();
        // PANGGIL FIELD PAKAI [] ex : $post['nama']
        $datajadwal = $request->all();
        // INPUT KE TABLE JADWAL

        $datajadwal = new Jadwal;

        $getUnit = DB::table('mobil_unit')->where('id',$request->get('unit'))->first();
        

        // DECLARE AJA APA YG AKAN DIINPUT DISINI
        $datajadwal->tanggal_waktu = date('Y-m-d');
        $datajadwal->nama_instansi = @$getUnit->Nama_instansi;//buat pangil tabel mobil unit
        $datajadwal->alamat_tempat_donor = @$getUnit->Alamat_Tempat_Donor;//buat pangil tabel mobil unit
        $datajadwal->nama_koordinator = @$getUnit->Nama_Koordinator;//buat pangil tabel mobil unit
        $datajadwal->No_Hp = @$getUnit->Telp_Hp;//buat pangil tabel mobil unit
        $datajadwal->id_mobil = $request->get('unit');
        $datajadwal->id_pegawai = !empty($request->get('pegawai')) ? implode(",",$request->get('pegawai')) : '';
        $datajadwal->id_barang = !empty($request->get('idbarang')) ? implode(",",$request->get('idbarang')) : '';

        $datajadwal->save();

        // Jangan lupa yg harus narik data ke table lain, tarik dlu

        // EMD OF INPUT DATA

        $last_id_jadwal = $datajadwal->id;
        // AMBIL LAST ID DATA YG TERINPUT PADA TABLE JADWAL


        // RETURN KE HALAMAN JADWAL
        return redirect('/admin/jadwal')->with('added_success', 'Data Berhasil ditambahkan');
    }

    public function update(Request $request)
    {   
        $post = $request->all();
        // PANGGIL FIELD PAKAI [] ex : $post['nama']
        $datajadwal = $request->all();
        // INPUT KE TABLE JADWAL

        $id = $request->get('jadwalID');
        $datajadwal = Jadwal::findOrFail($id);

        $getUnit = DB::table('mobil_unit')->where('id',$request->get('unit'))->first();
        

        // DECLARE AJA APA YG AKAN DIINPUT DISINI
        $datajadwal->tanggal_waktu = date('Y-m-d');
        $datajadwal->nama_instansi = @$getUnit->Nama_instansi;//buat pangil tabel mobil unit
        $datajadwal->alamat_tempat_donor = @$getUnit->Alamat_Tempat_Donor;//buat pangil tabel mobil unit
        $datajadwal->nama_koordinator = @$getUnit->Nama_Koordinator;//buat pangil tabel mobil unit
        $datajadwal->No_Hp = @$getUnit->Telp_Hp;//buat pangil tabel mobil unit
        $datajadwal->id_mobil = $request->get('unit');
        $datajadwal->id_pegawai = !empty($request->get('pegawai')) ? implode(",",$request->get('pegawai')) : '';
        $datajadwal->id_barang = !empty($request->get('idbarang')) ? implode(",",$request->get('idbarang')) : '';

        $datajadwal->save();

        // Jangan lupa yg harus narik data ke table lain, tarik dlu

        // EMD OF INPUT DATA

        $last_id_jadwal = $datajadwal->id;
        // AMBIL LAST ID DATA YG TERINPUT PADA TABLE JADWAL


        // RETURN KE HALAMAN JADWAL
        return redirect('/admin/jadwal')->with('added_success', 'Data Berhasil diupdate');
    }

    public function destroy($id){
        $datajadwal = Jadwal::find($id); 
        $datajadwal->delete();
            return redirect('/admin/jadwal')->with('success', 'Data telah dihapus.'); 
        }
}
