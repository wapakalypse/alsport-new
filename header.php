<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="google-site-verification" content="MaV3WbuujR03MrSjtA1wQCYS0zkhbRhORb4AtnNgty4" />
<meta name="yandex-verification" content="44fbffb8b0dea7bb" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="canonical" href="https://alsport.kz/"/> 
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link href="http://alsport.kz/xmlrpc.php" rel="pingback"/>
<link rel="stylesheet" href="/wp-content/themes/alsport/style.css" type="text/css"/>
<link rel="stylesheet" href="/wp-content/themes/alsport/font-awesome/css/font-awesome.min.css"/>

<?php wp_head(); ?>

</head>
<body>

	<input class="nav-burger__checkbox" type="checkbox" id="burger">

	<header>
    	<div><label class="nav-burger" for="burger"></label></div>
		<div id="logo">
			<a href="https://alsport.kz/"><img class="logo-img alignnone size-full" src="/wp-content/uploads/logos/alsport-title.png" /></a></div>
			<?php wp_nav_menu( $args ); ?>
		<div id="hicons">
			<form role="search" method="get" id="searchform" class="search-header" action="<?php echo home_url( '/' ) ?>" >
  			<span class="icon"><i class="fa fa-search"></i></span>
  			<input type="text" value="<?php echo get_search_query() ?>" name="s" id="search" id="search" placeholder="Искать"/>
			</form>

			<a href="https://vk.com/alsportkz" target="_blank"><i class="fa fa-vk" aria-hidden="true"></i></a>
			<a href="https://www.instagram.com/alsport.kz/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
			<a href="https://www.facebook.com/alsport.kz/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
			<a href="https://twitter.com/alsportkz" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
			<a href="https://t.me/alsport.kz" target="_blank"><i class="fa fa-telegram" aria-hidden="true"></i></a>

		</div>
	</header>