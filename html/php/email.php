<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/Exception.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';

class envioEmail {
    private $mail;
    private $emailAddress;
    private $password;
    
    function __construct($email){
        $this->emailAddress = $email;
        //Crear un objeto nuevo email
        $this->mail = new PHPMailer();
        //Usamos SMTP
        $this->mail->isSMTP();
        //Asignamos el servidor
        $this->mail->Host = 'smtp.gmail.com';
        // usar
        // $this->mail->Host = gethostbyname('smtp.gmail.com');
        //Asignar el número de puerto SMTP  - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $this->mail->Port = 587;

        //Asignar el mecanismo de encriptación - STARTTLS or SMTPS
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        //Activamos comunicación segura SMTP authentication
        $this->mail->SMTPAuth = true;

    }

    function sendMail() {

        //Usuario que se logea en gmail - hay que usar la misma dirección de email completa
        $this->mail->Username = 'agarcas2302.alumnado@politecnicomalaga.com';

        //Contraseña de gthis->mail para la SMTP authentication
        $this->mail->Password = '26301424G';

        //Asignar el 'desde'
        $this->mail->setFrom('agarcas2302.alumnado@politecnicomalaga.com', 'Tienda Web 3.0');

        // reply-to address
        $this->mail->addReplyTo('agarcas2302.alumnado@politecnicomalaga.com', 'Tienda Web 3.0');

        //Dirección de envío
        $this->mail->addAddress('antonioabelgarcia@gmail.com', 'Antonio Abel Garcia');

        //Ponemos el asunto
        $this->mail->Subject = 'Aviso de Insercion en Tienda Web 3.0';

        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        //$this->mail->msgHTML(file_get_contents('contents.html'), __DIR__);
        $this->mail->msgHTML("<h2>Aviso</h2><br><h3><p>Mensaje generado automaticamente.</p> <p>Le informamos de que el ".date(DATE_RFC2822)." fue insertado un nuevo producto en Tienda Web 3.0 </p></h3>", __DIR__);
        //Replace the plain text body with one created manually
        $this->mail->AltBody = 'This is a plain-text message body';

        //Attach an image file
        //$mail->addAttachment('images/phpmailer_mini.png');

        //send the message, check for errors
        $this->mail->send();
    }

}