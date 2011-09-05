<?php get_header(); ?>

	<div class="normal search_form">
		<div class="top"></div>
		<div class="middle">
			<h2>Busca cualquier cosa</h2>
			<form role="search" method="get" id="searchform" action="/" > 
				<div>
					<input type="text" value="" name="s" id="s" /> 
					<input type="submit" id="searchsubmit" value="Buscar" /> 
				</div> 
			</form>
		</div>
		<div class="bottom"></div>
	</div>
	
	
	<div class="normal">
		<div class="top"></div>
		<div class="middle">
			<div id="container">
				<div id="content" role="main">
	<?php if ( have_posts() ) : ?>
					<h1 class="page-title"><?php printf( __( 'Resultados de la búsqueda: %s' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					<?php get_template_part( 'loop', 'search' ); ?>
	<?php else : ?>
					<div id="post-0" class="post no-results not-found">
						<div class="entry-content">
							<h1>No hemos encontrado nada parecido a lo que buscas <strong>:(</strong></h1>
							<p>Si quieres puedes volver al <a href="/">principio</a> o enterarte de las últimas <a href="/noticias">noticias</a>.
						</div>
					</div>
	<?php endif; ?>
				</div>
			</div>

		</div>
		<div class="bottom"></div>
	</div>
	


<?php get_footer(); ?>
