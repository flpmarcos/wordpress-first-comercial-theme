<?php
/** Pagination */
function pagination_funtion() {
// Get total number of pages
global $wp_query;
$total = $wp_query->max_num_pages;
// Only paginate if we have more than one page                   
if ( $total > 1 )  {
    // Get the current page
    if ( !$current_page = get_query_var('paged') )
        $current_page = 1;
                           
        $big = 999999999;
        // Structure of "format" depends on whether we?re using pretty permalinks
        $permalink_structure = get_option('permalink_structure');
        $format = empty( $permalink_structure ) ? '&page=%#%' : 'page/%#%/';
        echo paginate_links(array(
            'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
            'format' => $format,
            'current' => $current_page,
            'total' => $total,
            'mid_size' => 2,
            'type' => 'list'
        ));
    }
}
/** END Pagination */
//HABILITART C?DIGO PHP DENTRO DE WIDGET
function execute_php($html){
     if(strpos($html,"<"."?php //")!==false){
          ob_start();
          eval("?"."><!-- -->".$html);
          $html=ob_get_contents();
          ob_end_clean();
     }
     return $html;
}
add_filter('widget_text','execute_php',100);

//REGISTRO DO SIDEBAR UTILIZADO NO RODAPE
if (function_exists('register_sidebar'))
{
    register_sidebar(array(
        'name'          => 'RodapeDinamico',
        'before_widget' => '<div id="rodape-widget"   >',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
}


//REGISTRO DO SIDEBAR UTILIZADO NO RODAPE MOBILE


if (function_exists('register_sidebar'))
{
    register_sidebar(array(
        'name'          => 'RodapeMobile',
        'before_widget' => '<div id="rodape-mobile"   >',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
}


//REGISTRO DO SIDEBAR UTILIZADO NO RODAPE Tablet


if (function_exists('register_sidebar'))
{
    register_sidebar(array(
        'name'          => 'RodapeTablet',
        'before_widget' => '<div id="rodape-tablet"   >',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
}

/*ESSA FUNCAO WORDPRESS ADICIONA IMAGEM DESTACADA AO TEMA*/
 
 add_theme_support('post-thumbnails');
 
 /*******************************
Adiciona a??o menus personalizados
********************************/
add_action( 'init', 'register_my_menus' );
function register_my_menus() {
register_nav_menus(
array(
'menu-top' => __( 'Menu Top' ),
'menu-sidebar' => __( 'Menu Sidebar' ),
'menu-footer' => __( 'Menu Footer' )
)
);
}

/*******************************
Modificar excerpt
*******************************/


function excerpt($excerpt_length) {
  global $post;
	$content = strip_shortcodes($post->post_content);
	$words = explode(' ', $content, $excerpt_length + 1);
	if(count($words) > $excerpt_length) :
		array_pop($words);
		array_push($words, '');
		$content = implode(' ', $words);
	endif;

  $content = strip_tags($content);

	echo $content.'...';
}


function new_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

/*******************************
Modificar EXECEPT ADICIONANDO LEIA MAIS E LINK
*******************************

function add_resumo_com_link($more) {
       global $post;
	return '... <a href="'. get_permalink($post->ID) . '">(Saiba mais)</a>';
}
add_filter('excerpt_more', 'add_resumo_com_link');

 /*******************************
Configura resumo do comentario
********************************/


function custom_excerpt_length( $length ) {
 return  12;
}
add_filter( 'excerpt_length', 'custom_excerpt_length');

 /*******************************
ADICIONANDO SHORTCODE
********************************/
add_filter('widget_text', 'shortcode_unautop');
add_filter('widget_text', 'do_shortcode');
add_filter('the_content_rss', 'do_shortcode');


 /*******************************
ANO COPYRIGHT DINAMICO
********************************/
function comicpress_copyright() {
global $wpdb;
$copyright_dates = $wpdb->get_results("
SELECT
YEAR(min(post_date_gmt)) AS firstdate,
YEAR(max(post_date_gmt)) AS lastdate
FROM
$wpdb->posts
WHERE
post_status = 'publish'
");
$output = '';
if($copyright_dates) {
$copyright = "&copy; " . $copyright_dates[0]->firstdate;
if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
$copyright .= '-' . $copyright_dates[0]->lastdate;
}
$output = $copyright;
}
return $output;
}



//ESCONDER MENUS DE ACESSO ADMINISTRATIVO
function hide_menu() {
/*	   remove_submenu_page( 'index.php', 'update-core.php' );
       remove_submenu_page( 'themes.php', 'themes.php' );
       remove_submenu_page( 'themes.php', 'theme-editor.php' );
       remove_submenu_page( 'themes.php', 'theme_options.php' );
	   remove_submenu_page( 'customize.php', 'customize.php' );
	   remove_submenu_page( 'tools.php', 'tools.php' );
	   remove_submenu_page( 'tools.php', 'import.php' );
	   remove_submenu_page( 'tools.php', 'export.php' );
	   remove_submenu_page( 'options-general.php', 'mr_social_sharing' );
	   remove_submenu_page( 'options-general.php', 'wlcms-plugin.php' );
	   remove_submenu_page( 'options-general.php', 'vipers-video-quicktags' );
	   remove_menu_page( 'plugins.php' );
	   remove_menu_page( 'rs-produto-restrictions' );
	   remove_menu_page( 'rs-options' );
	   remove_menu_page( 'wpcf' );
	   remove_menu_page( 'edit.php' );
	   remove_menu_page( 'edit-comments.php' );	   */
}
add_action('admin_head', 'hide_menu');

//esconde cor de perfil
function admin_color_scheme() {
   global $_wp_admin_css_colors;
   $_wp_admin_css_colors = 0;
}
add_action('admin_head', 'admin_color_scheme');


//ESCONDE AJUDA
function hide_help() {
    echo '<style type="text/css">
            #contextual-help-link-wrap { display: none !important; }
          </style>';
}
add_action('admin_head', 'hide_help');

//ESCONDER BARRA SUPERIOR DE EDI??O NO SITE
function my_function_admin_bar(){
  return false;
}
add_filter( "show_admin_bar" , "my_function_admin_bar");

//DEFINI??ES DIRETAS 
define('SB_POST_PER_PAGE', 10);

//ADICIONAR FEATURED GALLERY AOS POSTTYPES NECESS?RIOS
/*
function add_featured_galleries_to_posttypes() {
	$arr[] = 'evento';
	return $arr;
}
add_action( 'fg_post_types', 'add_featured_galleries_to_posttypes' );
*/

//REGISTRA MENU DE REDES SOCIAIS
if ( function_exists( 'register_nav_menu' ) ) {
	register_nav_menu( 'social-menu', 'Menu de redes sociais' );
}

//MOSTRA MENU
function softbis_show_menu($nomeMenu, $idMenu){
	wp_nav_menu( array(
		'menu' => $nomeMenu,
		'echo' => true,
		'menu_id' => $idMenu,
	) );		
}

//MONTA MENU PRINCIPAL A PARTIR DAS PAGINAS MARCADAS COMO MENU=PRINCIPAL
function softbis_menu_principal($idMenu){
	$primeiro = ' class="primeiroLi" ';
	$args = array(
		'sort_order' => 'ASC',
		'sort_column' => 'menu_order',
		'meta_key' => 'menu',
		'meta_value' => 'principal',
		'post_type' => 'page',
		'post_status' => 'publish',
		'hierarchical' => 0
	); 
	$pages = get_pages($args);
	$html = '<ul id="' . $idMenu . '">';
	foreach($pages as $page){
		$maispad = 'class="mainMenu"';
		$html = $html . '<li'. $primeiro .' onmouseover="showhide(\'sub_'.$page->ID.'\')" onmouseout="showhide(\'sub_'.$page->ID.'\')">';
		$sub = softbis_submenu_principal($page->ID);
		if ($page->ID == 7){
			$sub = softbis_submenu_objetivos();
		}
		if ($sub == ''){
			$html = $html . '<a ' . $maispad .' href="' . $page->guid . '">' . $page->post_title .'</a>';
		} else {
			$html = $html . '<a ' . $maispad .' href="#">' . $page->post_title .'</a>';
			$html = $html . $sub;
		}
		$html = $html . '</li>';
		$primeiro = '';
	}
	$html = $html . '</ul>';
	return $html;	
}

//Retorna SUBMENU
function softbis_submenu_principal($idPai){
	$primeiro = ' class="primeiroLi" ';
	$args = array(
		'sort_order' => 'ASC',
		'sort_column' => 'menu_order',
		'post_type' => 'page',
		'post_status' => 'publish',
		'hierarchical' => 0,
		'parent' => $idPai,
	); 
	$pages = get_pages($args);
	if(sizeof($pages) == 0){
		return '';
	}
	$html = '<ul id="sub_'.$idPai.'" class="submenuPrincipal">';
	foreach($pages as $page){
		$html = $html . '<li'. $primeiro .'><a href="' . $page->guid . '">' . $page->post_title .'</a></li>';
		$primeiro = '';
	}
	$html = $html . '</ul>';
	return $html;	
}

//RETORNA SLIDER
function softbis_slider($slugName){
	global $cyclone_slider_plugin_instance;
	
	if(isset($cyclone_slider_plugin_instance)){
		$html = $cyclone_slider_plugin_instance['frontend']->cycloneslider_shortcode( array('id'=>$slugName) );
		//$html = $cyclone_slider_plugin_instance->cycloneslider_shortcode( array('id'=>$slugName) );
	}
	if (substr_count($html, 'not found') > 0){
		return '';
	} else {
		echo '<div id="sliderPage">';
		cyclone_slider($slugName);
		echo '</div>';
		//$html = '<div id="sliderPage">' . $html . '<div class="verticalCurvadaSlide"></div></div>';
		//return $html;
	}
}

//OBTEM IMAGEM DESTACADA
function softbis_get_destacada($idPost){
	if (has_post_thumbnail($idPost)){
		$imgSrc = wp_get_attachment_image_src(get_post_thumbnail_id($idPost), 'full');
		$src = $imgSrc[0];
	} else {
		$src = get_template_directory_uri() . '/images/image-not-found.png';
	}
	return $src;
}

//FUNCAO GENERICA PARA RETORNAR POSTS DE CHAMADA
function softbis_posts($divClass, $postType, $slugCategory='', $qtd=5){
	$getPag = $divClass . 'Pag';
	$atualPage = $_GET[$getPag];
	if($atualPage == 0 || $atualPage == null || $atualPage == ''){
		$atualPage = 1;
	}
	$offSet = (($qtd * $atualPage) - $qtd);
	$args = array (
		'order' => 'DESC',
		'orderby' => 'post_date',
		'post_type' => $postType,
		'post_status' => 'publish',
		'category_name' => $slugCategory,
		'posts_per_page'   => $qtd,
		'offset' => $offSet,
	);
	$postagens = get_posts($args);
	$html = '';
	foreach($postagens as $postagem): setup_postdata($postagem);
		$link = get_post_meta( $postagem->ID, 'link', true );
		if ($link == '' || $link == null){
			$link = $postagem->guid;
			$target = '';
		} else {
			$target = ' target="_blank" ';
		}
		$coment = $postagem->comment_count;
		if ($coment == 1){
			$coment = $coment . ' coment?rio';
		} else {
			$coment = $coment . ' coment?rios';
		}
		$html = $html . '<div class="'.$divClass.'-item">';
		$html = $html . '	<a href="' . $link . '" ' . $target . ' >';
		$html = $html . '		<div class="'.$divClass.'-imagem">';
		$html = $html . '			<img src="'. softbis_get_destacada($postagem->ID) .'" alt="imagem destaque '.$divClass.' - '.$postagem->ID.'" border="no" />';
		$html = $html . '		</div>';
		$html = $html . '		<div class="'.$divClass.'-conteudo">';
		$html = $html . '			<div class="'.$divClass.'-titulo">' . get_the_title($postagem->ID) . '</div>';
		$html = $html . '			<div class="'.$divClass.'-info">' . get_the_time('Y-m-d', $postagem->ID) . ' - ' . $coment . '</div>';
		if($postagem->post_excerpt == ''){
			$resumo = $postagem->post_content;
		} else {
			$resumo = $postagem->post_excerpt;
		}
		$html = $html . '			<div class="'.$divClass.'-resumo">' . substr($resumo, 0, 220) . '[...]</div>';
		$html = $html . '		</div>';
		$html = $html . '		<div class="'.$divClass.'-marcador"></div>';
		$html = $html . '	</a>';
		$html = $html . '</div>';
	endforeach;
	$html = $html . '
	';
	$html = $html . '<div class="'.$divClass.'-paginate">';
	$html = $html . '<form id="'.$divClass.'_form" name="'.$divClass.'_form" method="GET">';
	$html = $html . '<input type="hidden" id="'.$getPag.'" name="'.$getPag.'" value="'.$atualPage.'" />';
	$total = softbis_total_posts($postType, $slugCategory);
	$totalPages = ceil($total/$qtd);
	
	$count = 1;
	while ($count <= $totalPages){
		if ($count == $atualPage){
			$html = $html . '<input type="button" class="item-paginate-selected" value="'.$count.'" onclick="goPaginate(\''.$divClass.'\','.$count.');" />';
		} else {
			$html = $html . '<input type="button" class="item-paginate" value="'.$count.'" onclick="goPaginate(\''.$divClass.'\','.$count.');" />';
		}
		$count++;
	}
	$html = $html . '</form></div>';
	return $html;
}

//CONTA TOTAL DE POSTS
function softbis_total_posts($postType, $slugCategory=''){
	$args = array (
		'post_type' => $postType,
		'post_status' => 'publish',
		'category_name' => $slugCategory,
	);
	$postagens = get_posts($args);
	$total = sizeof($postagens);
	return $total;
}


//LISTAR CATEGORIAS
function softbis_listar_categorias(){
	$args = array(
		'orderby' => 'name',
		'order' => 'ASC',
		'taxonomy' => 'category',
	);
	$categories = get_categories($args);
	$html = '';
	foreach($categories as $category) { 
		$postArgs = array(
			'post_type' => 'noticia',
			'post_status' => 'publish',
			'category_name' => $category->slug,
		);
		$posts = get_posts($postArgs);
		$html = $html . '<div class="cat-item">';
		$html = $html . '	<a href="?category='.$category->slug.'&catname='.$category->name.'">';
		$html = $html . '		<div class="cat-titulo">'.$category->name.' ('.count($posts).')</div>';
		$html = $html . '		<div class="cat-marcador"></div>';
		$html = $html . '	</a>';
		$html = $html . '</div>';
	}
	return $html;
}


//RETORNA IMAGENS DA GALERIA
function softbis_galeria($postId){
	$html = '';
	$galleryArray = get_post_gallery_ids($postId); 
	foreach ($galleryArray as $id) { 
	$html = $html . '<div class="image-galery">';
	$html = $html . '	<a href="' . wp_get_attachment_url($id) . '" data-litebox-group="'.$postId.'" class="litebox">';
	$html = $html . '		<img id="' . $id . '" src="' . wp_get_attachment_url($id) . '" onclick="abrirImagemGaleria('. $id .');">';
	$html = $html . '	</a>';
	$html = $html . '</div>';
	}
	return $html;	
}
