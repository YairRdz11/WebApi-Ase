<?php

namespace App;

use Firebird\Eloquent\Model;

class VRamosFondo extends Model
{
    protected $table = 'VRAMOSFONDOSSARF';

    public $timestamps = false;

    protected $hidden = ['ACTIVO', 'AUDITABLEOBRAS', 'CTAPUBLICA', 'ORDEN', 'REFCTAPUBLICA', 'REFTIPOAUDITORIA', 'TIPO', 'VISIBLEOBRAS'];
}
