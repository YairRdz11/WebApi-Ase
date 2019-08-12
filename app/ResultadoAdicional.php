<?php

namespace App;
use Firebird\Eloquent\Model;

class ResultadoAdicional extends Model
{
    protected $table = 'RESULTADOADICIONAL';

    protected $hidden = [
        'REFRESULTADOXAUDITORIA',
        'ARCHIVO'
    ];

    public $timestamps = false;
}
