<?php // Template Name: Inicial ?>

    <?php get_header(); ?>
	<div id="slide" class="container-fluid" >
	 <center><?php if( function_exists('cyclone_slider') ) cyclone_slider('30'); ?> </center>
	</div>
	<div id="conteudo" class="container">
		<div id="especialidade"  >
		<h3>Especialidades</h3>
		<hr>
		<div id="controle">
		<?php $recent = new WP_Query("cat=3&showposts=4&orderby=title&order=ASC"); while($recent->have_posts()) : $recent->the_post();?>
			<div id="image_espe"   ><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?>
				<div id="espe-description">
					<b><?php the_title(); ?></b>
					
					
					<div id="espe-resumo" >
						<?php the_excerpt(); ?>
					</div>
					
					
				</div> </a>		
			</div>
			<?php endwhile; ?>
		
		</div>
		</div>
		<!--   POSSIBILIDADE DE TIRAR ULTIMAS DO BLOG
		<div class="blog" >
			<h3>Ultimas do blog</h3>
		<hr>
		<?php $recent = new WP_Query("cat=7,6,5&showposts=4"); while($recent->have_posts()) : $recent->the_post();?>
			<div class="blog-img" >
			  <div id="blog-thumb"
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array()); ?></a>	
			  </div>
					<div class="blog-description" >
					<div class="blog-title">
				    <?php the_title(); ?>
					</div>
					<div class="blog-resumo" >
					<?php excerpt(35); ?>
					<a href="<?php the_permalink(); ?>">Leia mais...</a>
					</div>
					</div> 
			</div>
		<?php endwhile; ?>
		</div>
		-->
	</div>
	
<?php get_footer(); ?>
