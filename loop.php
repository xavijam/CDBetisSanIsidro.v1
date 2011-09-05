

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	<div id="nav-above" class="navigation">
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Noticias antiguas') ); ?></div>
		<div class="nav-next"><?php previous_posts_link( __( 'Noticias nuevas <span class="meta-nav">&rarr;</span>') ); ?></div>
	</div><!-- #nav-above -->
<?php endif; ?>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
	<div id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'No encontrado'); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Lo sentimos, pero no hubo resultados para el respectivo archivo. Quizás buscándolo puedas encontrarlo.'); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->
<?php endif; ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php /* How to display posts in the Gallery category. */ ?>

	<?php if ( in_category( _x('gallery', 'gallery category slug') ) ) : ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s'), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<div class="entry-meta">
				<?php cdbetissanisidro_posted_on(); ?>
			</div><!-- .entry-meta -->

			<div class="entry-content">
<?php if ( post_password_required() ) : ?>
				<?php the_content(); ?>
<?php else : ?>
				<div class="gallery-thumb">
<?php
	$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
	$total_images = count( $images );
	$image = array_shift( $images );
	$image_img_tag = wp_get_attachment_image( $image->ID, 'thumbnail' );
?>
					<a class="size-thumbnail" href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>
				</div><!-- .gallery-thumb -->
				<p><em><?php printf( __( 'This gallery contains <a %1$s>%2$s photos</a>.'),
						'href="' . get_permalink() . '" title="' . sprintf( esc_attr__( 'Permalink to %s'), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark"',
						$total_images
					); ?></em></p>

				<?php the_excerpt(); ?>
<?php endif; ?>
			</div><!-- .entry-content -->

			<div class="entry-utility">
				<a href="<?php echo get_term_link( _x('gallery', 'gallery category slug'), 'category' ); ?>" title="<?php esc_attr_e( 'View posts in the Gallery category'); ?>"><?php _e( 'More Galleries'); ?></a>
				<span class="meta-sep">|</span>
				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment'), __( '1 Comment'), __( '% Comments') ); ?></span>
				<?php edit_post_link( __( 'Edit'), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
			</div><!-- .entry-utility -->
		</div><!-- #post-## -->

<?php /* How to display posts in the asides category */ ?>

	<?php elseif ( in_category( _x('asides', 'asides category slug') ) ) : ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if ( is_archive() || is_search() ) : // Display excerpts for archives and search. ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		<?php else : ?>
			<div class="entry-content">
				<?php the_content( __( 'Continuar leyendo <span class="meta-nav">&rarr;</span>') ); ?>
			</div><!-- .entry-content -->
		<?php endif; ?>

			<div class="entry-utility">
				<?php cdbetissanisidro_posted_on(); ?>
				<span class="meta-sep">|</span>
				<span class="comments-link"><?php comments_popup_link( __( 'Deja un comentario'), __( '1 Comentario'), __( '% Comentarios') ); ?></span>
				<?php edit_post_link( __( 'Editar'), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
			</div><!-- .entry-utility -->
		</div><!-- #post-## -->

<?php /* How to display all other posts. */ ?>

	<?php else : ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<?php 
				$image = get_post_custom_values('image', $post->ID);
				if ($image!=null) {?>
					<img style="float:left; padding:2px; margin:0 10px 0 0; border:1px solid #CCCCCC" src='http://www.cdbetissanisidro.es/wp-content/themes/CDBetisSanIsidro/plugins/thumb.php?src=<?php echo $image[0]; ?>&amp;h=40&amp;w=40&amp;zc=1&amp;q=100' title='<?php $post->post_title; ?>' />
				<?php } 
			?>
			
			<div class="entry-meta" style="float:left; width:auto">
				<h2 class="entry-title" style="float:none"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s'), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<?php cdbetissanisidro_posted_on(); ?>
			</div><!-- .entry-meta -->

	<?php if ( is_archive() || is_search() ) :  ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
	<?php else : ?>
			<div class="entry-content">
				<?php the_content( __( 'Continuar leyendo <span class="meta-nav">&rarr;</span>') ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:'), 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->
	<?php endif; ?>

			<div class="entry-utility">
				<?php if ( count( get_the_category() ) ) : ?>
					<span class="cat-links">
						<?php printf( __( '%2$s'), 'entry-utility-prep entry-utility-prep-cat-links', get_category_list(' ') ); ?>
					</span>
					<?php if (get_comments_number()>0) {?>
						<span class="comments-link"><?php comments_popup_link( __( ''), __( '1 Comentario'), __( '% Comentarios') ); ?></span>
					<?php }?>
					
				<?php endif; ?>
				<?php
					$tags_list = get_the_tag_list( '', ', ' );
					if ( $tags_list ):
				?>
					<span class="tag-links">
						<?php printf( __( '<span class="%1$s">Tageado</span> %2$s'), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
					</span>
					<span class="meta-sep">|</span>
				<?php endif; ?>
			</div>
		</div>

		<?php comments_template( '', true ); ?>

	<?php endif; ?>

<?php endwhile; ?>

<?php ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Noticias antiguas') ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Noticias nuevas <span class="meta-nav">&rarr;</span>') ); ?></div>
				</div>
<?php endif; ?>
