@extends('template_backend.home')
@section('sub-judul','Rekap Data Akta Kematian '.$kecamatan->nama)
@section('content')

	@if(Session::has('success'))
		<div class="alert alert-success" role="alert">
			{{ Session('success') }} 
		</div>
	@endif
	
	<form class="form" method="get" action="{{ route('rekap.kematian.search', $kecamatan->id)}}">
		<div class="form-group w-50 mb-3"
		<!--
			<label for="search" class="d-block mr-2">Pencarian</label>
			<input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan keyword">
			<button type="submit" class="btn btn-primary mb-1">Cari</button>
		</div>
	</form>
	<!-- Start kode untuk form pencarian -->

  <div class="row">
	
    <br><br>

	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr bgcolor='DEB887' align='center'>
			<th>No</th>
			<th>Kecamatan</th>
			<th>Kelurahan</th>
			<th>Nama Almarhum Almarhumah</th>
			<th>Jenis Kelamin</th>
			<th>Tanggal Kematian</th>
			<th>Anak Ke</th>
	 		<th>Nomor Induk Kependudukan</th>
			<th>Nomor Kartu Keluarga</th>
			<th>Status Hubungan Dalam Keluarga</th>
			<th>Akta Kematian</th>
			<th>Action</th>
			
		</thead>
		<tbody>
			@foreach ($datakematian as $result => $hasil)
			<tr>
				<td>{{ $result + $datakematian->firstitem() }} </td>
				<td>{{ $hasil->kecamatan->nama }}</td>
				<td>{{ $hasil->kelurahan->nama }}</td>
				<td>{{ $hasil->nama }}</td>
				<td>{{ $hasil->jenis_kelamin }}</td>
				<td>{{ $hasil->tanggal_kematian }}</td>
				<td>{{ $hasil->anak_ke }}</td>
				<td>{{ $hasil->nik }}</td>
				<td>{{ $hasil->nokk }}</td>
				<td>{{ $hasil->status_keluarga }}</td>
				<td><img src="{{ asset( $hasil->gambar ) }}" class="img-fluid" style="width:100px"></td>
				<td>
					<a href="{{ asset( $hasil->gambar ) }}" taget="_blank" class="btn btn-primary btn-sm"><i class="fas fa-print"></i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>


@endsection   