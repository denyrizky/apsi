
@extends("adminlte::page")
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet" />

<style>
.select2-selection__rendered {
    line-height: 31px !important;
}
.select2-container .select2-selection--single {
    height: 35px !important;
}
.select2-selection__arrow {
    height: 34px !important;
}
</style>
@section("content")
	
<!-- Button trigger modal -->

@php($i=0)
<!-- Modal -->
 @if ($message = Session::get('error'))
      <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
      </div>
    @endif

    @if ($message = Session::get('warning'))
      <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if ($message = Session::get('info'))
      <div class="alert alert-info alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
      </div>
    @endif

    @if ($errors->any())
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        Please check the form below for errors
    </div>
    @endif
<div style="overflow: scroll;" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Jadwal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="{{url('admin/jadwal/tambah')}}" method="POST"> 
          @csrf
      		
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Pegawai</label><br/>
                <select multiple name="pegawai[]" class="form-control pegawaiselect" style="width:100% ">
                  @foreach($dataPegawai as $dp)
                    <option value="{{ $dp->id }}">{{ $dp->nama }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Mobil Unit</label>
                <select name="unit" class="form-control">

                <!-- syntax buat tabel saat di pilih tidak bisa di input lagi -->
                  @foreach($dataUnit as $du)

                  <?php
                    $checkJadwal = DB::table('jadwal')->where('id_mobil',$du->id)->first();

                    if(empty($checkJadwal)){
                  ?>

                  <option value="{{ $du->id }}">{{ $du->Nama_instansi }}</option>

                  <?php } ?>
                  @endforeach
                </select>
               
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>List Barang</label><br/>
                <select multiple name="idbarang[]" class="form-control barangselect" style="width:100% ">
                  @foreach($dataBarang as $db)
                    <option value="{{ $db->id }}">{{ $db->nama_barang }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Tambah</button></a>
      </div>
    </div>
  </div>
</div>
</form>

<!-- Modal Update -->

<div style="overflow: scroll;" class="modal fade" id="exampleModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Mobil Unit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="{{url('/admin/jadwal/update')}}" method="post"> 
          @csrf
          @method('POST')
      		<input type="hidden" id="jadwalID" name="jadwalID">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Pegawai</label><br/>
                <select multiple name="pegawai[]" id="pegawaiEdit" class="form-control pegawaiselect" style="width:100% ">
                  @foreach($dataPegawai as $dp)
                    <option value="{{ $dp->id }}">{{ $dp->nama }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Mobil Unit</label>
                <select name="unit" id="unitEdit" class="form-control">
                  @foreach($dataUnit as $du)
                    <option value="{{ $du->id }}">{{ $du->Nama_instansi }}</option>
                  @endforeach
                </select>
               
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>List Barang</label><br/>
                <select multiple name="idbarang[]" id="barangEdit" class="form-control barangselect" style="width:100% ">
                  @foreach($dataBarang as $db)
                    <option value="{{ $db->id }}">{{ $db->nama_barang }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Ubah</button></a>
      </div>
    </div>
  </div>
</div>
</form>


<div style="overflow: scroll;" class="modal fade" id="modalAmbilBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">List Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      		
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                    <th>Nama Barang</th>
                    <th width="5%"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($dataBarang as $db)
                      <tr>
                        <td>{{ $db->nama_barang }}</td>
                        <td>
                          <button type="button" class="btn btn-success btn-sm takeBarang" data-id="{{ $db->id }}" data-name="{{ $db->nama_barang }}">Pilih</button>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<!-- tabel -->

<div style="float: right">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  		<i class="fa fa-plus"></i> tambah
		</button>
	</div>
	<table class="table" style="font-size:15px;" id="tableData">
        <thead class="table-dark">
		<tr>
			<td>No</td>
			<td>tanggal</td>
			<td>Nama Instansi</td>
            <td>Alamat Tempat Donor</td>
            <td>Nama Kordinator</td>
            <td>No Hp</td>
            <td>Barang</td>
            <td>Instansi</td>
            <td>List Pegawai</td>
            <td></td>
            <td></td>

		</tr>
        </thead>

<tbody class="table">
            @foreach ($datajadwal as $item)

            <?php
              $mobil = '';

              $getMobil = DB::table('mobil_unit')->where('id',$item->id_mobil)->first();
              $mobil = @$getMobil->Nama_instansi;

              $barang = '';
              if($item->id_barang != NULL || !empty($item->id_barang)){
                $duarr = explode(',',$item->id_barang);
                $i = 0;
                foreach ($duarr as $vduar) {
                  $getBarang = DB::table('barang')->where('id',$vduar)->first();
                  if(!empty($getBarang)){
                    $i++;
                    $barang .= $i.'. '.$getBarang->nama_barang.'<br/>';
                  }
                }
              }

              $pegawai = '';

              $getPegawai = DB::table('pegawai')->where('id',$item->id_pegawai)->first();
              $pegawai = @$getPegawai->nama;

              $pegawai = '';
              if($item->id_pegawai != NULL || !empty($item->id_pegawai)){
                $duarr = explode(',',$item->id_pegawai);
                $i = 0;
                foreach ($duarr as $vduar) {
                  $getPegawai = DB::table('pegawai')->where('id',$vduar)->first();
                  if(!empty($getPegawai)){
                    $i++;
                    $pegawai .= $i.'. '.$getPegawai->nama.'<br/>';
                  }
                }
              }

            ?>

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->tanggal_waktu }}</td>
                <td>{{ $item->nama_instansi }}</td>
                <td>{{ $item->alamat_tempat_donor	 }}</td>
                <td>{{ $item->nama_koordinator	 }}</td>
                <td>{{ $item->No_Hp }}</td>
                <td><?= $barang ?></td>
                <td>{{ $mobil }}</td>
                <td><?= $pegawai ?></td>
   

                <td class="text-center">
                <button 
                class="btn btn-primary btn-edit"
                data-id="{{ $item->id}}"
                data-unit="{{ $item->id_mobil }}"
                data-pegawai="{{ $item->id_pegawai }}"
                data-barang="{{ $item->id_barang }}"
                type="button"> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                  </svg></button>
                </td>
                <td>
              <form action="{{ url('/admin/jadwal/'. $item->id.'/hapus') }}"   method="post" onsubmit="return confirm('Apakah Yakin Ingin Menghapus Data ini ?')">
              @method('delete')
              @csrf
              <button class="btn btn-danger btn-sm btn-delete">
              <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
              <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
              </svg>  
            </form>
                </td>
            </tr>
                @endforeach
        </tbody>
</table>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<script> 

$(function(){
  $.noConflict();

  $('#tableData').DataTable();
});

  $('.pegawaiselect').select2();
  $('.barangselect').select2();
  $(document).on('click','.takeBarang',function(){

    let holder = $('#holderListBarang');

    let id = $(this).attr('data-id');
    let name = $(this).attr('data-name');

    

    let susun = '<tr>'+
    '<td><button type="button" class="btn btn-danger btn-sm removeBarang">Hapus</button></td>'+
    '<td><input type="hidden" value="'+id+'" name="idbarang[]">'+name+'</td>'+
    '<td hidden><input type="number" name="qtyBarang[]" value="1" class="form-control qtyID_'+id+'"></td>'+
    '</tr>';

    if($(document).find('.qtyID_'+id).length > 0){
      let incr = parseInt($(document).find('.qtyID_'+id).val()) + 1;
      $(document).find('.qtyID_'+id).val(incr);
    }else{
      holder.append(susun);
    }
    
    $('#modalAmbilBarang').modal('hide');

  });

  $(document).on('click','.removeBarang',function(){
    $(this).closest('tr').remove();
  });
  
  $('#ambilbarang').click(function(){
    $('#modalAmbilBarang').modal('show');
  });

    $(document).on('click','.btn-edit',function(){
      // console.log($(this).data('id'))
      let id = $(this).data('id');
      let unit = $(this).data('unit');
      let pegawai = $(this).data('pegawai');
      let barang = $(this).data('barang');

      $('#jadwalID').val(id);
      $('#unitEdit').val(unit);

      $('#pegawaiEdit').val('').change();
      $('#barangEdit').val('').change();

      if(pegawai.toString().includes(",")){
        let splitPegawai = pegawai.split(",");
        $('#pegawaiEdit').select2();
        $('#pegawaiEdit').val(splitPegawai).change();
      }else{
        $('#pegawaiEdit').select2();
        $('#pegawaiEdit').val(pegawai).change();
      }

      if(barang.toString().includes(",")){
        let splitBarang = barang.split(",");
        $('#barangEdit').select2();
        $('#barangEdit').val(splitBarang).change();
      }else{
        $('#barangEdit').select2();
        $('#barangEdit').val(barang).change();
      }

      $('#exampleModalUpdate').modal('show');
    }); 

// $('.btn-delete').on('click',function(){
//   // console.log($(this).data('id'))
//   let id = $(this).data('id')
//   $.ajax({
//       url:`//jadwal/${id}/hapus`,
//       method:"GET",
//       success: function(data){
//         // console.log(data);
//         // let parse = JSON.parse(data);
//         console.log(data);

//       },
//       error:function(error){
//         console.log(error)
//       }
//   })
// })   
</script>

@endsection