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
		<title>Error | CD Betis San Isidro</title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<!--[if IE]> <link href="/wp-content/themes/CDBetisSanIsidro/ie.css" rel="stylesheet" type="text/css" /> <![endif]-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript" charset="utf-8"></script>

		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php

			if ( is_singular() && get_option( 'thread_comments' ) )
				wp_enqueue_script( 'comment-reply' );

			wp_head();
		?>
	</head>

	<body <?php body_class(); ?>>
		<div class="normal">
			<div class="error404">
				<h1>Ups! Esto no debería ocurrir...</h1>
				<p>Lo siento, pero esta página no existe o no se encuentra ya en nuestros archivos...Si quieres puedes volver al <a href="/">principio</a> o enterarte de las últimas <a href="/noticias">noticias</a>.</p>
			</div>
		</div>
		
		<script src="<?php wp_js('/javascripts/plugins/supersized.js,/javascripts/error.js') ?>" type="text/javascript" charset="utf-8"></script>

	</body>
</html>
