<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Teclado;

class Test extends Controller
{
    public function index()
    {
        $teclado = new Teclado();

        $datos['teclados'] = $teclado->orderBy('id', 'ASC')->findAll();

        $datos['cabecera'] = view('templates/cabecera');
        $datos['pie'] = view('templates/piepagina');

        // Cargamos la vista "test.php" con los mismos datos
        $vistaTest = view('inicio/test', $datos);

        // Devolvemos la vista
        return $vistaTest;
    }
}