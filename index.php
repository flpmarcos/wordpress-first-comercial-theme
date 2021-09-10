<?php // Template Name: Blog ?>

<?php get_header(); ?>
	<div id="conteudo" class="container">
		<div class="info" >
			<h2>Blog</h2>
		<hr>
		   
			
			<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?> 
			<?php query_posts("cat=7,6,5&showposts=8&paged=$paged"); ?> 
			<?php if (have_posts()) : ?>  <?php while (have_posts()) : the_post(); ?>
										
			
			
			<div class="info-img" >
				
				<div id="info-thumb">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(0,0)); ?></a>	
				</div>
					<div class="info-description" >
					<div class="info-title">
				    <?php the_title(); ?>
					</div>
					<div class="info-resumo" class="text-justify">
					<?php excerpt(35); ?>
					<a href="<?php the_permalink(); ?>">Leia mais...</a>
					</div>
					</div> 
			
			</div> 
			<?php
			endwhile;
			else:
			?>
			<p>Nenhum post encontrado!</p>
			<?php
			endif;
			?>
			
		 </div>	
			<div id="info-pagination">
			<center><?php if (function_exists('pagination_funtion')) pagination_funtion(); ?></center>
			</div>
		</div>
		
		
	</div>
		
				
		
	
<?php get_footer(); ?>

