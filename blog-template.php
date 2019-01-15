<?php 
/*
    Template Name: News
*/
?>
<?php get_header(); ?>

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
	<h1 class="page-title">Все новости на <a href="https://alsport.kz/">AlSport.kz</a></h1>
    <div class="greed-3"> 
        <?php
        $temp = $wp_query; $wp_query= null;
        $wp_query = new WP_Query(); $wp_query->query('showposts=30' . '&paged='.$paged);
        while ($wp_query->have_posts()) : $wp_query->the_post(); ?>   
		<figure class="effect-sadie">
		<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('full', array('class' => 'imgnews') ); ?></a>
			<figcaption>
			<p><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></p><span><?php $category = get_the_category(); echo $category[0]->cat_name; ?></span>
			</figcaption>			
			</figure>
        <?php endwhile; ?>
	</div>
    <?php nav(); ?> 
        <?php if ($paged > 1) { ?>
        <?php } else { ?>
        <?php } ?>
        <?php wp_reset_postdata(); ?>
 </div>
<?php get_footer(); ?>