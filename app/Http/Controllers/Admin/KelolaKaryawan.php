<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Golongan;
use App\Jabatan;
use App\Bagian;
use App\Http\Controllers\Controller;
use DataTables;
class KelolaKaryawan extends Controller
{
    public function json(){
        return Datatables::of(User::all())->make(true);
    }

    public function data(){
    	$data1=Golongan::all('golongan');
    	$data2=Jabatan::all('jabatan');
    	$data3=Bagian::all('nama_bagian');
        return view('admin.karyawan',['data1'=>$data1,'data2'=>$data2,'data3'=>$data3]);
    }
   public function isi(Request $req)
   {
      $validatedData = $request->validate([
        'username' => 'required|unique:username|max:15',
        'nama' => 'required',
        'email'=> 'required',
        'alamat'=> 'required',
        'noTelp'=> 'required',
        'nik'=> 'required',
        'tahun_masuk'=> 'required',
    ]);
   		User::create(['nama'=>$req->nama,'username'=>$req->username,'email'=>$req->email,'password'=>bcrypt('12345'),'jabatan'=>$req->jabatan,'golongan'=>$req->golongan,'nip'=>$req->nip,'nik'=>$req->nik,'alamat'=>$req->alamat,'no_telphone'=>$req->noTelp,'status'=>$req->status,'tanggal_masuk'=>$req->tanggal_masuk]);
}
 public function isi2(){
  return $this->data();
 }
}