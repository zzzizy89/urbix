<?php 
namespace App\Models;

use CodeIgniter\Model;

class Teclado extends Model{
    protected $table      = 'teclados';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id_teclado';
     protected $allowedFields = ['nombre','precio','imagen'];
}