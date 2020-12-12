
@extends("adminlte::page")
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
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Mobil Unit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="{{url('admin/mobil/tambah')}}" method="POST"> 
          @csrf
      		<table width="100%">
      			<tr>
      				<td>Nama Instansi</td>
      				<td ><input type="text" name="nama" class="form-control "></td>
      			</tr>
      			<tr>
      				<td>Alamat Instansi</td>
      				<td><input type="text" name="alamat"  class="form-control"></td>
      			</tr>
      			<tr>
      				<td>Alamat Tempat Donor</td>
                    <td><input type="text" name="alamatdonor"  class="form-control"></td>
      			</tr>
      			 <tr>
      				<td>Tanggal Pelaksanaan</td>
      				<td><input type="date" name="tanggal"  class="form-control"></td>
                </tr>
      			<tr>
      				<td>Nama Koordinator</td>
      				<td><input type="text" name="koordinator"  class="form-control"></td>
      			</tr>
      			<tr>
      				<td>Telp Koordinator</td>
                    <td><input type="number" name="telp"  class="form-control"></td>
      			</tr>
      			<tr>
      				<td>Email</td>
      				<td><input type="email" name="email"  class="form-control"></td>
      			</tr>
      			<tr>
      				<td>Jumlah Pendonor</td>
      				<td><input type="number" name="jumlah"  class="form-control"></td>
      			</tr>
      			
           		</table>
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
      	<form action="{{url('/admin/mobil/update')}}" method="post"> 
          @csrf
          @method('POST')
      		<table width="100%">
          <input type="hidden" name="id" id="edit_id">
      			<tr>
      				<td>Nama Instansi</td>
      				<td ><input type="text" name="nama" id="edit_Nama_instansi" class="form-control "></td>
      			</tr>
      			<tr>
      				<td>Alamat Instansi</td>
      				<td><input type="text" name="alamat" id="edit_Alamat_instansi"  class="form-control"></td>
      			</tr>
      			<tr>
      				<td>Alamat Tempat Donor</td>
                    <td><input type="text" name="alamatdonor" id="edit_Alamat_Tempat_Donor"  class="form-control"></td>
      			</tr>
      			 <tr>
      				<td>Tanggal Pelaksanaan</td>
      				<td><input type="date" name="tanggal" id="edit_tanggal_waktu_pelaksanaan"  class="form-control"></td>
                </tr>
      			<tr>
      				<td>Nama Koordinator</td>
      				<td><input type="text" name="koordinator" id="edit_Nama_Koordinator"  class="form-control"></td>
      			</tr>
      			<tr>
      				<td>Telp Koordinator</td>
                    <td><input type="number" name="telp" id="edit_Telp_Hp"  class="form-control"></td>
      			</tr>
      			<tr>
      				<td>Email</td>
      				<td><input type="email" name="email" id="edit_Email"  class="form-control"></td>
      			</tr>
      			<tr>
      				<td>Jumlah Pendonor</td>
      				<td><input type="number" name="jumlah" id="edit_Jumlah_pendonor"  class="form-control"></td>
      			</tr>
      			
           		</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Ubah</button></a>
      </div>
    </div>
  </div>
</div>
</form>

<!-- tabel -->

<div style="float: right">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  		<i class="fa fa-plus"></i> tambah
		</button>
	</div>
	<table class="table" style="font-size:15px;">
        <thead class="table-dark">
		<tr>
			<td>No</td>
			<td>Nama Instansi</td>
			<td>Alamat</td>
			<td>Alamat Tempat Donor</td>
			<td>Tanggal Waktu Pelaksanaan</td>
            <td>Nama Koordinator</td>
            <td>Telp Koordinator</td>
            <td>Email</td>
            <td>Jumlah Pendonor</td>
            <td></td>
            <td></td>
		</tr>
        </thead>

<tbody class="table">
            @foreach ($datamobil as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->Nama_instansi }}</td>
                <td>{{ $item->Alamat_instansi }}</td>
                <td>{{ $item->Alamat_Tempat_Donor }}</td>
                <td>{{ $item->tanggal_waktu_pelaksanaan }}</td>
                <td>{{ $item->Nama_Koordinator }}</td>
                <td>{{ $item->Telp_Hp }}</td>
                <td>{{ $item->Email }}</td>
                <td>{{ $item->Jumlah_pendonor }}</td>
                <td class="text-center">
                <a href="#" data-id="{{ $item->id}}" class="btn btn-primary btn-edit" type="button"> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                  </svg></a>
                </td>
                <td>
              <form action="{{ url('/admin/mobil/'. $item->id.'/hapus') }}"   method="post" onsubmit="return confirm('Yakin Hapus Data ?')">
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
<script> 
    $('.btn-edit').on('click',function(){
  // console.log($(this).data('id'))
  let id = $(this).data('id')
  $.ajax({
      url:`/admin/mobil/${id}/edit`,
      method:"GET",
      success: function(data){
        // console.log(data);
        // let parse = JSON.parse(data);
        console.log(data);

        $('#edit_id').val(data.id);
        $('#edit_Nama_instansi').val(data.Nama_instansi);
        $('#edit_Alamat_instansi').val(data.Alamat_instansi);
        $('#edit_Alamat_Tempat_Donor').val(data.Alamat_Tempat_Donor);
        $('#edit_tanggal_waktu_pelaksanaan').val(data.tanggal_waktu_pelaksanaan);
        $('#edit_Nama_Koordinator').val(data.Nama_Koordinator);
        $('#edit_Telp_Hp').val(data.Telp_Hp);
        $('#edit_Email').val(data.Email);
        $('#edit_Jumlah_pendonor').val(data.Jumlah_pendonor);

        $('#exampleModalUpdate').modal('show')
      },
      error:function(error){
        console.log(error)
      }
  })
})       

// $('.btn-delete').on('click',function(){
//   // console.log($(this).data('id'))
//   let id = $(this).data('id')
//   $.ajax({
//       url:`/admin/mobil/${id}/edit`,
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