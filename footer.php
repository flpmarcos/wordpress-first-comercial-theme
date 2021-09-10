		
		<footer id="rodape"  >
			<div id="footer-widgets" class="container" >
			
			<?php if (!function_exists('dynamic_sidebar') ||  !dynamic_sidebar("RodapeMobile")) : ?>
			
			<?php endif; ?> 	
			
			<?php if (!function_exists('dynamic_sidebar') ||  !dynamic_sidebar("RodapeDinamico")) : ?>
			
			<?php endif; ?> 

			<?php if (!function_exists('dynamic_sidebar') ||  !dynamic_sidebar("RodapeTablet")) : ?>
			
			<?php endif; ?> 
		
			<address id="endereco" >
				<div id="endereco-descricao">
				<h3>Endereço</h3>
				<p><b>Rua Espirito Santo, 1204, sala 605</br>
				 Bairro: Centro - Belo Horizonte - MG</br>
				 Tel: (31) 3222-1843 / 98610-1843</br></b></p>
				 </div>

				 <div id="email">
					<div id="email-img">
					<img src="<?php echo get_template_directory_uri(); ?>/images/email.png" ></img>
					</div>
					<div id="email-desc">
					<b>recepcao@odontologiaintegradabhz.com.br</b>
					</div>
					<div id="email-desc">
					<b>recepcao@gmail.com.br</b>
					</div>
				</div>
				<div id="topo">
				<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/seta.png" ></img></a>
				<b>Topo</b>
				</div>
			</address>
				
			</div>
			
				
			<div id="footer-copyright" >
				<div id="copyRight" ><?php echo comicpress_copyright(); ?> <b>Odontologia Integrada.Todos os direitos reservados.</b></div>
			</div>
		</footer>
		
		<?php 
		wp_footer();
		?>
	</body>
</html>

