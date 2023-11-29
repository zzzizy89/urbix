<?php 
namespace App\Models;

use CodeIgniter\Model;

class Direccion_ca extends Model{
    protected $table      = 'direccion_ca';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id_direccion_casa';
     protected $allowedFields = ['id_barrio','id_calle','id_user','codigo_postal','numero','descripcion_casa']; 

     public function insertDireccion($id_calle,$codigo_postal,$id_user,$numero,$descripcion_casa,$id_barrio)
    {
        $this->insert([
        'id_calle' => $id_calle,'codigo_postal' => $codigo_postal,'id_user' => $id_user,'numero' => $numero,'descripcion_casa' => $descripcion_casa,'id_barrio' => $id_barrio,]);
        return $this->insertID();
    }
}