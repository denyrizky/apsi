@extends('pegawai.layout')

@section('content')


<section id="home" class="video-hero" style="height: 700px; background-image: url(images/cover_img_1.jpg);  background-size:cover; background-position: center center;background-attachment:fixed;" data-section="home">
		<div class="overlay"></div>
			<a class="player" data-property="{videoURL:'https://www.youtube.com/watch?v=vqqt5p0q-eU',containment:'#home', showControls:false, autoPlay:true, loop:true, mute:true, startAt:0, opacity:1, quality:'default'}"></a> 
			<div class="display-t text-center">
				<div class="display-tc">
					<div class="container">
						<div class="col-md-12 col-md-offset-0">
							<div class="animate-box">
									<div class="w-50 h-75" style="background-color: white"></div>
                                    <div class="content" >
    <div class="card card-info card-outline" style="width: 20%;">
        <div class="card-header">
            <h3>Print Data Jadwal</h3>
        </div>
        <div class="car-body">
            <div class="input-group mb-3">
            <label for="label">Tanggal Awal</label>
            <input type="date" name="tglawal" id="tglawal" class="form-control" />
            </div>
            <div class="input-group mb-3">
            <label for="label">Tanggal Akhir</label>
            <input type="date" name="tglakhir" id="tglakhir" class="form-control" />
            </div>
            <div class="input-group mb-3">
            <br><a href="" onclick="this.href='cetak/'+ document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value " target="_BLANK" class="btn btn-primary col-md-12">Cetak Laporan Pertanggal <i class="fas fa-print"></i></a>
            </div>
            </div>
        </div>
    </div>
</div>

</div>
						</div>
					</div>
				</div>
			</div>
		</section>
  

@endsection  