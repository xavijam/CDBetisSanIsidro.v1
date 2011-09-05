
  <!DOCTYPE html>
  <html <?php language_attributes(); ?>>
  	<head>
  		<meta charset="<?php bloginfo( 'charset' ); ?>" />
  		<meta name="description" content="Página oficial del Club Deportivo Betis San Isidro, creado en 1941. Actualmente juega en la liga Preferente Grupo II de la comunidad de Madrid. " />
    	<meta name="Keywords" content="equipo, plantilla, calendario, betis, betis san isidro, cd betis san isidro, futbol, preferente II, preferente madrileña, liga, equipo madrileño" />
    	<meta name="Distribution" content="Global" />
    	<meta name="Author" content="C.D. Betis San Isidro" />
    	<meta name="Robots" content="index" />
  		<meta name="DC.title" content="Betis San Isidro" />
  		<meta name="geo.region" content="ES-M" />
  		<meta name="geo.placename" content="Madrid" />
  		<meta name="geo.position" content="40.38049;-3.72402" />
  		<meta name="ICBM" content="40.38049, -3.72402" />
  		<meta name="google-site-verification" content="fC26K3080dm1Cp8GstCO-W3vx_BHY0IDP31ekZLIDMM" />
  		<link rel="shortcut icon" href="<?php bloginfo( 'template_url' ); ?>/images/favicon.ico" > 
  		<title>Socios | CD Betis San Isidro</title>
  		<link rel="profile" href="http://gmpg.org/xfn/11" />
  		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
  		<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700&v2'/>
  		<!--[if IE]> <link href="/wp-content/themes/CDBetisSanIsidro/ie.css" rel="stylesheet" type="text/css" /> <![endif]-->
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>

  		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  	</head>

  	<body <?php body_class(); ?>>
      <div class="short">
        <a class="logo" title="Volver al inicio" href="/">Inicio</a>
    		<div class="top">
    		  <h1 class="fill">Hazte socio</h1>
    		</div>
    		<div class="middle">
    		  <?php 
    		    $today = getdate();
            if ($today['mon'] > 5 && $today['mon'] < 9) {
    		  ?>
      		  <p class="info">Rellena este formulario, solo hay una modalidad a elegir, y recibirás un correo electrónico con las instrucciones de pago.</p>
      			<form method="post" action="/wp-content/themes/CDBetisSanIsidro/plugins/mail.php">
      			  <label>Nombre<sup>*</sup></label>
      			  <input type="text" name="name" value="" class="text"/>
      			  <label>Apellidos<sup>*</sup></label>
      			  <input type="text" name="surname" value="" class="text"/>
      			  <label>Tipo de socio<sup>*</sup></label>
              <select name="partner_type"> 
                 <option value="Socio (Carnet) 30€">Socio (Carnet) 30€</option> 
              </select>
      			  <label>Dirección<sup>*</sup></label>
      			  <input type="text" name="address" value="" class="text"/>
      			  <label>Código postal<sup>*</sup></label>
      			  <input type="text" name="postal_code" value="" class="text short"/>
      			  <label>Ciudad<sup>*</sup></label>
      			  <input type="text" name="city" value="" class="text"/>
      			  <label>Provincia<sup>*</sup></label>
      			  <input type="text" name="province" value="" class="text"/>
      			  <label>Teléfono<sup>*</sup></label>
      			  <input type="text" name="phone" value="" class="text"/>
      			  <label>Email<sup>*</sup></label>
      			  <input type="text" name="email" value="" class="text"/>
      			  <label>Nº socio año 10/11 - <small>Rellenar en caso de ya ser socio</small></label>
      			  <input type="text" name="partner_number" value="" class="text"/>
      			  <p class="error">Faltan datos por rellenar</p>
      			  <input type="submit" value="Enviar datos" class="submit" />
            </form>
            <small>(<sup>*</sup>) Debes rellenar los campos</small>
          <?php 
    		    } else {
    		  ?>
    		    <p class="info">El periodo de inscripción de socios ya ha acabado, aún así puedes mandar un mail <a href="mailto:betis@cdbetissanisidro.com">aquí</a> y atenderemos tu petición.</p>
    		  <?php } ?>
    		</div>
    		<div class="bottom"></div>
    	</div>

  		<script src="<?php wp_js('/javascripts/socios.js') ?>" type="text/javascript" charset="utf-8"></script>

  	</body>
  </html>
