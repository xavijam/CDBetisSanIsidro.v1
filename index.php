<?php get_header(); ?>

	<div id="main">
		<div class="main_new">
      <?php showLastImportant() ?>
		</div>
		<div class="right">
			<h2>Últimas noticias</h2>
			<ul id="last_news">
				<?php generateLastNewsList(); ?>
			</ul>
		</div>
	</div>
	
	<div class="blocks">
	  <?php firstBlock() ?>
		<?php secondBlock() ?>
		<?php thirdBlock() ?>
    <?php fourthBlock() ?>
		<?php fifthBlock() ?>
    <?php sixthBlock() ?>
	</div>
	
<?php get_footer(); ?>
  
  <div class="modal_partners">
    <a class="close" href="#cerrar">X</a>
    <h3>A la atención de los Sres. Socios</h3>
    <p>El Secretario de la Junta Directiva del C.D. Betis San Isidro informa que en el cumplimiento de los estatutos de nuestro club se procede a la convocatoria de elecciones para la presidencia del club.</p>
    <p>El periodo de esta próxima legislatura comprende desde el  día 1 de Junio de 2013 hasta el  día 1 de Junio de 2017.</p>
    <p>Las candidaturas al cargo de presidente y su junta se publicarán en esta página web conforme vayan haciéndose públicas al correo de nuestro club.</p>
    <p>En caso de haber dos o más candidaturas se procederá a la publicación de la fecha de las elecciones.</p>
    <p>El plazo máximo para la presentación de las mismas será el  15 de Mayo de 2013.</p>
    <p>La junta directiva actual aprovecha este momento para agradecer el apoyo prestado en estos cuatro años así cómo para comunicar que no se presentará a las mismas.</p>
    <p>C.D. Betis San Isidro</p>
  </div>

	<script src="<?php wp_js('/javascripts/plugins/jquery.cycle.js,/javascripts/plugins/jquery.simplemodal.1.4.1.min.js,/javascripts/plugins/jquery.cookie.js,/javascripts/plugins/jquery.scrollTo-1.4.2-min.js,/javascripts/plugins/leaflet.js,/javascripts/home.js') ?>" type="text/javascript" charset="utf-8"></script>