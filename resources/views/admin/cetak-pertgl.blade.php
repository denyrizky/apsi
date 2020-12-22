
<html>
<head>

    <title>Cetak Data</title>
</head>
<body>
<div class="form-group">
    <h3><p align="center"><b>Laporan Data Jadwal</b></p></h3>
<table class="static" align="center" rules="all" border="1px" style="font-size:15px; width: 95%;">

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


		</tr>
        </thead>

<tbody class="table">
            @foreach ($cetak as $item)

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

                @endforeach
        </tbody>
</table>


<script>
		window.print();
</script>

</body>
</html>