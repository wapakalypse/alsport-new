<!DOCTYPE html PUBLIC «-//W3C//DTD XHTML 1.0 Transitional//EN»
«http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd»>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="О том как создать сайт самому" />
<meta name="keywords" content="создание сайтов, сайтостроение" />
<title><?php wp_title (' '); ?> | <?php if (wp_title (' ', false)) { echo ' | '; } ?><?php bloginfo ('name'); ?></title>
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://feeds.feedburner.com/ваш фид" />
<link rel="pingback" href="<?php bloginfo ('pingback_url'); ?>" />
<link rel="stylesheet" href="<?php bloginfo ('stylesheet_url'); ?>" type="text/css" media="screen"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js" type="text/javascript"></script>

<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic" rel="stylesheet">

<link href="<?php echo get_template_directory_uri(); ?>/js/jquery.bxslider.css" rel="stylesheet" />

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.bxslider.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.slider1').bxSlider({
            maxSlides: 5,//максимальное количество слайдов
            moveSlides: 1,//количество слайдов для смещения при анимации
            auto: true,//Автоматическая смена слайдов
            autoStart: true,//автоматический старт
            slideMargin: 10//отступ между слайдами
        });
    });
</script>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/pushy.css" rel="stylesheet" >

<script src="<?php echo get_template_directory_uri(); ?>/js/pushy.min.js"></script>

<?php wp_head (); ?>

</head>
<body>
	<header>
		<div id="logo" class="menu-btn"><img class="logo-img alignnone size-full wp-image-164" src="http://localhost/wordpress/wp-content/uploads/2017/04/adsport.png" alt="our-bk-legion" width="300" height="300" /></div>
		<div id="hicons">

  <form class="search-header" role="search" method="get" id="searchform" class="searchform" action="/">
      <span class="icon"><i class="fa fa-search"></i></span>
      <input type="search" id="search" placeholder="Искать" />
  </form>
			<a href="https://vk.com/alsportkz" target="_blank"><i class="fa fa-vk" aria-hidden="true"></i></a>
			<a href="https://www.instagram.com/alsport.kz/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
			<a href="https://www.facebook.com/alsport.kz/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
			<a href="https://twitter.com/alsportkz" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
		</div>

        <div class="site-overlay"></div>
	</header>
		<div class="pushy pushy-left" data-focus="#first-link" ><?php wp_nav_menu( $args ); ?> </div>