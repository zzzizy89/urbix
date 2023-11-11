<?php 
namespace App\Models;

use CodeIgniter\Model;

class Metodo_pago extends Model{
    protected $table      = 'metodo_pago';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id_metodo_pago';
     protected $allowedFields = ['metodo_pago'];
}