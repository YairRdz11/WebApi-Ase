<?php
namespace App;
use Firebird\Eloquent\Model;

class FondoXPlaneacion extends Model
{
    protected $table = 'FONDOSXPLANEACION';

    protected $hidden = [
        'IDFONDOPLANEACION',
        'REFPLANEACION',
        'REFRAMOFONDO',
        'REFAUDITORIA',
        'MONTO',
        'AUDITABLE',
        'MOTIVO',
        'ACTIVO',
        'REFCATENTIDADESFIZ',
        'REFESTADOAUDITORIA',
        'REFTIPOAUDITORIA',
        'MONTOSELECTIVO',
        'PORCENTAJE_MONTOS',
        'OBJETIVO',
        'OBJGRAL',
        'FECHA_INICIO',
        'FECHA_FIN'
    ];

    public $timestamps = false;
}
