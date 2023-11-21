<?php

namespace App\Controllers;

class Email2 extends BaseController
{
    /*la funcion deberia ser esta  esta en controlador home
    public function contact()
    {
        
        return view('main/primary/contact');
        
    }
    */
   /* public function index()
    {
        
        return view('inicio/vista');
        
    }
    */
    public function enviar_email()
{
    // Obtener datos del formulario
    $nombrecom = $this->request->getPost('nombrecom');
    $emailUsuario = session('user')->email;
    $sumen = $this->request->getPost('mensaje1');
    $asuntoco = $this->request->getPost('asuntoco');
    $numtel = $this->request->getPost('numtel');

    // Configurar el servicio de correo
    $email = \Config\Services::email();
    $email->setFrom($emailUsuario);
    $email->setTo('Keytechempresa@gmail.com');
    $email->setSubject($asuntoco);
    $email->setMessage("De: " . $nombrecom . "\n" . "Numero de telefono: " . $numtel . "\n" . "Mensaje: " . $sumen);

    // Enviar el correo
    if (!$email->send()) {
        // Manejar error si no se puede enviar el correo
        $this->session->setFlashdata('error', 'No se ha podido enviar el correo');
    } else {
        // Mostrar mensaje de éxito y redirigir
        $this->session->setFlashdata('success', 'Correo enviado exitosamente');
        return redirect()->to('contact');
    }
}

}