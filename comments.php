
  <!--div class="top comments"></div>
  <div class="middle">
    <div id="comments">

      <?php if ( is_user_logged_in()) { ?>
        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

        <p><input type="text" name="author" id="author" value="" size="22" tabindex="1" /> 
        <label for="author"><small>*</small></label></p> 

        <p><input type="text" name="email" id="email" value="" size="22" tabindex="2"  /> 
        <label for="email"><small>*</small></label></p> 

        <p><textarea name="comment" id="comment" cols="48" rows="10" tabindex="4" onFocus="clearText(this)" onBlur="clearText(this)" ></textarea></p> 

        <p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit" /> 
        <?php comment_id_fields(); ?>

        <?php do_action('comment_form', $post->ID); ?>
        </form>
      <?php } else {?>
        <div class="ban">
          <h3>No puedes comentar <strong>:(</strong></h3>
          <p>Podrás hacerlo si <a href="<?php bloginfo('url'); ?>/login/?redirect_to=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>">inicias sesión</a> o te <a href="/login/?action=register">registras</a>.</p>
        </div>
      <?php } ?>


      <?php if ( have_comments() ) : ?>
        <ol class="commentlist">
          <?php wp_list_comments( array( 'callback' => 'cdbetissanisidro_comment' ) ); ?>
        </ol>
      <?php endif; // end have_comments() ?>

    </div>
  </div>
  <div class="bottom"></div-->