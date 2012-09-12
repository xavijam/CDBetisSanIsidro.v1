<?
  $path = $_SERVER['DOCUMENT_ROOT'];
  include_once $path . '/wp-config.php';
  
  //If the request is a post, insert the data into the table
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    savePartner($_POST['name'],$_POST['surname'],$_POST['partner_type'],$_POST['address'],$_POST['postal_code'],$_POST['city'],$_POST['province'],$_POST['phone'],$_POST['email'],$_POST['partner_number']);
  }

  $text = 'Gracias por elegir formar parte de la historia del club. Ya disponemos de tus datos, los cuales son confidenciales, y solo
      los utilizaremos para poder enviarte el nuevo carnet de socio del CD Betis San Isidro.
      Ahora solo necesitas ponerte en contacto con nosotros para finalizar el proceso. Puedes hacerlo
      escribiendo un email a <a href="mailto:betis@cdbetissanisidro.com">betis@cdbetissanisidro.com</a>.
    
      Un saludo.
    
          CD Betis San Isidro';
          
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