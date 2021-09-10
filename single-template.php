<?php get_header(); ?>
<?php if (have_posts()) the_post();?> 
		<div id="postagem" class="container">
				<div id="postagem-titulo">
				<h2><?php echo get_the_title();?></h2>
				<hr />
				</div>
				<?php echo the_content(); ?>
			</div>
		</div>
<?php get_footer(); ?>
