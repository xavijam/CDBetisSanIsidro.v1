<?php

  // THEME SETUP
  function cdbetissanisidro_setup() {
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    $locale = get_locale();
    $locale_file = TEMPLATEPATH . "/languages/$locale.php";
    if ( is_readable( $locale_file ) )
      require_once( $locale_file );
    register_nav_menus( array(
      'primary' => __( 'Primary Navigation', 'cdbetissanisidro' ),
    ) );
  }
  add_action( 'after_setup_theme', 'cdbetissanisidro_setup' );


  // ADD NEEDED PAGES
  function add_pages() {
    $array = array('Calendario','Clasificación','Club','F7 Veteranos','Gracias','Listado','Noticias','Pescados Madrid','Primer Equipo','Publicidad','Resultados','Rincón de Jose','Socio');

    foreach ($array as $page_title) {
      $page = get_page_by_title($page_title);
      if (!$page) {
        $my_post = array(
           'post_title' => $page_title,
           'post_type' => 'page',
           'post_status' => 'publish',
           'post_author' => 1
        );
        wp_insert_post($my_post);
      }
    }
  }
  add_action( 'after_setup_theme', 'add_pages' );
  

  // CHANGE AUTHOR URL
  global $wp_rewrite;
  $wp_rewrite->author_base = "usuario";
  $wp_rewrite->flush_rules();



  // CREATE SOCIOS DATABASE
  function create_partners(){
    global $wpdb;

    //create the name of the table including the wordpress prefix (wp_ etc)
    $search_table = $wpdb->prefix . "partners";
    //$wpdb->show_errors();

    //check if there are any tables of that name already
    if($wpdb->get_var("show tables like '$search_table'") !== $search_table)
    {
      //create your sql
      $sql =  "CREATE TABLE ". $search_table . " (
              user_id mediumint(12) NOT NULL AUTO_INCREMENT,
              name text NOT NULL,
              surname text NOT NULL,
              type text NOT NULL,
              address text NOT NULL,
              postal_code text NOT NULL,
              city text NOT NULL,
              province text NOT NULL,
              phone text NOT NULL,
              email text NOT NULL,
              partner_number text,
              UNIQUE KEY user (user_id));";
    }

    //include the wordpress db functions
    require_once(ABSPATH . 'wp-admin/upgrade-functions.php');
    dbDelta($sql);

    //register the new table with the wpdb object
    if (!isset($wpdb->partners))
    {
      $wpdb->partners = $search_table;
      //add the shortcut so you can use $wpdb->stats
      $wpdb->tables[] = str_replace($wpdb->prefix, '', $search_table);
    }
  }
  //add to front and backend inits
  add_action('init', 'create_partners');



  function savePartner($name,$surname,$type,$address,$postal_code,$city,$province,$phone,$email,$partner_number) {
    global $wpdb;
    $result = $wpdb->query("INSERT INTO $wpdb->partners (name,surname,type,address,postal_code,city,province,phone,email,partner_number) VALUES ('".$name."','".$surname."','".$type."','".$address."','".$postal_code."','".$city."','".$province."','".$phone."','".$email."','".$partner_number."')");
  }


  // REMOVE ADMIN TOOLBAR
  add_filter( 'show_admin_bar', '__return_false' );



  // GZIP COMPRESSION
  if(extension_loaded("zlib") && (ini_get("output_handler") != "ob_gzhandler"))
     add_action('wp', create_function('', '@ob_end_clean();@ini_set("zlib.output_compression", 1);'));



  // REDIRECTS AFTER LOGIN
  function redirect_after_login() {
   global $redirect_to;
   if (!isset($_GET['redirect_to'])) {
     $redirect_to = '/';
   }
  }
  add_action('login_form', 'redirect_after_login');



  // CUSTOM LOGIN
  function custom_admin() {
      echo '<link rel="shortcut icon" href="'.get_bloginfo('template_url').'/images/favicon.ico" >';
      echo '<style type="text/css">#wphead h1 {padding: 10px 8px 5px 18px;} img#header-logo {display:none}</style>';
  }
  add_action('admin_head', 'custom_admin');



  // CUSTOM ADMIN LOGIN HEADER LOGO
  function custom_login_window() {
    echo '<link rel="shortcut icon" href="'.get_bloginfo('template_url').'/images/favicon.ico" >';

    echo '<style type="text/css">';
    echo 'html {background:white!important;}';
    echo 'body {background:white!important;}';
    echo 'h1 a { background:url('.get_bloginfo('template_directory').'/images/common/betis.png) no-repeat center -25px!important; }';
    echo 'p#backtoblog {display:none}';
    echo '.button,.button-secondary,.submit input,input[type=button],input[type=submit]{border-color:#bbb;color:#464646;}';
    echo '.button:hover,.button-secondary:hover,.submit input:hover,input[type=button]:hover,input[type=submit]:hover{color:#000;border-color:#666;}';
    echo '.button,.submit input,.button-secondary{background:#f2f2f2 url(../images/white-grad.png) repeat-x scroll left top;text-shadow:rgba(255,255,255,1) 0 1px 0;}';
    echo '.button:active,.submit input:active,.button-secondary:active{background:#eee url(../images/white-grad-active.png) repeat-x scroll left top;}';
    echo 'input.button-primary,button.button-primary,a.button-primary{border-color:#009575;font-weight:bold;color:#fff;background:#009575;text-shadow:rgba(0,0,0,0.3) 0 -1px 0; border-radius:5px}';
    echo 'input.button-primary:active,button.button-primary:active,a.button-primary:active{background:#21759b url(../images/button-grad-active.png) repeat-x scroll left top;color:#eaf2fa;}';
    echo 'input.button-primary:hover,button.button-primary:hover,a.button-primary:hover,a.button-primary:focus,a.button-primary:active{border-color:#13455b;color:#eaf2fa;}';
    echo '.button-disabled,.button[disabled],.button:disabled,.button-secondary[disabled],.button-secondary:disabled,a.button.disabled{color:#aaa!important;border-color:#ddd!important;}';
    echo '.button-primary-disabled,.button-primary[disabled],.button-primary:disabled{color:#9FD0D5!important;background:#298CBA!important;}';
    echo 'a:hover,a:active,a:focus{color:#d54e21;}';
    echo 'input[type="text"]:focus,input[type="password"]:focus {outline-color:#009575!important}';
    echo '</style>';
  }
  add_action('login_head', 'custom_login_window');



  // CUSTOM ADMIN LOGIN HEADER LINK & ALT TEXT
  function change_wp_login_url() {
    echo bloginfo('url');
  }
  function change_wp_login_title() {
    echo 'Vuelve a la página de inicio';
  }
  add_filter('login_headerurl', 'change_wp_login_url');
  add_filter('login_headertitle', 'change_wp_login_title');



  // SHORT TEXTS WITH A CUSTOM LENGTH
  function custom_trim_excerpt($text,$length) {
    global $post;
    if ( '' == $text ) {
      $text = get_the_content('');
      $text = apply_filters('the_content', $text);
      $text = str_replace(']]>', ']]>', $text);
      $text = strip_tags($text);
      $excerpt_length = $length;
      $words = explode(' ', $text, $excerpt_length + 1);
      if (count($words) > $excerpt_length) {
        array_pop($words);
        array_push($words, '...');
        $text = implode(' ', $words);
      }
    }
    return $text;
  }



  // GET CATEGORY LIST
  function get_category_list( $separator = '', $parents='', $post_id = false ) {
    global $wp_rewrite;
    $categories = get_the_category( $post_id );
    if ( !is_object_in_taxonomy( get_post_type( $post_id ), 'category' ) )
      return apply_filters( 'the_category', '', $separator, $parents );

    if ( empty( $categories ) )
      return apply_filters( 'the_category', __( 'Uncategorized' ), $separator, $parents );

    $rel = ( is_object( $wp_rewrite ) && $wp_rewrite->using_permalinks() ) ? 'rel="category tag"' : 'rel="category"';

    $thelist = '';
    if ( '' == $separator ) {
      $thelist .= '<ul class="post-categories">';
      foreach ( $categories as $category ) {
        $thelist .= "\n\t<li>";
        switch ( strtolower( $parents ) ) {
          case 'multiple':
            if ( $category->parent )
              $thelist .= get_category_parents( $category->parent, true, $separator );
            $thelist .= '<a href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '>' . $category->name.'</a></li>';
            break;
          case 'single':
            $thelist .= '<a href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '>';
            if ( $category->parent )
              $thelist .= get_category_parents( $category->parent, false, $separator );
            $thelist .= $category->name.'</a></li>';
            break;
          case '':
          default:
            $thelist .= '<a href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '>' . $category->cat_name.'</a></li>';
        }
      }
      $thelist .= '</ul>';
    } else {
      $i = 0;
      foreach ( $categories as $category ) {
        if ( 0 < $i )
          $thelist .= $separator;
        switch ( strtolower( $parents ) ) {
          case 'multiple':
            if ( $category->parent )
              $thelist .= get_category_parents( $category->parent, true, $separator );
            $thelist .= '<a href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '><span>' . $category->cat_name.'</span></a>';
            break;
          case 'single':
            $thelist .= '<a href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '><span>';
            if ( $category->parent )
              $thelist .= get_category_parents( $category->parent, false, $separator );
            $thelist .= "$category->cat_name</span></a>";
            break;
          case '':
          default:
            $thelist .= '<a href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '><span>' . $category->name.'</span></a>';
        }
        ++$i;
      }
    }
    return apply_filters( 'the_category', $thelist, $separator, $parents );
  }



  // TIME AGO
  function time_ago( $type = 'post' ) {
    $d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';
    return __('Hace') . " " .  _time_diff($d('U'), current_time('timestamp')) ;
  }



  // DAYS AGO
  function day_ago( $type = 'post' ) {
    $d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';
    return _day_diff($d('U'), current_time('timestamp')) ;
  }



  // DAYS DIFF
  function _day_diff( $from, $to = '' ) {
    if ( empty($to) )
      $to = time();
      $diff = (int) abs($to - $from);

    return $diff;
  }



  // TIME DIFF
  function _time_diff( $from, $to = '' ) {
    if ( empty($to) )
      $to = time();
    $diff = (int) abs($to - $from);
    if ($diff <= 3600) {
      $mins = round($diff / 60);
      if ($mins <= 1) {
        $mins = 1;
      }
      /* translators: min=minute */
      $since = sprintf(_n('%s minuto', '%s minutos', $mins), $mins);
    } else if (($diff <= 86400) && ($diff > 3600)) {
      $hours = round($diff / 3600);
      if ($hours <= 1) {
        $hours = 1;
      }
      $since = sprintf(_n('%s hora', '%s horas', $hours), $hours);
    } elseif ($diff >= 86400) {
      $days = round($diff / 86400);
      if ($days <= 1) {
        $days = 1;
      }
      $since = sprintf(_n('%s día', '%s días', $days), $days);
    }
    return $since;
  }



  //  SEASON OR NOT
  function seasonOrNot() {
    $today = getdate();
    if ($today['mon'] > 5 && $today['mon'] < 9) {
      if ($today['mon']==6 && $today['mon'] < 9) {
        return true;
      } else {
        return false;
      }
    } else {
      return true;
    }
  }



  // GET USER ROLE
  function get_current_user_role() {
    global $wp_roles;
    $current_user = wp_get_current_user();
    $roles = $current_user->roles;
    $role = array_shift($roles);
    return isset($wp_roles->role_names[$role]) ? translate_user_role($wp_roles->role_names[$role] ) : false;
  }







if ( ! function_exists( 'cdbetissanisidro_comment' ) ) :
  function cdbetissanisidro_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
      case '' :
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
      <div id="comment-<?php comment_ID(); ?>">
        <div class="image">
          <?php echo userphoto_comment_author_thumbnail(); ?>
        </div>
        <div class="info">
          <?php printf( __( 'Escrito el %1$s a las %2$s'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Editar)'), ' ' ); ?>
          <?php printf( __( '<br/>por %s', 'twentyten' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
        </div>
        <div class="content">
        </div>
        <div class="comment-body"><?php comment_text(); ?></div>
        <div class="reply">
          <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
        </div><!-- .reply -->
      </div><!-- #comment-##  -->

    <?php
        break;
      case 'pingback'  :
      case 'trackback' :
    ?>
    <li class="post pingback">
      <p><?php _e( 'Pingback:'); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)'), ' ' ); ?></p>
    <?php
        break;
    endswitch;
  }
endif;





if ( ! function_exists( 'cdbetissanisidro_posted_on' ) ) :
  function cdbetissanisidro_posted_on() {
    printf( __( '<span class="%1$s">Escrito el</span> %2$s <span class="meta-sep">por</span> %3$s'),
      'meta-prep meta-prep-author',
      sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
        get_permalink(),
        esc_attr( get_the_time() ),
        get_the_date()
      ),
      sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
        get_author_posts_url( get_the_author_meta( 'ID' ) ),
        sprintf( esc_attr__( 'View all posts by %s'), get_the_author() ),
        get_the_author()
      )
    );
  }
endif;






  ///////////////////
  //  HOME STUFF  //
  ///////////////////


  // Generate list for last news
  function generateLastNewsList() {
    $cat1=get_cat_ID('Recuperación');
    $cat2=get_cat_ID('Lesión');
    $cat3=get_cat_ID('Fichaje');
    $cat4=get_cat_ID('Venta');
    $cat5=get_cat_ID('Calendario');
    $cat6=get_cat_ID('Partido');
    $cat7=get_cat_ID('Entrevista');
    $cat8=get_cat_ID('Club');
    $cat9=get_cat_ID('Importante');

    $args=array(
      'cat' => $cat1. ',' .$cat2. ',' .$cat3. ',' . $cat4. ',' .$cat5. ',' .$cat6. ',' .$cat7. ',' .$cat8. ',' .$cat9,
      'post_type' => 'post',
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'caller_get_posts'=> 1,
      'showposts'=> 5
    );

    $count_ = 0;
    $my_query = null;
    $find = false;
    $my_query = new WP_Query($args);
    if( $my_query->have_posts() ) {
      while ($my_query->have_posts()) : $my_query->the_post();
        $count_ = $count_ + 1;
        if (in_category('Importante') && !$find) {
          $find = true;
        } else {
          if ((!$find && $count_<5) || $find) {
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

            $image = get_post_custom_values('image', $post->ID);
            $new = day_ago()<172800;

            echo '<li class="'.$kind.' '.(($image!=null) ? '' : 'no_image').' '.(($new) ? 'new' : ' ').'">';
            $is_there = '';
            $_length = 55;
            if ($image!=null) {
              echo "<img src='".get_bloginfo('template_url')."/plugins/thumb.php?src=".$image[0]."&amp;h=45&amp;w=45&amp;zc=1&amp;q=70' alt='Betis San Isidro' title='Betis San Isidro'/>";
              $_length = 47;
            }
            $tit = the_title('','',FALSE);
            if (strlen($tit) > $_length) $tit = substr($tit, 0, $_length-3) . '...';

            echo '<a class="'.$is_there.'" href="'.get_permalink().'">'.$tit.'</a>';
            echo '<p class="'.$is_there.'">'.time_ago().'</p>';
            if ($new) {
              echo '<span class="exclamation"></span>';
            }
            echo '</li>';
          }

        }
      endwhile;
    }
    wp_reset_query();
  }


  // Important image
  function showLastImportant() {
    $my_query = null;

    $my_query = new WP_Query();
    $my_query->query('showposts=1&category_name=Importante');
    while ($my_query->have_posts()) : $my_query->the_post();
      $thePostID = $my_query->post->ID;
      $title = $my_query->post->post_title;
      $url = $my_query->post->guid;
      $imagen = get_post_meta($thePostID,'image', true);

      if ($imagen == '') {
        $rand = rand(1,9);
        echo '<img src="'.get_bloginfo('template_url').'/images/error/error'.$rand.'.jpg" alt="Noticia principal" title="Noticia principal"/>';
      } else {
        echo '<img src="'.get_bloginfo('template_url').'/plugins/thumb.php?src='.$imagen.'&amp;h=305&amp;w=505&amp;zc=1&amp;q=100" alt="Noticia principal" title="Noticia principal"/>';
      }
      if (strlen($title) > 42) $title = substr($title, 0, 39) . '...';
      $images = get_post_custom_values('image', $post->ID);
      $comments = $my_query->post->comment_count;
      echo '<div class="caption"><h1><a href="'.$url.'">'.$title.'</a></h1><p>'.time_ago().'</p>';
      if (count($images)>0) echo '<a href="'.$url.'" class="camera stat">'.count($images).'</a>';
      if ($comments>0) echo '<a href="'.$url.'" class="comment stat">'.$comments.'</a>';
      echo  '</div>';
    endwhile;

    wp_reset_query();
  }


  // Blocks drawing //

  // First
  function firstBlock() {
    if (seasonOrNot()) {
      echo '<div class="block top_left">
              <h2>Próximo partido</h2>
              <div class="fail" id="next_match">
                <p>Si quieres puedes visitar<br/>el <a href="/calendario">calendario</a> del equipo para<br/>ver el siguiente encuentro.</p>
              </div>
              <div class="next_match">
                <div class="head">
                  <img src="#" title="Equipo 1"/>
                  <p>-</p>
                  <img src="#" title="Equipo 2"/>
                </div>
                <div class="bottom">
                  <p class="date"></p>
                  <p class="stadium"></p>
                  <p class="place"></p>
                  <p class="time"></p>
                </div>
              </div>
              <p class="bottom"><a href="/calendario">Calendario</a></p>
            </div>';
    } else {
      echo '<div class="block top_left socio">
              <h2>¡Hazte socio!</h2>
              <p>Colabora con el CD Betis San Isidro y además de ayudarnos a crecer y seguir mejorando podrás disfrutar de tu equipo cada fin de semana.</p>
              <p>Ya está abierta la inscripción de la temporada 11/12, para más información pincha <a href="/socio">aquí</a>.</p>
              <p class="bottom"><a href="/socio">Ir al formulario</a></p>
            </div>';
    }
  }


  // Second block
  function secondBlock() {
    if (seasonOrNot()) {
      echo '<div class="block"><h2>¿Donde jugamos? <small><sup> (Click en el marker)</sup></small></h2><div id="map"></div></div>';
    } else {
      echo '<div class="block sponsors">
              <h2><a href="/publicidad">¿Quieres ser patrocinador?</a></h2>
              <div class="outer_block">
                <div class="inner_block">
                  <a href="http://www.pescadosmadrid.com/" class="pescados_madrid sponsor" target="_blank">Pescados Madrid</a>
                  <a href="http://www.conservaslapiedad.es" class="lapiedad sponsor" target="_blank">Conservas la Piedad</a>
                  <a href="http://www.elcosmonauta.es" class="cosmonauta sponsor" target="_blank">El Cosmonauta</a>
                  <a href="http://www.vizzuality.com" class="vizzuality sponsor" target="_blank">Vizzuality</a>
                </div>
              </div>
            </div>';
    }
  }


  // Third block
  function thirdBlock() {
    echo '<div class="block top_right">
            <h2>Clasificación</h2>
            <div class="fail" id="_classification">
              <p>Visita nuestra página de <br/><a href="/calendario">clasificación</a> para saber la<br/>posición del Betis.</p>
            </div>
            <table cellpadding="0" cellspacing="0">
              <thead>
                <tr>
                  <th width="38"></th>
                  <th width="160"></th>
                  <th width="30">Pts</th>
                  <th width="40">DG</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
            <p class="bottom"><a href="/clasificacion">Clasificación</a></p>
          </div>';
  }



  // Fourth block
  function fourthBlock() {
    echo '<div class="block bottom_left comments">
            <h2>Última actividad</h2>
            <ul class="comments">';

    // COMMENTS
     $comments = get_comments('number=3,status=approve');
    foreach($comments as $comment) :
      $user = get_userdata($comment->user_id);

      if(userphoto_exists($user)) {
        $image = '<img src="/wp-content/uploads/userphoto/'.$user->userphoto_thumb_file.'" alt="'.$comment->comment_author.'" title="'.$comment->comment_author.'"/>';
      } else {
        $image = '<img src="http://1.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=44" alt="'.$comment->comment_author.'" title="'.$comment->comment_author.'"/>';
      }

      $title = get_the_title($comment->comment_post_ID);
      if (strlen($title)>39) {
        $title = substr($title, 0, 36) . '...';
      }


      $date = strtotime($comment->comment_date_gmt);
      $new = _day_diff($date)<172800;
      $ago = "hace " ._time_diff($date);
      $author = (strlen($comment->comment_author)>13)?substr($comment->comment_author,0,10).'...':$comment->comment_author;
      echo '<li class="comment" alt="'.$date.'">
              <div class="left">
                '.$image.'
              </div>
              <div class="right">
                <h4>'.$author.'</h4><p>'.$ago.'</p>
                <p class="comment">comentó en <a href="'.get_comment_link($comment->comment_ID).'">'.$title.'</a></p>
              </div>';
      echo '</li>';

    endforeach;


    // POST
    $posts = get_posts('numberpost=3');

    foreach($posts as $post) :
      $user = get_userdata($post->post_author);

      if(userphoto_exists($user)) {
        $image = '<img src="/wp-content/uploads/userphoto/'.$user->userphoto_thumb_file.'" alt="'.$comment->comment_author.'" title="'.$comment->comment_author.'"/>';
      } else {
        $image = '<img src="http://1.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=44" alt="'.$comment->comment_author.'" title="'.$comment->comment_author.'"/>';
      }

      $title = get_the_title($post->ID);
      if (strlen($title)>43) {
        $title = substr($title, 0, 40) . '...';
      }


      $date = strtotime($post->post_date_gmt);
      $new = _day_diff($date)<172800;
      $ago = "hace " ._time_diff($date);
      $author = (strlen($user->display_name)>13)?substr($user->display_name,0,10).'...':$user->display_name;

      echo '<li class="post" alt="'.$date.'">
              <div class="left">
                '.$image.'
              </div>
              <div class="right">
                <h4>'.$author.'</h4><p>'.$ago.'</p>
                <p class="comment">escribió <a href="'.get_permalink($post->ID).'">'.$title.'</a></p>
              </div>';
      echo '</li>';

    endforeach;

    echo '</ul></div>';

    // echo '<div class="block sponsors">
    //         <h2>Nuevas entrevistas</h2>
    //         <iframe width="262" height="219" style="margin:11px 0 0 11px" src="http://www.youtube.com/embed/qwYYbb_3GsE" frameborder="0" allowfullscreen></iframe>
    //       </div>';    
  }




  // Fifth block
  function fifthBlock() {
    if (seasonOrNot()) {
      echo '<div class="block sponsors">
              <h2><a href="/publicidad">¿Quieres ser patrocinador?</a></h2>
              <div class="outer_block">
                <div class="inner_block">
                  <a href="http://www.pescadosmadrid.com/" class="selected pescados_madrid" target="_blank">Pescados Madrid</a>
                  <a href="http://www.conservaslapiedad.es" class="lapiedad" target="_blank">Conservas la Piedad</a>
                  <a href="http://www.elcosmonauta.es" class="cosmonauta" target="_blank">El Cosmonauta</a>
                  <a href="http://www.vizzuality.com" class="vizzuality" target="_blank">Vizzuality</a>
                </div>
              </div>
            </div>';
    } else {
      echo '<div class="block social">
              <h2>Redes sociales</h2>
              <h3>Aún en vacaciones...</h3>
              <p>... no importa donde vayas, desde la playa o la montaña podrás seguir al detalle la actualidad del Betis San Isidro en las redes sociales más conocidas.<br/><br/>
              <a class="twitter" target="_blank" href="http://twitter.com/BetisSanIsidro">Twitter</a>, <a class="facebook" target="_blank" href="http://www.facebook.com/pages/CD-Betis-San-Isidro/99842919645">Facebook</a>, <a class="flickr" target="_blank" href="http://www.flickr.com/groups/cdbetissanisidro">Flick<strong>r</strong></a>,... y si prefieres, puedes <a href="mailto:betis@cdbetissanisidro.com">escribir</a> un mail para cualquier consulta.</p>
            </div>';
    }
  }


  // Sixth block
  function sixthBlock () {
    $week = date('W');
    query_posts('showposts=1&category_name=Entrevista&year=2012&w='.$week);
    global $wp_query;

    if ($wp_query->post->ID!=null) {
      // entrevista

      echo '<div class="block bottom_right interview">
        <h2>Última entrevista</h2>
        <h3>Conoce a un miembro del club</h3>
        <p>Cada semana ofrecemos la entrevista<br/>de un miembro del club.</p>';

      while (have_posts()): the_post();
        $thePostID = $wp_query->post->ID;
        $image = get_post_custom_values('image', $thePostID);
				if ($image!=null) {
          echo "<a href='".get_permalink($post->ID)."' class='image'><img src='".get_bloginfo('template_url')."/plugins/thumb.php?src=".get_post_meta($thePostID,'image', true)."&amp;h=60&amp;w=80&amp;zc=1&amp;q=100' alt='Entrevista de la semana' title='Entrevista de la semana' /></a>";
        }
        
        echo '<p class="'.(($image!=null)?'middle':'').'">Gracias al periodista Alejandro Mateo podréis comentarla en las <a href="/noticias/">noticias</a> del equipo.</p>';
        echo "<p><a href='".get_permalink($post->ID)."'>Visita</a> la entrevista de esta semana y comparte tu opinión.</p>";
      endwhile;
      wp_reset_query();
    } else {
      // VETERANOS
      echo '<div class="block bottom_right veteranos">
        <h2>¡Equipo de veteranos!</h2>
        <h3>Infórmate del equipo mayor</h3>
        <p>No solo el primer equipo tiene cabida <br/>en la página web, hay otro equipo que tiene actualizaciones todas las<br/> semanas de noticias, fotos, plantilla,... ¿has visto la página de veteranos?.<br/><br/>
        <a href="/f7-veteranos">Visítala</a> e infórmate de sus progresos y haz algún comentario en sus noticias.</p>';

    }

    echo '</div>';
  }





  ///////////////////
  //  USERS STUFF  //
  ///////////////////

  // Total user comments
  function count_user_comments($id) {
    global $wpdb;
    $users = $wpdb->get_var("SELECT COUNT( * ) AS total FROM $wpdb->comments WHERE comment_approved = 1 AND user_id = $id");
    return $users;
  }


  // User last login
  function your_last_login($login) {
      global $user_ID;
      $user = get_userdatabylogin($login);
      update_usermeta($user->ID, 'last_login', current_time('mysql'));
  }
  add_action('wp_login','your_last_login');
  function get_last_login($user_id) {
      $last_login = get_user_meta($user_id, 'last_login', true);
      $date_format = get_option('date_format') . ' ' . get_option('time_format');
      $date_format = 'Y-m-d H:i:s';
      //echo $date_format;
      $the_last_login = mysql2date($date_format, $last_login, false);

      echo human_time_diff(strtotime($the_last_login));
  }


  // Total number of comments
  function countComments() {
    global $wpdb;
    $numcomms = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments WHERE comment_approved = '1'");
    if (0 < $numcomms) $numcomms = number_format($numcomms);
    return $numcomms;
  }
  add_filter('get_comments_number', 'countComments', 0);
