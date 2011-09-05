
	<div id="main">
		<div class="main_new">
		<?php
			query_posts('showposts=1&category_name=Importante');
			global $wp_query;
			$date = '';
			while (have_posts()): the_post();
			  $thePostID = $wp_query->post->ID;
				$image = get_post_meta($thePostID,'image', true);		
				if ($image == '') {
					echo '<img src="'.get_bloginfo('template_url').'/images/common/betis.png" class="full" />';
				} else {
					echo '<img src="'.get_bloginfo('template_url').'/plugins/thumb.php?src='.get_post_meta($thePostID,'image', true).'&amp;h=305&amp;w=505&amp;zc=1&amp;q=100" />';
				}
				
			endwhile;
		?>
			<div class="caption"><h1><a href="<?php the_permalink()?>"><?php the_title()?></a></h1><p><?php echo time_ago(); ?></p></div>
		</div>
		<div class="right">
			<span><h2>Últimos titulares</h2><a href="<?php bloginfo('rss2_url'); ?>"><img src="<?php bloginfo( 'template_url' ); ?>/images/noticias/feed-icon.gif"/></a></span>
			<ul id="last_news">
				
				<?php
				
				query_posts('showposts=5&category_name=Importante');
				global $wp_query;
				$date = '';
				$count = 0;
				
				while (have_posts()): the_post();
				  $thePostID = $wp_query->post->ID;
					$image = get_post_meta($thePostID,'image', true);
					?>
					
					<?php if ($count!=0) { ?>
						<li class="noticias <?php echo ($image!=null) ? '' : 'no_image'; ?>">
						  <?php 
								$is_there = '';
								if ($image!=null) {?>
									<img src='<?php echo get_bloginfo('template_url') ?>/plugins/thumb.php?src=<?php echo get_post_meta($thePostID,'image', true); ?>&amp;h=45&amp;w=45&amp;zc=1&amp;q=70' alt="Betis San Isidro" title="Betis San Isidro"/>
								<?php } ?>
							<a href="<?php the_permalink() ?>">
							  <?php
                $thetitle = $post->post_title;
                $getlength = strlen($thetitle);
                $thelength = 30;
                if ($image==null) {
                  $thelength = 70;
                }
                echo substr($thetitle, 0, $thelength);
                if ($getlength > $thelength) echo "...";
                ?>							  
							</a>
							<p><?php echo time_ago(); ?></p>
						</li>
					<?php } ?>
				
				<?php
						$count = $count + 1;
					endwhile;
				wp_reset_query();
				?>

			</ul>
		</div>
		<ul class="sponsors">
  		<li><a class="piedad" href="http://www.conservaslapiedad.es" target="_blank"></a></li>
  	</ul>
	</div>
	
	<div class="news">
		<div class="news_column">
			<ul>
					<?php
					$cat1=get_cat_ID('Recuperación');
					$cat2=get_cat_ID('Lesión');
					$cat3=get_cat_ID('Fichaje');
					$cat4=get_cat_ID('Venta');
					$cat5=get_cat_ID('Calendario');
					$cat6=get_cat_ID('Partido');
					$cat7=get_cat_ID('Club');


					$args=array(
					  'cat' => $cat1. ',' .$cat2. ',' .$cat3. ',' . $cat4. ',' .$cat5. ',' .$cat6. ',' .$cat7,
					  'post_type' => 'post',
					  'post_status' => 'publish',
					  'posts_per_page' => -1,
					  'showpost'=> 3
					);
					$my_query = null;
					$count = 0;
					$my_query = new WP_Query($args);
					if( $my_query->have_posts() ) {
					  while ($my_query->have_posts()) : $my_query->the_post(); ?>

					    <?php
	            if ( in_category('Lesión') ) {
	            	$kind = "lesion";
	            } elseif ( in_category('Recuperación') ) {
	              $kind = "recuperacion";
	            } elseif ( in_category('Fichaje') ) {
		            $kind = "fichaje";
	            } elseif ( in_category('Venta') ) {
		            $kind = "venta";
							} elseif ( in_category('Calendario') ) {
		            $kind = "calendario";
	            } elseif ( in_category('Partido') ) {
		            $kind = "partido";
							} else {
	            	$kind = "club";
	            }
	            ?>

							<li class="<?php echo $kind ?> <?php if ($count==0 || $count==3) { echo "first"; } ?> <?php if ($count==2 || $count==5) { echo "last"; } ?> <?php if ($count>2) { echo "margin"; } ?>">
								<h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
								<?php 
									$image = get_post_custom_values('image', $post->ID);
									if ($image!=null) {?>
										<img src='<?php echo get_bloginfo('template_url') ?>/plugins/thumb.php?src=<?php echo $image[0]; ?>&amp;h=70&amp;w=120&amp;zc=1&amp;q=100' title='<?php $post->post_title; ?>' align='right' />
									<?php } 
								?>
								<p class="text_content"><?php echo str_replace('.','. ',custom_trim_excerpt('',27)); ?></p>
								<p><?php echo time_ago(); ?></p>
							</li>
							
							<?php
					  	$count = $count + 1;
							if ($count > 2) {
								break;
							}
						endwhile;
					}
					wp_reset_query();
					?>
			</ul>
			<p class="view_more"><a href="/category/rapida">ver más</a></p>

		</div>
		<div class="comments">
			<h3>COMENTARIOS RECIENTES</h3>
			<ul>
				
				<?php
				  $comments = get_comments('number=4&amp;amp;status=approve');

				  $true_comment_count = 0;

				  foreach($comments as $comment) :
				?>

				<?php $comment_type = get_comment_type(); ?>
				<?php if($comment_type == 'comment') { ?>

				<?php $true_comment_count = $true_comment_count +1; ?>

				<?php $comm_title = get_the_title($comment->comment_post_ID);?>
				<?php $comm_link = get_comment_link($comment->comment_ID);?>
				<?php $comm_comm_temp = get_comment($comment->comment_ID,ARRAY_A);?>
				<?php $comm_content = $comm_comm_temp['comment_content'];?>

				<li class="<?php if ($true_comment_count==4) {echo 'last';} ?>">
					<?php echo userphoto_thumbnail($comment->comment_author) ?>
					<p>
					<span class="footer_comm_author"><?php echo($comment->comment_author)?></span> comentó en <a href="<?php echo($comm_link)?>" title="<?php comment_excerpt(); ?>"> <?php echo $comm_title?> </a></p>
				</li> 

				<?php } ?>

				<?php if($true_comment_count == 4) {break;} ?>
				<?php endforeach;?>
			</ul>
		</div>
	</div>
	
	<div class="news">
		<div class="search_block">
			<h3>ARCHIVO</h3>
			<ul>
				<?php wp_get_archives('type=monthly&limit=8&format=html&show_post_count=true'); ?> 
			</ul>
			<h3 class="secondary">¿QUIERES BUSCAR ALGO?</h3>
			<form role="search" method="get" id="searchform" action="/" > 
				<div>
					<input type="text" value="" name="s" id="s" /> 
					<input type="submit" id="searchsubmit" value="Buscar" /> 
				</div> 
			</form>
		</div>
		<div class="veterans_news">
			<ul>
				<?php
				
				query_posts('showposts=3&category_name=Veteranos');
				global $wp_query;
				$date = '';
				$count = 0;
				while (have_posts()): the_post();
				  $thePostID = $wp_query->post->ID;
					?>
					
						<li class="noticias <?php if ($count==0 || $count==3) { echo "first"; } ?> <?php if ($count==2 || $count==5) { echo "last"; } ?> <?php if ($count>2) { echo "margin"; } ?>">
							<h4><a href="<?php the_permalink() ?>"><?php echo the_title(); ?></a></h4>
							<?php 
								$image = get_post_custom_values('image', $post->ID);
								if ($image!=null) {?>
									<img src='<?php echo get_bloginfo('template_url') ?>/plugins/thumb.php?src=<?php echo $image[0]; ?>&amp;h=70&amp;w=120&amp;zc=1&amp;q=100' title='<?php $post->post_title; ?>' align='right' />
								<?php } 
							?>
							<p class="text_content"><?php echo str_replace('.','. ',custom_trim_excerpt('',40)); ?></p>
							<p><?php echo time_ago(); ?></p>
						</li>
				
				<?php
						$count = $count + 1;
					endwhile;
				wp_reset_query();
				?>
			</ul>
			<p class="view_more"><a href="/category/veteranos/">ver más</a></p>
		</div>
	</div>
	
	


<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true" charset="utf-8"></script>
<script src="<?php wp_js('/javascripts/noticias.js') ?>" type="text/javascript" charset="utf-8"></script>	

