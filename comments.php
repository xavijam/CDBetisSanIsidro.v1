
			<div class="top comments"></div>
			<div class="middle">
			<div id="comments">
<?php if ( post_password_required() ) : ?>
				<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'cdbetissanisidro' ); ?></p>
			</div><!-- #comments -->
<?php return;
	endif;
?>

	<?php if ( is_user_logged_in()) {
		comment_form();
	} else {?>
		<div class="ban">
			<h3>No puedes comentar <strong>:(</strong></h3>
			<p>Podrás hacerlo si <a href="<?php bloginfo('url'); ?>/wp-login.php?redirect_to=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>">inicias sesión</a> o te <a href="/wp-register.php">registras</a>.</p>
		</div>
	<?php } ?>


<?php if ( have_comments() ) : ?>

			<ol class="commentlist">
				<?php wp_list_comments( array( 'callback' => 'cdbetissanisidro_comment' ) ); ?>
			</ol>

<?php else : 
	if ( ! comments_open() ) :
?>
	<p class="nocomments"><?php _e( 'Comments are closed.', 'cdbetissanisidro' ); ?></p>
<?php endif; // end ! comments_open() ?>

<?php endif; // end have_comments() ?>


</div><!-- #comments -->
</div>
<div class="bottom"></div>