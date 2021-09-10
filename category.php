<!-- COM ESTA PAGINA VOCÊ EXIBE TODOS OS CONTEUDOS MAIS POR CATEGORIA  CLICADA-->
<!--Funcao php que chama o header-->
<?php get_header(); ?>

<div id="categoria" class="container">
	
<!-- ESTA FUNCAO WORDPRESS EXIBE O NOME CATEGORIA E LOGO EM SEGUIDA A CATEGORIA QUE ESTA SENDO CLICADA-->		
		<h2><?php single_cat_title('');?></h2>
		<hr />
		<div id="categoria-desc"><?php echo category_description( $category_id ); ?></p></div>
<div id="controle">
<!-- PEGA OS POSTS E ORDENA-OS -->	
	<?php query_posts ($query_string . '&orderby=title&order=ASC'); ?>
<!--FUNCAO PHP SE HOUVER POSTS ELE LISTA OS POSTS-->


<?php
	if(have_posts()) : while(have_posts()) : the_post();

?>
		<div id="image_espe" ><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>		
				<div id="espe-description">
					<div id="espe-title">
					<b><?php the_title(); ?></b>
					</div>
					<div id="espe-resumo">
						<?php the_excerpt(); ?>
					</div>
				</div> 
			</div>
	

<!--SE NÃO HOUVER POSTS MOSTRA UMA MENSAGEM DE ERRO-->
<?php
	endwhile;
	else:
?>
<p>Nenhum post encontrado!</p>
<?php
	endif;
?>
</div>
</div>
<div style="clear:both;"> </div>
<!-- FUNCAO WORDPRESS PARA PEGAR O FOOTER-->
<?php get_footer(); ?>