<?php 
namespace App\Models;

use CodeIgniter\Model;

class Ciudad extends Model{
    protected $table      = 'ciudad';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id_ciudad';
     protected $allowedFields = ['id_prov','ciudad'];

}