<?php // Template Name: Contato ?>

<?php get_header(); ?>

<div id="formulario" class="container">
<h2>Fale conosco</h2>
<hr />
<?php echo do_shortcode( '[contact-form-7 id="62" title="Formulário de contato 1"]' ); ?>
<?php echo the_content(); ?>
</div>

<?php get_footer(); ?>


