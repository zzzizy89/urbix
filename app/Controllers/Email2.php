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
        // Verificar si el usuario está autenticado
        if (!session('user')) {
            // Puedes personalizar este mensaje según tus necesidades
            echo "Necesitas estar logeado para mandar una consulta";
            return;
        }

        $nombrecom = $this->request->getPost('nombrecom');
        $emailUsuario = session('user')->email;
        $sumen = $this->request->getPost('mensaje1');
        $asuntoco = $this->request->getPost('asuntoco');
        $numtel = $this->request->getPost('numtel');

        $email = \Config\Services::email();

        $email->setFrom($emailUsuario);
        $email->setTo('Keytechempresa@gmail.com');

        $email->setSubject($asuntoco);
        $email->setMessage("De: " . $nombrecom . "\n" . "Numero de telefono: " . $numtel . "\n" . "Mensaje: " . $sumen);

        if (!$email->send()) {
            echo "No se ha podido enviar el correo";
        } else {
            echo "Correo enviado exitosamente";
        }
    }
}