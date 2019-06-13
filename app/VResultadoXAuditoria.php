<?php

namespace App;

use Firebird\Eloquent\Model;

class VResultadoXAuditoria extends Model
{
    protected $table = 'VRESULTADOXAUDITORIA';

    //protected $hidden = ['NIVEL', 'OBSERVACION', 'MUESTRATITULO', 'MUESTRADETALLE', 'MUESTRAANEXO', 'ACTIVA'];

    public $timestamps = false;
}
