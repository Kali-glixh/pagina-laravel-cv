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
    ];

    function getPath() {
        $url = url('assets/img/fotografia.jpg');
        if($this->path != null) {
            $url = url('storage/' . $this->path);
        }
        return $url;
    }
}