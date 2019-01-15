<?php
global $post; // < -- globalize, just in case
$field = get_post_meta($post->ID, 'redirect', true);
if($field) wp_redirect(clean_url($field), 301);
get_header();
?>

<div id="content" >

<?php while ( have_posts() ) : the_post(); ?><?php endwhile; ?>

<div class="imghead-fix" style="background-image: url(<?php
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
echo $thumb_url[0];
?>);">

<h1 class="entry-title"><?php the_title(); ?></h1>
<div class="maincontent">
	<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>'); } ?>
		<div class="entry-meta">

<script type="text/javascript">window.onload=(function() {
  if (window.pluso)if (typeof window.pluso.start == "function") return;
  if (window.ifpluso==undefined) { window.ifpluso = 1;
    var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
    s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
    s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
    var h=d[g]('body')[0];
    h.appendChild(s);
  }})()
</script>
<div class="pluso" data-background="transparent" data-options="small,square,line,horizontal,noncounter,theme=01" data-services="vkontakte,facebook,twitter"></div>

<i class="fa fa-calendar" aria-hidden="true"></i> <?php $text = get_the_date('d.m.Y'); $url  = get_the_date('/Y/m/'); echo get_archives_link( $url, $text, '' ); ?><i class="fa fa-user" aria-hidden="true"></i><?php the_author_posts_link(); ?> </div>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	<div class="entry-meta">
	<i class="fa fa-location-arrow" aria-hidden="true"></i> <?php the_category(', '); ?><i class="fa fa-tags" aria-hidden="true"></i><?php the_tags('', ' / '); ?><?php edit_post_link('<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', ' '); ?>
</div></div></div>

<?php dynamic_sidebar( 'true_side' ); ?>
<?php get_footer(); ?>