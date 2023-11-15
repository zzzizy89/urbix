<?php 
namespace App\Models;

use CodeIgniter\Model;

class Barrio extends Model{
    protected $table      = 'barrio';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id_barrio';
     protected $allowedFields = ['id_ciudad','barrio'];


     public function insertBarrio($barrio,$id_ciudad)
     {
        return $this->insert(['barrio' => $barrio, 'id_ciudad' => $id_ciudad]);
     }
}