<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $useAutoIncremental = true;

    protected $returnType = 'object';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['perfil','name','email','bio','password','created_at','updated_at'];

    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';


    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    
    public function isEmailTaken($email)
{
    return $this->where('email', $email)->countAllResults() > 0;
}

}

