<?php if (!is_page('Mantenimiento') && !is_page('Socio') && !is_page('Gracias') && !is_page('Listado')) { ?>
	<?php get_header(); ?>
<?php } ?>

		<?php if (is_page('Clasificación')) { ?> 
			<?php get_template_part('templates/clasificacion'); ?>
		<?php } ?>
		
		<?php if (is_page('Primer Equipo')) { ?> 
			<?php get_template_part('templates/primer-equipo'); ?>
		<?php } ?>
		
		<?php if (is_page('Calendario')) { ?> 
			<?php get_template_part('templates/calendario'); ?>
		<?php } ?>
		
		<?php if (is_page('Noticias')) { ?> 
			<?php get_template_part('templates/noticias'); ?>
		<?php } ?>
		
		<?php if (is_page('Resultados')) { ?> 
			<?php get_template_part('templates/resultados'); ?>
		<?php } ?>
		
		<?php if (is_page('F7 Veteranos')) { ?> 
			<?php get_template_part('templates/f7-veteranos'); ?>
		<?php } ?>
		
		<?php if (is_page('Historia')) { ?> 
			<?php get_template_part('templates/historia'); ?>
		<?php } ?>
		
		<?php if (is_page('Club')) { ?> 
			<?php get_template_part('templates/club'); ?>
		<?php } ?>
		
		<?php if (is_page('Imágenes')) { ?> 
			<?php get_template_part('templates/imagenes'); ?>
		<?php } ?>
		
		<?php if (is_page('Restaurante de Guzmán')) { ?> 
			<?php get_template_part('templates/restaurante-de-guzman'); ?>
		<?php } ?>
		
		<?php if (is_page('Rincón de Jose')) { ?>
			<?php get_template_part('templates/rincon-de-jose'); ?>
		<?php } ?>
		
		<?php if (is_page('Gracias')) { ?>
			<?php get_template_part('templates/gracias'); ?>
		<?php } ?>
		
		<?php if (is_page('Hazte socio')) { ?>
			<?php get_template_part('templates/hazte-socio'); ?>
		<?php } ?>
		
		<?php if (is_page('Mantenimiento')) { ?>
			<?php get_template_part('templates/mantenimiento'); ?>
		<?php } ?>
		
		<?php if (is_page('Camino')) { ?>
			<?php get_template_part('templates/camino'); ?>
		<?php } ?>
		
		<?php if (is_page('Pescados Madrid')) { ?>
			<?php get_template_part('templates/pescados-madrid'); ?>
		<?php } ?>
		
		<?php if (is_page('Publicidad')) { ?>
			<?php get_template_part('templates/publicidad'); ?>
		<?php } ?>
		
		<?php if (is_page('Socio')) { ?>
			<?php get_template_part('templates/socio'); ?>
		<?php } ?>
		
    <?php if (is_page('Listado')) { ?>
			<?php get_template_part('templates/listado'); ?>
		<?php } ?>

		
		
<?php if (!is_page('Mantenimiento') && !is_page('Socio') && !is_page('Gracias') && !is_page('Listado')) { ?>
	<?php get_footer(); ?>
<?php } ?>