<?php get_header(); ?>

		<div id="container">
			<div id="content" class="normal" role="main">
        
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div class="top"></div>
				<div class="middle new">
					<div class="head">
						<div class="image">
							<?php userphoto_the_author_thumbnail() ?>
						</div>
						<div class="title">
							<h1><?php the_title(); ?></h1>
							<p>Escrito el <?php the_time(__('j \d\e F \d\e Y')) ?> por <a><?php the_author() ?></a>.</p>
						</div>
						<div class="back">
							<a href="/noticias">&#8592; Volver a las noticias</a>
						</div>
					</div>
					<div id="post-<?php the_ID(); ?>">
						<div class="entry-meta">
						</div>
						<div class="entry-content">
						  <?php wp_reset_query(); ?>
							<?php 
								$image = get_post_custom_values('image', $post->ID);
								if ($image!=null) {?>
									<img src='/wp-content/themes/CDBetisSanIsidro/plugins/thumb.php?src=<?php echo $image[0]; ?>&amp;h=190&amp;w=190&amp;zc=1&amp;q=100' title='<?php $post->post_title; ?>' align='right' />
								<?php } 
							?>
							<?php wp_reset_query(); ?>
						  
							<?php the_content(); ?>
						</div>
					</div>
					
					<div class="gallery">
            <?php 
              $images = get_post_custom_values('image', $post->ID);
              if ($images!=null) {
                echo '<h2>Las imágenes de la noticia:</h2>';
                foreach ($images as &$value) {
                    echo "<a href='".$value."' rel='prettyPhoto[pp_gal]'><img src='/wp-content/themes/CDBetisSanIsidro/plugins/thumb.php?src=".$value."&amp;h=100&amp;w=100&amp;zc=1&amp;q=100' title='".$post->post_title."' /></a>";
                }
                echo '<span class="click"></span>';
              }							
            ?>
					</div>
				</div>
				<div class="bottom"></div>
				<?php comments_template( '', true ); ?>
			<?php endwhile; ?>
			</div>
		</div>

<?php get_footer(); ?>

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/stylesheets/prettyPhoto.css" />
<script src="<?php wp_js('/javascripts/plugins/jquery.prettyPhoto.js,/javascripts/new.js') ?>" type="text/javascript" charset="utf-8"></script>