<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';

    protected $useAutoIncremental = true;

    protected $returnType = 'object';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['perfil','name','email','bio','password','created_at'];

    protected $useTimestamps = false;
    protected $createdField = 'created_at';


    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    
    public function isEmailTaken($email)
{
    return $this->where('email', $email)->countAllResults() > 0;
}
public function register($ra)
{
    $this->insert($ra);

}
public function getUserByEmail($email)
{
    return $this->select('id_user, perfil, name, email, bio, rol,password')
                ->where('email', $email)
                ->first();
}

public function updatedashboard($userId, $data)
{
   $this->update($userId, $data);
}
}

