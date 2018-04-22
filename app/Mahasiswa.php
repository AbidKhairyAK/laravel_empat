<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mahasiswa extends Model
{
    use SoftDeletes;

    protected $table = 'mahasiswa';

    protected $fillable = [
    	'first_name','last_name','email','password','jenis_kelamin','alamat','tanggal_lahir','agama_id'
    ];

    protected $dates = ['deleted_at'];

    public function getNamaAttribute() // <- "get~~~Atribute" Digunakan ketika menampilkan value dari DB
    {
    	return "{$this->first_name} {$this->last_name}";
    }

    public function getJenisKelaminAttribute($value) // <- "get~~~Atribute" Digunakan ketika menampilkan value dari DB
    {
    	if ($value == 'L'){
    		return 'Laki-laki';
    	} else {
    		return 'Perempuan';
    	}
    }
}
