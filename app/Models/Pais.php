<?php 
namespace App\Models;

use CodeIgniter\Model;

class Pais extends Model{
    protected $table      = 'pais';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id_pais';
     protected $allowedFields = ['pais'];

     public function insertPais($pais)
{
    return $this->insert(['pais' => $pais]);
}
}