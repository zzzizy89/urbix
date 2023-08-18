<!-- Listo para merge -->
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
        $correo1 = $this->request->getPost('correo1');
        $sumen = $this->request->getPost('mensaje1');
        $asuntoco = $this->request->getPost('asuntoco');
        $numtel = $this->request->getPost('numtel');

        $email = \Config\Services::email();
        
        $email->setFrom('TESTING@example.com', 'Test');
        $email->setTo($correo1);

        $email->setSubject($asuntoco);
        $email->setMessage("De: ".$nombrecom . "\n" ."Numero de telefono: ". $numtel . "\n" ."Mensaje: ". $sumen);

        if (! $email->send())
        {
            echo "no se ah podido enviar el correo";    
        }else{
            echo "correo enviado exitosamente";
        }
    }
        
            
}
