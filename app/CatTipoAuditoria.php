<?php

namespace App;

use Firebird\Eloquent\Model;

class CatTipoAuditoria extends Model
{
    protected $table = 'CATTIPOSAUDITORIA';

    public $timestamps = false;

    protected $hidden = ['ACTIVO', 'INICIAL', 'DIVAREAS', 'DESCRIPCION_LARGA'];
}
