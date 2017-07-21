<footer>
<p>О нас | Контакты | Copyright 2015-2016 <a href="<?php bloginfo ('url'); ?>"><?php bloginfo ('name'); ?></a></p>

<div id="mobile-menu" class="menu-btn">
<a href="#first-link"><img class="logo-img alignnone size-full wp-image-164" src="http://localhost/wordpress/wp-content/uploads/2017/07/adsport-logo.png" alt="our-bk-legion" /></a>
<a href="https://vk.com/alsportkz" target="_blank"><i class="fa fa-vk" aria-hidden="true"></i></a>
<a href="https://www.instagram.com/alsport.kz/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
<a href="https://www.facebook.com/alsport.kz/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
<a href="https://twitter.com/alsportkz" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
</div>
</footer>

<script src="https://use.fontawesome.com/1f3f980e35.js"></script>

<script src="<?php echo get_template_directory_uri(); ?>/js/pushy.min.js"></script>

<script type="text/javascript">
$(function() {
	$(window).scroll(function() {
		if($(this).scrollTop() > 100) {
			$('#toTop').fadeIn();
		} else {
$('#toTop').fadeOut();
	}
});
	$('#toTop').click(function() {
		$('body,html').animate({scrollTop:0},800);
			});
		});
</script>

<script>
$(document).ready(function(){   
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#mobile-menu').fadeIn(300);
        } else {
            $('#mobile-menu').fadeOut(100);
        }
    });
});
</script>


<div id="toTop">
<i class="fa fa-caret-up" aria-hidden="true"></i>
</div>

</body>
</html>