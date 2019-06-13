<?php

namespace App;

use Firebird\Eloquent\Model;

class VCatProcedimiento extends Model
{
    protected $table = 'VCATPROCEDIMIENTO';

    protected $hidden = ['RAMO', 'ORDEN', 'ACTIVO', 'NIVEL', 'DESCNIVEL', 'REFCATPROCEDIMIENTO', 'EJERCICIO',
                        'DESCRIPCION_LARGA', 'MUESTRATITULO'. 'MUESTRADETALLE'. 'MUESTRAANEXO', 'MUESTRAANEXO'];

    public $timestamps = false;
}
