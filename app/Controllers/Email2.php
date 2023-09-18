<?php

namespace App\Controllers;

class Email2 extends BaseController
{
    public function index()
    {
        
        return view('inicio/vista');
        
    }
    public function enviar__email()
    {
        $nombrecom = $this->request->getPost('nombrecom');
        $emailUsuario = session('user')->email; // Obtener el correo electrónico del usuario desde la sesión
        $sumen = $this->request->getPost('mensaje1');
        $asuntoco = $this->request->getPost('asuntoco');
        $numtel = $this->request->getPost('numtel');
    
        $email = \Config\Services::email();
        
        $email->setFrom('TESTING@example.com', 'Test');
        $email->setTo($emailUsuario); // Utilizar el correo electrónico del usuario
    
        $email->setSubject($asuntoco);
        $email->setMessage("De: " . $nombrecom . "\n" . "Numero de telefono: " . $numtel . "\n" . "Mensaje: " . $sumen);
    
        if (! $email->send()) {
            echo "No se ha podido enviar el correo";    
        } else {
            echo "Correo enviado exitosamente";
        }
    }
        
            
}