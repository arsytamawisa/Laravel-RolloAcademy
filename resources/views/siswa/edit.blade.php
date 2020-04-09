@extends('template')

@section('main')

<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Edit Data Siswa</h3>
				</div>
				<div class="panel-body">
					<form enctype="multipart/form-data" method="post" action="{{url('siswa')}}/{{ $siswa->id }}"> @csrf
						@method('PUT')
						<div class="row">
							<div class="form-group col-md-6">
								<label>Nama Siswa</label>
								<input type="text" value="{{ $siswa->nama_siswa }}" name="nama_siswa"
									class="form-control">
							</div>
							<div class="form-group col-md-6">
								<label>Foto Siswa</label>
								@error('foto')
								<div class="alert alert-danger alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
											aria-hidden="true">×</span></button>
									<i class="fa fa-times-circle"></i> {{ $message }}
								</div>
								@enderror
								<input type="file" name="foto" class="form-control">
							</div>
							<div class="form-group col-md-6">
								<label>Jenis Kelamin</label><br>
								<label class="radio-inline">
									<input name="jenis_kelamin" value="Laki-laki" @if($siswa->jenis_kelamin ==
									'Laki-laki') checked @endif type="radio">
									<span><i></i>Laki-laki</span>
								</label>
								<label class="radio-inline">
									<input name="jenis_kelamin" value="Perempuan" @if($siswa->jenis_kelamin ==
									'Perempuan') checked @endif type="radio">
									<span><i></i>Perempuan</span>
								</label>
							</div>
							<div class="form-group col-md-6">
								<img height="250" src="{{ $siswa->defaultImage() }}">
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="form-group col-md-6">
								<button type="submit" class="btn btn-primary" style="margin-right:20px"><i
										class="fa fa-refresh"></i> Update</button>
								<a href="/siswa" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i></a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection