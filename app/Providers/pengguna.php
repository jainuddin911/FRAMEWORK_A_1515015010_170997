<?php 
namespace App;
use illuminate\Database\Eloquent\Model;

class Pengguna extends Model{
	Protected $table = 'pengguna';
	public function dosen(){
		return $this->hasOne(Dosen::class);
	}
	public function mahasiswa(){
		return $this->hasOne(Mahasiswa::class);
	}
	public function peran(){
		return 
		$this->belongsToMany(Peran::class);
	}
}
 ?>