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
  protected $hidden = ['APAT', 'AMAT', 'ACTIVO', 'NONOMINA', 'TRATO', 
    'FECHA_INGRESO','FECHANACIMIENTO', 'IMSS', 'RFC', 'SINDICATO', 
    'IDPERSONALSUPERIOR', 'REFTIPOCONTRATACION', 'ESTADOCIVIL', 
    'SEXO', 'CURP', 'DIR1', 'DIR2', 'DIR3', 'TELEFONO', 'CELULAR', 
    'TELEMERGENCIA', 'SUELDOBASE', 'PRESTMENSFIJAS', 'PRESTANUALVARPESOS', 
    'PRESTANUALDIAS', 'NIVEL', 'COMPENSACIONES', 'NUMCUENTA', 'DATOSPUBLICOS', 
    'FIRMA', 'PRESTMENSUALDIAS', 'EXTENSION', 'BAJA_ACTIVA', 'CORRESPONDENCIA', 
    'EMAIL', 'UBICACION', 'TELEFONO_EXT', 'PERMISO', 'INCAPACIDAD', 'CATEGORIA', 
    'TIPOUSUARIOATIENDE', 'CUENTACONTABLE'];
    
}
