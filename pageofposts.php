<?php get_header (); ?>

<?php
if ( is_category() )
$thiscat = get_category(get_query_var('cat'),false);
?>

<img class="category-thumb" src="<?php echo bloginfo('url'); ?>/wp-content/uploads/<?php echo $thiscat->slug ; ?>.jpg" alt="<?php echo $thiscat->name; ?>" />

<h1 class="page-title">
	<?php
		if ( is_category() ) :
			single_cat_title();
elseif ( is_tag() ) :
	single_tag_title();
elseif (is_year()):
    printf(__('Year: %s', 'striped'), '<span>' . get_the_date(_x('Y', 'yearly archives date format', 'striped')) . '</span>');
elseif (is_month()):
    printf(__('Month: %s', 'striped'), '<span>' . get_the_date(_x('F Y', 'monthly archives date format', 'striped')) . '</span>');
elseif (is_day()):
    printf(__('Day: %s', 'striped'), '<span>' . get_the_date() . '</span>');
elseif (is_author()):
    printf( __( 'Author: %s', 'striped' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
else :
	_e( 'Archives', 'striped' );
endif;
	?> на <a href="https://alsport.kz/">AlSport.kz
</h1>

<div id="content">

<?php while ( have_posts() ) : the_post(); ?>

	<article class="threecol">
	<figure class="effect-sadie">
		<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('full', array('class' => 'imgnews') ); ?></a>
			<figcaption>
			<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p><h6><i class="fa fa-share" aria-hidden="true"></i></h6><span><?php $category = get_the_category(); echo $category[0]->cat_name; ?></span>
			</figcaption>			
			</figure></article>

			<?php endwhile; ?>

</div>
      <?php nav(); ?> 

<?php dynamic_sidebar( 'true_side' ); ?>

<?php get_footer();
