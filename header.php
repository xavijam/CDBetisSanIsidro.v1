<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="description" content="Página oficial del Club Deportivo Betis San Isidro, creado en 1931. Actualmente juega en la liga Preferente Grupo II de la comunidad de Madrid. " />
  	<meta name="Keywords" content="equipo, plantilla, calendario, betis, betis san isidro, cd betis san isidro, futbol, preferente II, preferente madrileña, liga, equipo madrileño" />
  	<meta name="Distribution" content="Global" />
  	<meta name="Author" content="C.D. Betis San Isidro" />
  	<meta name="Robots" content="index" />
		<meta name="DC.title" content="Betis San Isidro" />
		<meta name="geo.region" content="ES-M" />
		<meta name="geo.placename" content="Madrid" />
		<meta name="geo.position" content="40.38049;-3.72402" />
		<meta name="ICBM" content="40.38049, -3.72402" />
		<meta name="google-site-verification" content="A6VaVDY-hsEsgdTz_0Jp2TS619kZCWAUuIgnx9iozHo" />
		<link rel="shortcut icon" href="<?php bloginfo( 'template_url' ); ?>/images/favicon.ico" > 
		<title><?php if (!is_home() && !is_search()) {wp_title( '| CD Betis San Isidro', true, 'right' );} else {if (is_home()) {echo 'CD Betis San Isidro | Desde 1931';} else {echo 'Resultados para '; echo the_search_query(); echo ' | CD Betis San Isidro';} } ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700&v2'/>
		<!--[if IE]> <link href="<?php echo get_bloginfo('template_url') ?>/ie.css" rel="stylesheet" type="text/css" /> <![endif]-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>

		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php

			if ( is_singular() && get_option( 'thread_comments' ) )
				wp_enqueue_script( 'comment-reply' );

			wp_head();
		?>
	</head>

	<body <?php body_class(); ?>>
	  
	  <?php
		  $using_ie6 = (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 6.') !== FALSE);
		  if ($using_ie6) {
		    echo '<div class="ie6"><p>Estás usuando una versión de navegador bastante antigüa, ¿por qué no lo <a target="_blank" href="http://www.ie6countdown.com/">actualizas</a>?...</p></div>';
		  }
		?>
	
		<div id="outer_layout">
			<div id="layout">
		
				<div id="header">
					<div class="left">
						<a href="/" class="logo"></a>
						<p class="logo"></p>
					</div>
					<div class="right">
						<p>Patrocinado por:</p>
						<div>
							<a class="jose" href="/rincon-de-jose/"></a>
							<a class="madrid" href="/pescados-madrid"></a>
						</div>
					</div>
				</div>
		
				<div id="menu" <?php if ( is_user_logged_in() ) {echo 'class="logged"';} ?>>
					<div class="left">
						<ul>
							<li class="parent"><a href="/">Inicio</a></li>
							<li class="parent">
								<a href="#club">Club</a>
								<ul>
									<li><a class="sub" href="/club">Información</a></li>
									<li><a class="sub disabled">Historia</a></li>
									<li><a class="sub disabled">Imágenes</a></li>
								</ul>
							</li>
							<li class="parent">
								<a href="#equipo">Equipo</a>
								<ul class="team">
									<li><a class="sub disabled">Primer equipo</a></li>
									<li><a class="sub" href="/clasificacion">Clasificación</a></li>
									<li><a class="sub" href="/resultados">Resultados</a></li>
									<li><a class="sub" href="/calendario">Calendario</a></li>
									<li><a class="sub" href="/f7-veteranos">F7 Veteranos</a></li>							
								</ul>
							</li>
							<li class="parent">
								<a href="#social">Social</a>
								<ul class="social">
									<li><a class="sub" href="/noticias/">Noticias</a></li>
									<li><a class="sub" href="http://www.facebook.com/pages/CD-Betis-San-Isidro/99842919645" target="_blank">Facebook</a></li>
									<li><a class="sub" href="http://twitter.com/BetisSanIsidro" target="_blank">Twitter</a></li>
									<li><a class="sub" href="http://www.flickr.com/groups/cdbetissanisidro" target="_blank">Flickr</a></li>
									<li><a class="sub" href="http://www.youtube.com/user/BetisSanIsidro" target="_blank">YouTube</a></li>							
								</ul>
							</li>
							<li class="parent">
								<a href="#sponsors">Sponsors</a>
								<ul class="sponsors">
									<li><a class="sub" href="/rincon-de-jose/">Rincón de Jose</a></li>
									<li><a class="sub" href="http://www.conservaslapiedad.com/" target="_blank">La Piedad</a></li>						
									<li><a class="sub" href="/pescados-madrid/">Pescados Mad.</a></li>
								</ul>						
							</li>
							<li class="parent"><a href="mailto:betis@cdbetissanisidro.com">Contacto</a></li>
						</ul>
					</div>

			

					<?php
						if ( is_user_logged_in() ) {
								global $current_user;
								echo '<div class="right">';
								echo userphoto_thumbnail($current_user);
								//$user_page = (current_user_can('manage_options'))?'/wp-admin':'/usuario/'.$current_user->user_login;
								$user_page = '/wp-admin/';
								echo '<p>Hola <a href="'.$user_page.'">'.$current_user->user_login.'</a>!</p><a href="'. wp_logout_url('/') .'" class="close"></a><div class="close_session"></div></div>';
						} else {
							echo '
								<div class="right">
									<ul>
										<li>
											<a href="/login/?action=register" id="register_link">Registrarse</a>
											<div class="register" id="registerWindow">
												<form name="registerform" id="registerform" action="/login/?action=register" method="post">
													<label>Nombre</label>
													<input type="text" name="user_login" id="user_login" class="text_input"/>
													<label>E-mail</label>
													<input type="text" name="user_email" id="user_email" class="text_input"/>
													<input type="submit" value="" class="submit_button" />
												</form>
											</div>
										</li>
										<li class="last">
											<a href="/login/" id="login_link">Iniciar sesión</a>
											<div id="loginWindow">
												<form name="loginform" id="loginform" action="/login/" method="post">
													<label>Nombre</label>
													<input type="text" name="log" id="user_login" class="text_input"/>
													<label>Contraseña</label>
													<input type="password" name="pwd" id="user_pass" class="text_input"/>
													<input type="hidden" name="redirect_to" value="/" /></input>
													<p><a href="/login/?action=lostpassword">He olvidado la contraseña</a></p>
													<input type="submit" value="" class="submit_button"/>
												</form>
											</div>
										</li>
									</ul>
								</div>
							';
						}
					?>
				</div>