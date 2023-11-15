<?php 
namespace App\Models;

use CodeIgniter\Model;

class Provincia extends Model{
    protected $table      = 'provincia';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id_prov';
     protected $allowedFields = ['id_pais','provincia'];

     public function insertProvincia($id_pais, $provincia)
     {
        return $this->insert(['id_pais' => $id_pais, 'provincia' => $provincia]);
     }
}