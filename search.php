<?php get_header (); ?>

<h1 class="page-title">
Вы искали "<?php echo get_search_query(); ?>"
</h1>

<div id="content">

<?php
$args = array_merge( $wp_query->query, array( 'post_type' => "post") );
query_posts($args); ?>

<?php get_template_part('content') ?>

</div>

<?php dynamic_sidebar( 'true_side' ); ?>

<?php get_footer(); ?>
