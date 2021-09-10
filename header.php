<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width">
		<title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
		<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?> 
        <meta name="description" content="Clinica odontológia integrada andrea rosa da gestacao a terceira idade  ,">
		<meta name="keywords" content="denstista, aparelhos movéis, odontologia integrada, belo horizonte, especialidades, clinica geral, odontopediatria, ortodontia facial, hebiatria, thd, odontologia"/>
		<meta name="geography" content="BELO HORIZONTE MINAS GERAIS"/>
		<meta name="Language" content="PT, PORTUGUESE PORTUGUÊS"/>
		<meta name="city" content="Belo Horizonte"/>
		<meta name="country" content="Brazil"/>
		
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
		<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
		<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" />
                <link rel="icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" type="image/x-icon" />


	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/mobile.css" type="text/css" media="all and (max-width: 480px)">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/tablet.css" type="text/css" media="all and (min-width:481px) and (max-width:960px)">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css" media="all and (min-width:961px) ">
		<script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-2.1.1.min.js"></script>	
		<script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/functions.js?201501211146"></script>
		<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Old+Standard+TT' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Abril+Fatface' rel='stylesheet' type='text/css'>
		<?php wp_head(); ?>
	</head>
	<body >
		<div id="cabecalho" class="container">
		<div id="logo">
			<div id="logoimg">
			<a href="<?php echo get_option('home'); ?>"><img  src="<?php echo get_template_directory_uri(); ?>/images/logo.png" height="100px" /></a> 
			</div>
		</div>
		<div id="header_right" >
			<div id="contato">
			     
			    
				
				
				 <b id="telefone">(31) 3222-1843</b>
				 
				 <img src="<?php echo get_template_directory_uri(); ?>/images/wp.png" id="imgcontato" ></img>
				 
				 <b id="telefone">(31) 98610-1843</b>
				 
				  <img src="<?php echo get_template_directory_uri(); ?>/images/Contato.png" id="imgcontato" ></img>
			
			</div>
			
			<div id="social" >
				<a href="https://www.linkedin.com/in/odontologia-integrada-b9aba310a?trk=nav_responsive_tab_profile" class="linke" title="Linkedin"></a>
				<a href="https://www.instagram.com/iodontologia" class="insta" title="Instagram"></a>
				<a href="https://www.facebook.com/Odontologia-Integrada-Andr%C3%A9a-Rosa-448814541972900/" class="face" title="Facebook"></a>
			</div>	
		</div>	
		</div>
		<nav>
				<div id="conteudomenu" class="container">
						<?php wp_nav_menu( array( 'menu'  => 'principal', 'theme_location' => 'menu-top' ) );?> 
				</div>	
				<div id="mobile-menu">
					
				</div>
				
		</nav>
		
		