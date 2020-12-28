
<html>
<head>

    <title>Cetak Data</title>
</head>

<body>  
@foreach ($cetak as $item)

<div class="form-group">
    <h3><p align="center"><b>Laporan Data Pendonor</b></p></h3>
<table class="static" align="center" rules="all" border="1px" style="font-size:15px; width: 95%;">

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

            </tr>
        </thead>
        <tbody class="table">
            
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
@endforeach

<script>
		window.print();
</script>

</body>
</html>