
	<div class="normal_menu">
		<div class="top">
			<ul class="menu_veteranos">
				<li class="selected"><a onclick="goTo('start')" href="#inicio">INICIO</a></li>
				<li><a onclick="goTo('players')" href="#plantilla">PLANTILLA</a></li>
				<li><a onclick="goTo('results')" href="#resultados">RESULTADOS</a></li>
				<li><a onclick="goTo('clasliga')" href="#clasificacion">CLAS.LIGA</a></li>
				<li class="last"><a onclick="goTo('clascopa')" href="#clasificacion">CLAS.COPA</a></li>
			</ul>
		</div>
		<div class="middle veteranos">
			<div class="all">
				<span class="arrow"></span>
			</div>
			<div class="left">
				<div class="inner_left">
					<div class="block" id="start">
						<?php
						query_posts('showposts=1&category_name=Veteranos');
						global $wp_query;
						$date = '';
						$count = 0;
						while (have_posts()): the_post();
						  $thePostID = $wp_query->post->ID;
							?>
								<h3>LA ÚLTIMA NOTICIA ES "<a href="<?php the_permalink() ?>"><?php echo the_title(); ?></a>"</h3>
								<p><?php echo the_excerpt(); ?></p>

						<?php
							endwhile;
						wp_reset_query();
						?>
						
						<div class="left_vete">
							<span class="top">
								<h3>PRÓXIMO PARTIDO</h3>
								<div class="date">
									<p class="month">ENE</p>
									<p class="day">9</p>
									<p class="hour">12:00</p>
								</div>
								<div class="next_match">
									<p>Betis San Isidro</p>
									<span><img src="<?php echo get_bloginfo('template_url') ?>/images/escudos/rojoblanco.jpg"/> <p>-</p> <img src="<?php echo get_bloginfo('template_url') ?>/images/escudos/rojoblanco.jpg"/></span>
									<p>San Francisco</p>
								</div>
							</span>
							<span class="bottom">
								<h3>ÚLTIMO PARTIDO</h3>
								<div class="next_match">
									<p>Betis San Isidro</p>
									<span>
										<img src="<?php echo get_bloginfo('template_url') ?>/images/escudos/rojoblanco.jpg"/>
										<p>-</p>
										<p class="local"></p>
										<p class="visitor"></p>
										<img src="<?php echo get_bloginfo('template_url') ?>/images/escudos/rojoblanco.jpg"/>
									</span>
									<p>San Francisco</p>
								</div>
							</span>
						</div>
						<div class="right_vete">
							<h3>CLASIFICACIÓN COPA</h3>
							<table class="veteranos_inicio" cellpadding='0' cellspacing='0'> 
  							<thead> 
  								<tr> 
  									<th width="20">P</th>
  							    <th width="120">Equipo</th> 
  							    <th width="20">Pts</th> 
  							    <th width="20">DG</th>
  								</tr> 
  							</thead> 
  							<tbody>
  							  <tr>    
								    <td></td>
								    <td></td> 
										<td></td> 
								    <td></td>
  								</tr>   
  								<tr>    
								    <td></td>
								    <td></td> 
										<td></td> 
								    <td></td>
  								</tr>   
  								<tr>    
								    <td></td>
								    <td></td> 
										<td></td> 
								    <td></td>
  								</tr>   
  								<tr>    
								    <td></td>
								    <td></td> 
										<td></td> 
								    <td></td>
  								</tr>   
  								<tr>    
								    <td></td>
								    <td></td> 
										<td></td> 
								    <td></td>
  								</tr>   
  								<tr>    
								    <td></td>
								    <td></td> 
										<td></td> 
								    <td></td>
  								</tr>
  								<tr> 
								    <td></td>
								    <td></td> 
										<td></td> 
								    <td></td>
  								</tr>
  								<tr> 
								    <td></td>
								    <td></td> 
										<td></td> 
								    <td></td>
  								</tr>
  								<tr> 
								    <td></td>
								    <td></td> 
										<td></td> 
								    <td></td>
  								</tr>					
  								<tr>    
								    <td></td>
								    <td></td> 
										<td></td> 
								    <td></td>
  								</tr>
  							</tbody> 
  						</table>
						</div>
						
					</div>
					<div class="block">
						<ul class="players">
							<li>
								<img src="<?php echo get_bloginfo('template_url') ?>/images/jugadores/veteranos/fran.jpg" alt="Fran" title="Fran"/>
								<h3>Fran Sánchez</h3>
								<p>'Fran'</p>
							</li>
							<li>
								<img src="<?php echo get_bloginfo('template_url') ?>/images/jugadores/veteranos/angelito.jpg" alt="Angelito" title="Angelito"/>
								<h3>Ángel L. Corrales</h3>
								<p>'Angelito'</p>
							</li>
							<li>
								<img src="<?php echo get_bloginfo('template_url') ?>/images/jugadores/veteranos/vivi.jpg" alt="Vivi" title="Vivi"/>
								<h3>Javier Vivanco</h3>
								<p>'Vivi'</p>
							</li>
							<li class="last">
								<img src="<?php echo get_bloginfo('template_url') ?>/images/jugadores/veteranos/porras.jpg" alt="Porras" title="Porras"/>
								<h3>Francisco Porras</h3>
								<p>'Porras'</p>
							</li>
							<li>
								<img src="<?php echo get_bloginfo('template_url') ?>/images/jugadores/veteranos/sergio.jpg" alt="Sergio" title="Sergio"/>
								<h3>Sergio Porras</h3>
								<p>'Sergio'</p>
							</li>
							<li>
								<img src="<?php echo get_bloginfo('template_url') ?>/images/jugadores/veteranos/barba.jpg" alt="Barba" title="Barba"/>
								<h3>Jose M. Barba</h3>
								<p>'Barba'</p>
							</li>
							<li>
								<img src="<?php echo get_bloginfo('template_url') ?>/images/jugadores/veteranos/portu.jpg" alt="Portu" title="Portu"/>
								<h3>Daniel López</h3>
								<p>'Portu'</p>
							</li>
							<li class="last">
								<img src="<?php echo get_bloginfo('template_url') ?>/images/jugadores/veteranos/chechu.jpg" alt="Chechu" title="Chechu"/>
								<h3>Sergio Herráez</h3>
								<p>'Chechu'</p>
							</li>
							<li>
								<img src="<?php echo get_bloginfo('template_url') ?>/images/jugadores/veteranos/julian.jpg" alt="Julián" title="Julián"/>
								<h3>Julián Barrios</h3>
								<p>'Julián'</p>
							</li>
							<li>
								<img src="<?php echo get_bloginfo('template_url') ?>/images/jugadores/veteranos/nebrera.jpg" alt="Juan" title="Juan"/>
								<h3>Juan Nebreda</h3>
								<p>'Juan'</p>
							</li>
							<li>
								<img src="<?php echo get_bloginfo('template_url') ?>/images/jugadores/veteranos/seco.jpg" alt="Seco" title="Seco"/>
								<h3>Francisco Seco</h3>
								<p>'Seco'</p>
							</li>
							<li class="last">
								<img src="<?php echo get_bloginfo('template_url') ?>/images/jugadores/veteranos/alex.jpg" alt="Alex" title="Alex"/>
								<h3>Alejandro Mateo</h3>
								<p>'Alex'</p>
							</li>
							<li>
								<img src="<?php echo get_bloginfo('template_url') ?>/images/jugadores/veteranos/juanito.jpg" alt="Juanito" title="Juanito"/>
								<h3>Juan Galicia</h3>
								<p>'Juanito'</p>
							</li>
							<li>
								<img src="<?php echo get_bloginfo('template_url') ?>/images/jugadores/veteranos/pepe.jpg" alt="Pepe" title="Pepe"/>
								<h3>Jose Sánchez</h3>
								<p>'Pepe'</p>
							</li>
							<li>
								<img src="<?php echo get_bloginfo('template_url') ?>/images/jugadores/veteranos/angel.jpg" alt="Ángel" title="Ángel"/>
								<h3>Ángel Cauce</h3>
								<p>'Ángel'</p>
							</li>
						</ul>
					</div>
					<div class="block">
					  <div class="list_results">
						</div>
					</div>
					<div class="block">
					  <table class="veteranos" id="liga_veteranos" cellpadding='0' cellspacing='0'> 
							<thead> 
								<tr> 
									<th width="25">P</th>
							    <th width="220">Equipo</th> 
							    <th width="30">Pts</th> 
									<th width="30">J</th>
							    <th width="30">G</th>
									<th width="30">P</th> 
							    <th width="30">E</th>
									<th width="30">GF</th>
									<th width="30">GC</th>
							    <th width="30">DG</th>
							    <th width="30">PS</th>
								</tr> 
							</thead> 
							<tbody>
							  <tr>    
								    <td></td>
								    <td></td> 
										<td></td> 
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td>
								</tr>   
								<tr>    
								    <td></td>
								    <td></td> 
										<td></td> 
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td>
								</tr>   
								<tr>    
								    <td></td>
								    <td></td> 
										<td></td> 
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td>
								</tr>   
								<tr>    
								    <td></td>
								    <td></td> 
										<td></td> 
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td>
								</tr>   
								<tr>    
								    <td></td>
								    <td></td> 
										<td></td> 
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td>
								</tr>   
								<tr>    
								    <td></td>
								    <td></td> 
										<td></td> 
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td>
								</tr>
								<tr> 
								    <td></td>
								    <td></td> 
										<td></td> 
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td>
								</tr>
								<tr> 
								    <td></td>
								    <td></td> 
										<td></td> 
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td>
								</tr>
								<tr> 
								    <td></td> 
								    <td></td> 
										<td></td> 
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td>
								</tr>					
								<tr>    
								    <td></td>
								    <td></td> 
										<td></td> 
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td>
								</tr>
							</tbody> 
						</table>
					</div>
					<div class="block">
					  <table class="veteranos" id="copa_veteranos" cellpadding='0' cellspacing='0'> 
							<thead> 
								<tr> 
									<th width="25">P</th>
							    <th width="220">Equipo</th> 
							    <th width="30">Pts</th> 
									<th width="30">J</th>
							    <th width="30">G</th>
									<th width="30">P</th> 
							    <th width="30">E</th>
									<th width="30">GF</th>
									<th width="30">GC</th>
							    <th width="30">DG</th>
							    <th width="30">PS</th>
								</tr> 
							</thead> 
							<tbody>
							  <tr>    
								    <td></td>
								    <td></td> 
										<td></td> 
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td>
								</tr>   
								<tr>    
								    <td></td>
								    <td></td> 
										<td></td> 
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td>
								</tr>   
								<tr>    
								    <td></td>
								    <td></td> 
										<td></td> 
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td>
								</tr>   
								<tr>    
								    <td></td>
								    <td></td> 
										<td></td> 
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td>
								</tr>   
								<tr>    
								    <td></td>
								    <td></td> 
										<td></td> 
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td>
								</tr>   
								<tr>    
								    <td></td>
								    <td></td> 
										<td></td> 
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td>
								</tr>
								<tr> 
								    <td></td>
								    <td></td> 
										<td></td> 
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td>
								</tr>
								<tr> 
								    <td></td>
								    <td></td> 
										<td></td> 
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td>
								</tr>
								<tr> 
								    <td></td> 
								    <td></td> 
										<td></td> 
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td>
								</tr>					
								<tr>    
								    <td></td>
								    <td></td> 
										<td></td> 
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td> 
								    <td></td>
								    <td></td>
								    <td></td>
								</tr>
							</tbody> 
						</table>
					</div>
				</div>
				
				<div class="loader">
					<p>Cargando datos...</p>
					<img src="<?php bloginfo( 'template_url' ); ?>/images/common/ajax-loader.gif" width="32" height="32">
				</div>
				
			</div>
			<div class="right">
				<h1>Veteranos</h1>
				<p>Los antiguos jugadores del Betis San Isidro se han reunido para formar un equipo de fútbol-7 que cada domingo deleita a la grada con su juego, rememorando aquellos tiempos cuando pertenecían a la primera plantilla.</p>
				<p>Cada semana os informaremos del resultado del equipo y os traeremos el resumen de cada partido gracias a la colaboración de Alejandro J. Mateo, actual jugador de los Veteranos.</p>
				<img src="<?php echo get_bloginfo('template_url') ?>/images/veteranos/veteranos.jpg" alt="Veteranos plantilla" title="Veteranos plantilla">
			</div>
		</div>
		<div class="bottom"></div>
	</div>

	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true" charset="utf-8"></script>
	<script src="<?php wp_js('/javascripts/plugins/jquery.scrollTo-1.4.2-min.js') ?>" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/javascripts/veteranos.js" charset="utf-8"></script>
	