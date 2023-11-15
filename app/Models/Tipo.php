<?php 
namespace App\Models;

use CodeIgniter\Model;

class Tipo extends Model{
    protected $table      = 'tipo';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id_tipoprod';
     protected $allowedFields = ['tipo'];

     public function tipoprod()
     {
        return $this->findAll();
     }
}

