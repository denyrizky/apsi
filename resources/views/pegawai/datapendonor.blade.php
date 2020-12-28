
@extends('pegawai.layout')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet" />

<style>
#buttons {
  padding-top: 10px;
  text-align: center;
}

/* start da css for da buttons */
.btn {
  border-radius: 5px;
  padding: 5px 5px;
  font-size: 20px;
  text-decoration: none;
  margin: 10px;
  color: #fff;
  position: relative;
  display: inline-block;
}

.btn:active {
  transform: translate(0px, 5px);
  -webkit-transform: translate(0px, 5px);
  box-shadow: 0px 1px 0px 0px;
}

.blue {
  padding-left: 30px;
  background-color: #55acee;
  box-shadow: 0px 5px 0px 0px #3C93D5;
}

.blue:hover {
  background-color: #6FC6FF;
}
.red {
  background-color: #e74c3c;
  box-shadow: 0px 5px 0px 0px #CE3323;
}

.red:hover {
  background-color: #FF6656;
}
</style>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Input Data Pendonor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="{{action('DataPendonorController@input')}}">
                        @csrf
                            <div class="form-group">
                              <label>ID Pendonor</label>
                              <input type="numer" name="reg_id" value="{{ $lastID }}" readonly class="form-control" required>
                            </div>
                            <div class="form-group">
                            <label>KTP</label>
                              <input type="text" name="ktp" class="form-control" required>
                            </div>
                            <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label>Kelurahan</label>
                            <input type="text" name="kelurahan" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label>Kecamatan</label>
                            <input type="text" name="kecamatan" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label>Kode Pos</label>
                            <input type="text" name="kodepos" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" id="sel1" name="jk" class="form-control" required>
                                <option>Laki-Laki</option>
                                <option>Perempuan</option>
                               </select>
                          </div>
                          <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" name="TL" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="TglL" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label>Status</label>
                            <input type="text" name="status" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label>Golongan Darah</label>
                            <input type="text" name="goldar" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label>No Telepon</label>
                            <input type="number" name="notel" class="form-control" required>
                          </div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
    </form>
  </div>
</div>
<!-- update modal -->
<!-- tai memang -->
<div class="modal fade" id="exampleModalCenterEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Data Pendonor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{action('DataPendonorController@update')}}">
                        @csrf
                            <input type="hidden" name="id" id="edit_id">
                            <div class="form-group">
                              <label>ID Pendonor</label>
                              <input type="numer" name="reg_id" disabled id="edit_reg_id" disable="true" class="form-control" required>
                            </div>
                            <div class="form-group">
                            <label>KTP</label>
                              <input type="text" name="ktp" id="edit_ktp" value="" class="form-control" required>
                            </div>
                            <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" id="edit_nama" value="" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label>Kelurahan</label>
                            <input type="text" name="kelurahan" id="edit_kelurahan" value="" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label>Kecamatan</label>
                            <input type="text" name="kecamatan" id="edit_kecamatan" value="" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" id="edit_alamat" value="" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label>Kode Pos</label>
                            <input type="text" name="kodepos" id="edit_kodepos" value="" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" id="edit_jk" name="jk" value="" class="form-control" required>
                                <option >Laki-Laki</option>
                                <option >Perempuan</option>
                               </select>
                          </div>
                          <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" name="TL" id="edit_tl" value="" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="TglL" id="edit_tgl" value="" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label>Status</label>
                            <input type="text" name="status" id="edit_status" value="" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label>Golongan Darah</label>
                            <input type="text" name="goldar" id="edit_goldar" value="" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label>No Telepon</label>
                            <input type="number" name="notel" id="edit_notel" value="" class="form-control" required>
                          </div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
    </form>
  </div>
</div>

<!-- <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Peringatan
            </div>
            <div class="modal-body">
            
                <p>anda yakin ingin menghapus data <label id="edit_reg_id"> </label></p>
            </div>
            </form> -->
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a href="/datapendonor/delete" type="submit" class="btn btn-danger btn-ok">Delete</a>


            </div>
        </div>
    </div>
</div>  -->

<!-- tabel -->

<section id="home" class="video-hero" style="height: 700px; background-image: url(images/cover_img_1.jpg);  background-size:cover; background-position: center center;background-attachment:fixed;" data-section="home">
		<div class="overlay"></div>
			<a class="player" data-property="{videoURL:'https://www.youtube.com/watch?v=vqqt5p0q-eU',containment:'#home', showControls:false, autoPlay:true, loop:true, mute:true, startAt:0, opacity:1, quality:'default'}"></a> 
			<div class="display-t text-center">
				<div class="display-tc">
					<div class="container">
						<div class="col-md-12 col-md-offset-0">
							<div class="animate-box">
									<div class="col-md-12 col-md-offset-0" style="background-color: white; padding-right:10%; padding-left:10%; ">
                  
                  <div class="card-body table-responsive"style="margin-left:-5%; margin-right:-5%;">
                <div id="buttons" style ="padding-left:80%">
                            <a href="#" id="add" class="btn blue btn-primary" style ="inline-block;" data-toggle="modal" data-target="#exampleModalCenter">Add</a>
                </div>
            
            <table class="table" style="font-size:15px;" id="tableData" >
	<thead class="table-dark">
            <tr>
                <th>No</th>
                <th>ID Pendonor</th>
                <th>No KTP</th>
                <th>Nama</th>
                <th>Kelurahan</th>
                <th>Kecamatan</th>
                <th>Alamat</th>
                <th>Kode Pos</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Status</th>
                <th>Golongan Darah</th>
                <th>No Telepon</th>
                <th> </th>
                <th> </th>
            </tr>
        </thead>
        <tbody class="table">
            @foreach ($datadonor as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->reg_id }}</td>
                <td>{{ $item->no_KTP }}</td>
                <td>{{ $item->Nama }}</td>
                <td>{{ $item->Kelurahan }}</td>
                <td>{{ $item->Kecamatan }}</td>
                <td>{{ $item->Alamat }}</td>
                <td>{{ $item->Kode_pos }}</td>
                <td>{{ $item->jenis_kelamin }}</td>
                <td>{{ $item->tempat_lahir }}</td>
                <td>{{ $item->tanggal_lahir }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->golongan_darah }}</td>
                <td>{{ $item->NoTelpon_Hp }}</td>
                <td class="text-center">
                <a href="#" data-id="{{ $item->id}}" class="btn btn-primary btn-edit" type="button"> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg></a>
                </td>
                <td>
            <form action="{{ url('datapendonor/'. $item->id.'/edit') }}"   method="post" onsubmit="return confirm('Apakah Yakin Ingin Menghapus Data ini ? ?')">
            @method('delete')
            @csrf
            <button class="btn btn-danger btn-sm">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg>  
            </form>
                </td>
            </tr>

            @endforeach
        </tbody>
</table>
                  </div>
                                    
           
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

<!-- Menampilkan ID -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

 

<script> 


$(function(){
  $.noConflict();

  $('#tableData').DataTable();
});


    $('.btn-edit').on('click',function(){
  // console.log($(this).data('id'))
  let id = $(this).data('id')
  $.ajax({
      url:`/datapendonor/${id}/edit`,
      method:"GET",
      success: function(data){
        // console.log(data);
        // let parse = JSON.parse(data);
        console.log(data.reg_id);

        $('#edit_id').val(data.id);
        $('#edit_reg_id').val(data.reg_id);
        $('#edit_ktp').val(data.no_KTP);
        $('#edit_nama').val(data.Nama);
        $('#edit_kelurahan').val(data.Kelurahan);
        $('#edit_kecamatan').val(data.Kecamatan);
        $('#edit_alamat').val(data.Alamat);
        $('#edit_kodepos').val(data.Kode_pos);
        $('#edit_jk').val(data.jenis_kelamin);
        $('#edit_tl').val(data.tempat_lahir);
        $('#edit_tgl').val(data.tanggal_lahir);
        $('#edit_status').val(data.status);
        $('#edit_goldar').val(data.golongan_darah);
        $('#edit_notel').val(data.NoTelpon_Hp);

        $('#exampleModalCenterEdit').modal('show')
      },
      error:function(error){
        console.log(error)
      }
  })
})       

$('.btn-delete').on('click',function(){
  // console.log($(this).data('id'))
  let id = $(this).data('id')
  $.ajax({
      url:`/datapendonor/${id}/edit`,
      method:"GET",
      success: function(data){
        // console.log(data);
        // let parse = JSON.parse(data);
        console.log(data.reg_id);

        
        $('#confirm-delete').modal('show')
      },
      error:function(error){
        console.log(error)
      }
  })
})   
</script>


@endsection