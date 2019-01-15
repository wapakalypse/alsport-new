<?php 
/*
	Template Name: Event
	Template Post Type: am_event
*/
?>

<?php
global $post; // < -- globalize, just in case
$field = get_post_meta($post->ID, 'redirect', true);
if($field) wp_redirect(clean_url($field), 301);
get_header();
?>

<div id="content" >

<?php while ( have_posts() ) : the_post(); ?><?php endwhile; ?>

<div class="imghead-fix" style=" padding: 0 0 100px;">

	<div class="maincontent">
		<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>'); } ?>
		<div class="entry-content">
			<h1><?php the_title(); ?></h1>
				<div class="greed-2">
					<div class="center"><img src="<?php
					$thumb_id = get_post_thumbnail_id();
					$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
					echo $thumb_url[0];
					?>" /></div>
					<div class="center"><?php the_content(); ?></div>
				</div>
		</div>
		<?php edit_post_link('<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', ' '); ?>
	</div>
</div>
</div>

<?php dynamic_sidebar( 'true_side' ); ?>
<?php get_footer(); ?>