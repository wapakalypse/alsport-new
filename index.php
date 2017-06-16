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

<?php get_template_part('content') ?>

<?php dynamic_sidebar( 'true_side' ); ?>

<?php get_footer (); ?>