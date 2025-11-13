<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model {

    protected $table = 'alumnos';

    //los campos que se rellenan manualmente
    protected $fillable = [
        'nombre',
        'apellidos',
        'correo',
        'telefono',
        'fecha_nacimiento',
        'nota_media',
        'experiencia',
        'formacion',
        'habilidades',
	'path',
    ];

    function getPath() {
        $url = asset('assets/img/fotografia.jpg');
        if ($this->path) {
		$ruta = str_replace(['public/', 'storage/'], '', $this->path);
		$url = asset('storage/' . $ruta);
   	}
	return $url;
    }
}
