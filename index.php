<?php get_header (); ?>

<div class="slider1">
    <?php
        $args = array('cat'=>'32','showposts' => 10,'order' => 'DESC' );
        query_posts($args);
        while ( have_posts() ) : the_post();
    ?>
    <div class="slider">
            <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('full'); ?></a>

    </div>
    <?php endwhile; wp_reset_query(); ?>
    <?php $wp_query1 = $temp_query1; ?>
</div>

<div id="content">

<?php
$query = new WP_Query('cat=1,2,3,4,5,6,7,8,9,23&showposts=6');
echo '<div id="news"><ul>';
if( $query->have_posts() ){
	while( $query->have_posts() ){ $query->the_post();
	?>
	<div class="threecol">
	<figure class="effect-sadie">
		<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('full', array('class' => 'imgnews') ); ?></a>
			<figcaption>
			<p><a href=""><?php the_title(); ?></a></p><h6><i class="fa fa-share" aria-hidden="true"></i></h6><span><?php $category = get_the_category(); echo $category[0]->cat_name; ?></span>
			</figcaption></figure></div>
	<?php
	}
echo '</ul></div>';
	wp_reset_postdata();
} 
else echo 'Записей нет.';
?>
	<a class="post-title" href="https://alsport.kz/sportivnye-sobyitiya-almaty-2017">ВСЕ НОВОСТИ</a>
</div>

<?php dynamic_sidebar( 'true_side' ); ?>

<?php get_footer (); ?>