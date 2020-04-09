<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
	protected $table 	= 'mapel';
	protected $fillable = ['kode','nama_mapel','semester'];
	public $timestamps 	= false;

    public function Siswa()
	{
		return $this->belongsToMany(Siswa::class);
	}
}
