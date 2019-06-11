<?php

namespace App;

use Firebird\Eloquent\Model;

class VEnteAuditable extends Model
{
    protected $table = 'VENTESAUDITABLES';

    public $timestamps = false;

    protected $hidden = ['NOMBRE_INSTITUCIONAL', 'REFCTAPUBLICA', 'CTAPUBLICA', 'MESPRESENTACION', 'DIAPRESENTACION', 'ACTIVO', 'NOMBRE_CORTO', 'ORDENCLAVE'];
}
