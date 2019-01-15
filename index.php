<?php get_header (); ?>

<div id="slider-css">
	<section class="slide">
    <?php
        $args = array('cat'=>'337','showposts' => 10,'order' => 'DESC' );
        query_posts($args);
        while ( have_posts() ) : the_post();
    ?>
		<figure>
            		<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('full'); ?></a>
		</figure>
    <?php endwhile; wp_reset_query(); ?>
    <?php $wp_query1 = $temp_query1; ?>
	</section>
</div>

<div id="content">
<h2 class="widget-title">Последние новости</h2>
<?php
$query = new WP_Query('cat=1,4,5,6,9,14,15,16,17,20,23,24,25,26,238,239,240,263,300,334,350&showposts=9');
echo '<div id="news">';
if( $query->have_posts()) {
	while( $query->have_posts() ){ $query->the_post();
	?>
	<article>
	<figure class="effect-sadie">
		<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('full', array('class' => 'imgnews') ); ?></a>
			<figcaption>
			<p><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a><?php get_the_ID(); ?></p><span><?php $category = get_the_category(); echo $category[0]->cat_name; ?></span>
			</figcaption></figure></article>
	<?php
	}
echo '</div>';
	wp_reset_postdata();
} 
else echo 'Записей нет.';
?>
	<a class="post-title" href="https://alsport.kz/news">ВСЕ НОВОСТИ</a>
</div>

<?php dynamic_sidebar( 'true_side' ); ?>

<?php get_footer (); ?>