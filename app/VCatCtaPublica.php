<?php

namespace App;

use Firebird\Eloquent\Model;

class VCatCtaPublica extends Model
{
    protected $table = 'VCATCTASPUBLICAS';

    protected $hidden = ['ACTIVA', 'MESPRESENTACION', 'MESPRESENTACIONSTR', 'DIAPRESENTACION'];

    public $timestamps = false;
}
