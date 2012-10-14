<?php get_header(); ?>

  <div class="normal">
    <div class="top"></div>
    <div class="middle">
      <div id="container">
        <div id="content" role="main">
          <?php
            if ( have_posts() )
              the_post();
          ?>

          <h1 class="page-title">
            <?php if ( is_day() ) : ?>
                    <?php printf( __('Archivos diarios: <span>%s</span>'), get_the_date() ); ?>
            <?php elseif ( is_month() ) : ?>
                    <?php printf( __('Archivos mensuales: <span>%s</span>'), get_the_date('F Y') ); ?>
            <?php elseif ( is_year() ) : ?>
                    <?php printf( __('Archivos anuales: <span>%s</span>'), get_the_date('Y') ); ?>
            <?php else : ?>
                    <?php _e( 'Archivos de blog', 'twentyten' ); ?>
            <?php endif; ?>
          </h1>

          <?php 
            rewind_posts();
            get_template_part( 'loop', 'archive' );
          ?>
        </div>
      </div>
    </div>
    <div class="bottom"></div>
  </div>
  


<?php get_footer(); ?>
