<?php get_header(); ?>
  <div class="normal">
    <div class="top"></div>
    <div class="middle">
  	<p class="attachment"><a href="<?php echo $next_attachment_url; ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php
  		$attachment_size = apply_filters( 'betis_size', 900 );
  		echo wp_get_attachment_image( $post->ID, array( $attachment_size, 9999 ) );
  	?></a></p>
  	</div>
  	<div class="bottom"></div>
	</div>
<?php get_footer(); ?>
