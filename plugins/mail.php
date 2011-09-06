<?
  $path = $_SERVER['DOCUMENT_ROOT'];
  include_once $path . '/wp-config.php';
  
  //If the request is a post, insert the data into the table
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    savePartner($_POST['name'],$_POST['surname'],$_POST['partner_type'],$_POST['address'],$_POST['postal_code'],$_POST['city'],$_POST['province'],$_POST['phone'],$_POST['email'],$_POST['partner_number']);
  }

  $text = 'Gracias por elegir formar parte de la historia del club. Ya disponemos de tus datos, los cuales son confidenciales, y solo
      los utilizaremos para poder enviarte el nuevo carnet de socio del CD Betis San Isidro.
      Ahora solo falta el ingreso de la cantidad elegida en el formulario, recuerda:
        
          '.$_POST['partner_type'].'
        
      Los datos para realizar la transferencia son:
    
          Numero de cuenta: 20381801246000321663
          Concepto: '.$_POST['name'].' '.$_POST['surname'].'
        
    
      En cuanto se confirme el pago nos pondremos en contacto contigo mediante el correo electrónico que nos has facilitado.
    
    
      Un saludo.
    
          CD BETIS SAN ISIDRO';
          
  $email_data = '
    nombre:     '.$_POST['name'].'
    apellidos:  '.$_POST['surname'].'
    dirección:  '.$_POST['address'].'
    cod.postal: '.$_POST['postal_code'].'
    ciudad:     '.$_POST['city'].'
    provincia:  '.$_POST['province'].'
    teléfono:   '.$_POST['phone'].'
    email:      '.$_POST['email'].'
    num.socio:  '.$_POST['partner_number'].'
  ';
  
  $from = 'betis@cdbetissanisidro.com';
  $to = $_POST['email'];
  $subject = 'subject'; 
  $headers = "From: ". $from . "\n";
  mail_utf8($to, $subject, $text, $headers);
  header('Location: /gracias/'); 
  
  function mail_utf8($to, $subject = '(No subject)', $message = '', $header = '') { 
    $header_ = 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/plain; charset=UTF-8' . "\r\n"; 
    mail($to, '=?UTF-8?B?'.base64_encode($subject).'?=', $message, $header_ . $header); 
  }
?>