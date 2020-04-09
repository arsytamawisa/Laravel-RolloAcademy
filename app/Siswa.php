<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
	protected $table 	= 'siswa';
	protected $fillable = ['nama_siswa','jenis_kelamin','foto','role'];

	public function defaultImage()
	{
		if(!$this->foto)
		{
			return asset('foto/default.png');
		}
		return asset('foto/' . $this->foto);
	}

	public function mapel()
	{
		return $this->belongsToMany(Mapel::class)->withPivot(['nilai']);
	}
}
