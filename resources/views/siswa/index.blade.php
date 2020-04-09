@extends('template')

@section('main')

<div class="main">
	<div class="main-content">
		<div class="container-fluid">

			{{-- Alert Sukses --}}
			@if( session('sukses') )
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				<i class="fa fa-check-circle"></i> {{ session('sukses') }}
			</div>
			@endif

			{{-- Search --}}
			<form action="/siswa" method="get">
				<div class="input-group col-md-4">
					<input id="input-cari" type="text" onkeyup="stoppedTyping()" name="cari" value="" class="form-control" placeholder="Cari data siswa..." autofocus>
					<span class="input-group-btn">
						<button id="tombol-cari" type="submit" disabled class="btn btn-primary">Cari</button>
					</span>
				</div>
			</form>

			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Data Siswa</h3>
					@if(auth()->user()->role == "admin")
					<div class="right">
						<a href="siswa/create" class="btn btn-default" style="padding:10"><i class="fa fa-plus-square"></i></a>
					</div>
					@endif
				</div>
				<div class="panel-body">
					<table class="table table-condensed table-hover table-responsive">
						<thead>
							<tr>
								<th>ID</th>
								<th>Nama Siswa</th>
								<th>Jenis Kelamin</th>
								@if(auth()->user()->role == "admin")
								<th class="text-center">Opsi</th>
								<th>Nilai Siswa</th>
								@endif
							</tr>
						</thead>
						<tbody>
							
							@foreach($siswa as $value)
							<tr>
								<td>{{ $value->id }}</td>
								<td>{{ $value->nama_siswa }}</td>
								<td>{{ $value->jenis_kelamin }}</td>
								@if(auth()->user()->role == "admin")
								<form method="post" action="siswa/{{$value->id}}">@csrf @method('DELETE')
									<td class="text-center">
										<a class="btn btn-primary" href="siswa/{{$value->id}}/edit"><i class="fa fa-refresh">&nbsp; Edit</i></a>
										<button type="submit" class="btn btn-danger" onclick="return confirm('Data siswa {{ $value->nama_siswa }} akan dihapus?');"><i class="fa fa-trash">&nbsp; Hapus</i></button>
									</td>
								</form>
								<td>
									<a class="btn btn-primary" href="siswa/{{$value->id}}/nilai">Detail Nilai</a>
								</td>
								@endif
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

<script type="text/javascript">
function stoppedTyping() {
	 if(document.getElementById("input-cari").value==="") { 
            document.getElementById('tombol-cari').disabled = true; 
        } else { 
            document.getElementById('tombol-cari').disabled = false;
        }
    }
</script>