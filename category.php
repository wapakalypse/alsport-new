<?php get_header (); ?>

<?php
if ( is_category() )
$thiscat = get_category(get_query_var('cat'),false);
?>

<div class="slide"><img src="<?php echo bloginfo('url'); ?>/wp-content/uploads/categories/<?php echo $thiscat->slug ; ?>.jpg" alt="<?php echo $thiscat->name; ?>" /></div>

<h1 class="page-title">
	<?php
		if ( is_category() ) :
			single_cat_title();
		else :
	_e( 'Archives', 'striped' );
endif;
	?> на <a href="https://alsport.kz/">AlSport.kz</a>
</h1>

<div id="content">

<?php get_template_part('content') ?>

</div>

<?php dynamic_sidebar( 'true_side' ); ?>

<?php get_footer(); ?>
