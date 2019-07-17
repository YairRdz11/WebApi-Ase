<?php

namespace App;
use Firebird\Eloquent\Model;

use Illuminate\Database\Eloquent\Model;

class VAuditoria extends Model
{
    protected $table = 'VAUDITORIAS';

    protected $hidden = [
        'ENTEAUDITADO',
        'NOMBRE_INSTITUCIONAL',
        'REFCTAPUBLICA',
        'TIPOCTAPUBLICA',
        'TIPO',
        'REFENTE',
        'FECHAINI',
        'FECHAFIN',
        'PERIODOAUDITADO',
        'TERMINADA',
        'ACTIVA',
        'UNIVERSOBALANCE',
        'UNIVERSOINGRESO',
        'UNIVERSOEGRESO',
        'METABALANCE',
        'METAINGRESO',
        'METAEGRESO',
        'INFOPUBLICA',
        'DESCRIPCION',
        'INDICADORGENERAL',
        'FECHACAPTURA',
        'MONTOEJERCIDO',
        'MONTOEJERCIDOOBRAS',
        'ESTADO',
        'ADMINISTRACIONES',
        'TIPOPODER',
        'TIPOAUDITORIA',
        'REFTIPOAUDITORIA'
    ];

    public $timestamps = false;
}
