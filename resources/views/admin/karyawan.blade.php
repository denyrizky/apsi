
@extends("adminlte::page")
@section("content")
	<div style="float: right">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  		<i class="fa fa-plus"></i> tambah
		</button>
	</div>
	<div> </div>
	<table class="table">
		<tr>
			<td>No</td>
			<td>NIDN</td>
			<td>Name</td>
			<td>Jabatan</td>
			<td>Action</td>
		</tr>
	</table>
<!-- Button trigger modal -->

@php($i=0);
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
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Karyawan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="/admin/daftar" method="POST"> 
      		{{ csrf_field() }}
      		<table width="100%">
      			<tr>
      				<td>nama</td>
      				<td ><input type="text" name="nama" class="form-control "></td>
      			</tr>
      			<tr>
      				<td>username</td>
      				<td><input type="text" name="username"  class="form-control"></td>
      			</tr>
      			<tr>
      				<td>jabatan</td>
      				<td>
      					<select name="jabatan" id="jabatan" class="form-control">
      				@foreach($data2 as $datas)
      						<option value="{{$i}}">{{$datas->jabatan}}</option>
      					@endforeach
      					</select>
      				</td>
      			</tr>
      			 <tr>
      				<td>Bagian</td>
      				<td>
      					<select  name="bagian" class="form-control"> 
      				    @foreach($data3 as $datas)
      						<option value="{{$i}}">{{$datas->nama_bagian}}</option>
      					@endforeach
      					</select>
      				</td>
      			</tr>
      			<tr>
      				<td>Email</td>
      				<td><input type="email" name="email"  class="form-control"></td>
      			</tr>
      			<tr>
      				<td>Status</td>
      				<td>
      					<select  class="form-control"> 
      						<option>Menikah</option>
      						<option>Lajang</option>
      					</select>
      				</td>
      			</tr>
      			<tr>
      				<td>Jumlah Anak</td>
      				<td><input type="text" name="jabatan"  class="form-control"></td>
      			</tr>
      			<tr>
      				<td>Golongan</td>
      				<td><select name="golongan" id="golongan" class="form-control">>
      					@foreach($data1 as $datas)
      						<option value="{{$i++}}">{{ $datas->golongan }}</option>
      					@endforeach
      					</select>
      				</td>
      			</tr>
      			<tr>
      				<td>No telp</td>
      				<td>
      					<input type="text" name="noTelp"  class="form-control">
      				</td>
      			</tr>
      			<tr>
      				<td>Alamat </td>
      				<td><input type="text" name="alamat"  class="form-control"></td>
      			</tr>
      			<tr>
      				<td>NIK</td>
      				<td><input type="text" name="nik"  class="form-control"></td>
      			</tr>
      			<tr>
      				<td>Tanggal Masuk</td>
      				<td><input type="date" name="tahun_masuk"  class="form-control"></td>
      			</tr>
           		</table>
      	 </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
       <a href="/admin/daftar"> <button type="button" class="btn btn-primary">Tambah</button></a>
      </div>
    </div>
  </div>
</div>
@endsection
