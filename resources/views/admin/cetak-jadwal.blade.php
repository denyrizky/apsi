
@extends("adminlte::page")
<!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> -->

@section("content")

<div class="content" >
    <div class="card card-info card-outline" style="width: 40%;">
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
            <a href="" onclick="this.href='/admin/cetak/pertanggal/'+ document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value " target="_BLANK" class="btn btn-primary col-md-12">Cetak Laporan Pertanggal <i class="fas fa-print"></i></a>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection