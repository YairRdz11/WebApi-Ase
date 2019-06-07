<?php

namespace App;

use Firebird\Eloquent\Model;

class PERSONAL extends Model
{
    /**
   * Table associated with the model
   *
   * @var string
   */
  protected $table = 'PERSONAL';
  /**
   * Primary key of the model
   *
   * @var string
   */
  protected $primaryKey = 'IDPERSONAL';
   /**
   * Our model does not have a timestamp
   *
   * @var bool
   */
  public $timestamps = false;
  protected $fillable = ['IDPERSONAL', 'NOMBRECORTO', 'IDPUESTO', 'IDAREA'];
}
