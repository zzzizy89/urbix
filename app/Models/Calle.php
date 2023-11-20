<?php 
namespace App\Models;

use CodeIgniter\Model;

class Calle extends Model{
    protected $table      = 'calle';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id_calle';
     protected $allowedFields = ['calle'];

     public function insertCalle($calle)
     {
         return $this->insert(['calle' => $calle]);
     }
}