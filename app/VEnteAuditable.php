<?php

namespace App;

use Firebird\Eloquent\Model;

class VEnteAuditable extends Model
{
    protected $table = 'VENTESAUDITABLES';

    public $timestamps = false;
}
