@extends('template')

@section('main')

<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">{{ $siswa->nama_siswa }}</h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="form-group col-md-12">
							<table class="table table-condensed table-hover">
								<thead>
									<tr>
										<th>Kode</th>
										<th>Nama Mapel</th>
										<th>Semester</th>
										<th>Nilai</th>
									</tr>
								</thead>
								<tbody>

									@if(isset($siswa->mapel))
									@foreach($siswa->mapel as $value)
									<tr>
										<td>{{ $value->kode }}</td>
										<td>{{ $value->nama_mapel }}</td>
										<td>{{ $value->semester }}</td>
										<td>{{ $value->pivot->nilai }}</td>
									</tr>
									@endforeach
								</tbody>
								@else
								<tr>
									<td colspan="3" class="text-center">data kosong</td>
								</tr>
								@endif
							</table>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12 col-md-offset-11">
							<a href="/siswa" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection