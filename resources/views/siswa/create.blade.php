@extends('template')

@section('main')

<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Input Data Siswa</h3>
				</div>
				<div class="panel-body">
					<form enctype="multipart/form-data" method="post" action="{{ url('siswa') }}"> @csrf
						<div class="row">
							<div class="form-group col-md-6">
								<label>Nama Siswa</label>
								@error('nama_siswa')
								<div class="alert alert-danger alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
									<i class="fa fa-times-circle"></i> {{ $message }}
								</div>
								@enderror
								<input type="text" value="{{ old('nama_siswa') }}" name="nama_siswa" class="form-control" autofocus>
							</div>

							<div class="form-group col-md-6">
								<label>Foto Siswa</label>
								@error('foto')
								<div class="alert alert-danger alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
									<i class="fa fa-times-circle"></i> {{ $message }}
								</div>
								@enderror
								<input type="file" name="foto" class="form-control">
							</div>

							<div class="form-group col-md-12">
								<label>Jenis Kelamin</label><br>
								@error('jenis_kelamin')
								<div class="alert alert-danger alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
									<i class="fa fa-times-circle"></i> {{ $message }}
								</div>
								@enderror
								<label class="radio-inline">
									<input name="jenis_kelamin" value="Laki-laki" @if( old('jenis_kelamin') == "Laki-laki" ) checked @endif type="radio">
									<span><i></i>Laki-laki</span>
								</label>
								<label class="radio-inline">
									<input name="jenis_kelamin" value="Perempuan" @if( old('jenis_kelamin') == "Perempuan" ) checked @endif type="radio">
									<span><i></i>Perempuan</span>
								</label>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="form-group col-md-12 col-md-offset-10">
								<button type="submit" class="btn btn-primary" style="margin-left: -20px;margin-right: 20px">
									<i class="fa fa-check-circle"></i> &nbsp;Simpan
								</button>
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