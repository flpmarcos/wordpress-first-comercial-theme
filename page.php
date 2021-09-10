<?php get_header(); ?>
	

<?php if (have_posts()) the_post();?> 
		<div id="pagina" class="container">
			<div id="titulo">
				<h2><?php echo get_the_title();?></h2>
			<hr />
			</div>
			
			<div id="conteudo">
				<?php echo the_content(); ?>
			</div>
		</div>
<?php get_footer(); ?>
