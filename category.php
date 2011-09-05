<?php get_header(); ?>
	<div class="normal">
		<div class="top"></div>
		<div class="middle">
			<div id="container">
				<div id="content" role="main">

					<h1 class="page-title"><?php
						printf( __( 'Archivos por categoría: %s'), '<span>' . single_cat_title( '', false ) . '</span>' );
					?></h1>
					<?php
						$category_description = category_description();
						if ( ! empty( $category_description ) )
							echo '<div class="archive-meta">' . $category_description . '</div>';

					get_template_part( 'loop', 'category' );
					?>

				</div><!-- #content -->
			</div><!-- #container -->
		</div>
		<div class="bottom"></div>
	</div>

<?php get_footer(); ?>
