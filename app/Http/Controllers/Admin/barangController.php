<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Barang;
use App\Http\Controllers\Controller;
class barangController extends Controller
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

    public function store(Request $request)
    {   
        $databarang = new Barang;
        $databarang->nama_barang = $request->get('nama');
        $databarang->jumlah = $request->get('jumlah');

        $databarang->save();

        return redirect('/admin/barang')->with('added_success', 'Data Berhasil ditambahkan');
    }
    
    public function show()
    {
        $databarang = Barang::all();
        return view('admin/barang',[
            "databarang" =>$databarang, 
            ]);
    }

    public function edit($id) {
        //dd($request->all());
        $databarang = Barang::findOrFail($id);
        // return view('pegawai.DataPendonor',compact('datadonor'));
        return response()->json($databarang);
      }

      public function update(Request $request)
      {
          $databarang = Barang::where('id', $request->get('id'))
          ->update([
              'nama_barang' => $request->get('nama'),
              'jumlah' => $request->get('jumlah'),
          
          ]);
  
          return redirect('/admin/barang')->with('updated_success', 'Data Berhasil diupdate');
      }

      public function destroy($id){
        $databarang = Barang::find($id); 
        $databarang->delete();
            return redirect('/admin/barang')->with('success', 'Data telah dihapus.'); 
        }
}
