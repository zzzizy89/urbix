<?php 
namespace App\Controllers;
use App\Models\Compras;
use CodeIgniter\Controller;

class Comprass extends Controller{
    public function index()
    {
        $user = session('user');

        if (!$user || $user->id_user < 1) {
            return redirect()->to('login');
        } else {
            return view('main/form/compras');
        } 
}
public function cancelar()
    {
        return view('main/form/carrito2');
}
}