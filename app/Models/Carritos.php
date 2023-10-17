<?php 
namespace App\Models;

use CodeIgniter\Model;

class Carritos extends Model{
    protected $table      = 'carrito';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id_carrito';
     protected $allowedFields = ['id_user','id_teclado','nombre','precio','cantidad','total'];
}