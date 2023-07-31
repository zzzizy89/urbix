<?php 
namespace App\Models;

use CodeIgniter\Model;

class Teclado extends Model{
    protected $table      = 'teclados';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id';
     protected $allowedFields = ['nombre','imagen'];
}