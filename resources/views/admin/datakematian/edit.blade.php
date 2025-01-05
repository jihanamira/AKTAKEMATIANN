@extends('template_backend.home')
@section('sub-judul','Tambah Data kematian ')
@section('content')

	@if(count($errors)>0)
	 @foreach($errors->all() as $error)
		<div class="alert alert-danger" role="alert">
			{{ $error }} 
		</div>
	 @endforeach
	@endif

	@if(Session::has('success'))
		<div class="alert alert-success" role="alert">
			{{ Session('success') }} 
		</div>
	@endif


<form action="{{ route('datakematian.update', $datakematian->id ) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('patch')

<div class="form-group">
    <label>Kecamatan</label>
	<select class="form-control select2" name="kecamatan_id" id="kecamatan_id" required>
		<option value="">Pilih Kecamatan</option>
		@foreach($kecamatans as $kecamatan)
			<option value="{{ $kecamatan->id }}">{{ $kecamatan->nama }}</option>
		@endforeach
	</select>
</div>

<div class="form-group">
    <label>Kelurahan</label>
	<select class="form-control select2" name="kelurahan_id" id="kelurahan_id" required>
		<option value="">Pilih Kelurahan</option>
	</select>
</div>

<div class="form-group">
    <label>nama_jenazah</label>
    <input type="text" class="form-control" name="nama" value="{{ $datakematian->nama }}">
</div>

<div class="from-group">
     <label>Jenis Kelamin</label>
     <br>
    <input name="jenis_kelamin" type="radio" value="Laki-laki">Laki-laki
    <input name="jenis_kelamin" type="radio" value="Perempuan">Perempuan <br><br>
</div>

<div class="from-group">
	 <label>tanggal kematian</label>
    <input type="date" class="form-control" name="tanggal_kematian" value="{{ $datakematian->tanggal_kematian }}">
</div>
<div class="from-group">
	 <label>anak ke </label>
    <input type="text" class="form-control" name="anak_ke" value="{{ $datakematian->anak_ke }}">
</div>

<div class="from-group">
	 <label>Nomor Induk Kependudukan</label>
    <input type="text" class="form-control" name="nik" value="{{ $datakematian->nik }}">
</div>

<div class="from-group">
	 <label>Nomor Kartu Keluarga</label>
    <input type="text" class="form-control" name="nokk" value="{{ $datakematian->nokk }}">
</div>

<div class="form-group">
    <label>Status Hubungan Dalam Keluarga </label>
        <select class="form-control select2" name="status_keluarga" value="{{ $datakematian->status_keluarga }}">
            <option>Pilih Status Keluarga</option>
            <option>Kepala Keluarga</option>
            <option>Istri</option>
            <option>Anak</option>
        </select>
</div>

<div class="from-group">
     <label>Gambar</label>
    <input type="file"  class="form-control" name="gambar">
</div>

 <div class="form-group">
    <button class="btn btn-primary btn-block">Simpan Akta Kematian</button>
</div>
</form>

@endsection  
@push('scripts')
	
<script>
	$(document).ready(function() {

		$("#kecamatan_id").on('change', function (e) {
			$.ajax({
				method: 'POST',
				headers: {
					'X-CSRF-Token': "{{ csrf_token() }}"
				},
				url: "{{ route('kelurahan.list') }}",
				data: {
					kecamatan_id : $(this).val()
				},
				success: function(result) {
					$("#kelurahan_id").empty();
					$("#kelurahan_id").append(`<option value="">
						Pilih Kelurahan
					</option>`);

					result.data.map(v => {
						$("#kelurahan_id").append(`<option value="${v.id}">
							${v.nama}
						</option>`);
					})
				},
				error: function(err){
					console.log(error)
				}
			});
		})
	})
</script>
@endpush