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
		<ul class="sponsors">
  		<li><a class="piedad" href="http://www.conservaslapiedad.es" target="_blank"></a></li>
  	</ul>
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
  
<!--   <div class="modal_partners">
    <a class="close" href="#cerrar">X</a>
    <h3>Ahora ser socio es más fácil que nunca...</h3>
    <p>En 5 minutos podrás hacerlo, <a href="/socio/">rellena el formulario</a> con<br/>tus datos y en breve pertenecerás a un club de más de 80 años de historia...</p>
    <p><small>Recuerda, si quieres renovar tu subscripción,<br/> indica tu número de socio del año pasado</small></p>
  </div> -->

    
<!-- 	<div class="modal_partners">
    <a class="close" href="#cerrar">X</a>
    <h3>Premio porra mes de diciembre</h3>
    <p>"Os informamos que el premio de la porra del mes de diciembre se entregará con el sorteo del próximo sábado dia 17, debido a que es el último sábado del mes en que se realizará sorteo de la lotería nacional. Gracias por vuestra colaboración"</p>
    <p><small>Un saludo<br/>CD Betis San Isidro</small></p>
  </div> -->


	<script src="<?php wp_js('/javascripts/plugins/jquery.cycle.js,/javascripts/plugins/jquery.simplemodal.1.4.1.min.js,/javascripts/plugins/jquery.cookie.js,/javascripts/plugins/jquery.scrollTo-1.4.2-min.js,/javascripts/plugins/leaflet.js,/javascripts/home.js') ?>" type="text/javascript" charset="utf-8"></script>
