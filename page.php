<?php
global $post; // < -- globalize, just in case
$field = get_post_meta($post->ID, 'redirect', true);
if($field) wp_redirect(clean_url($field), 301);
get_header();
?><div id="content">
	<div class="imghead"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail('full', array('class' => 'imgnews') ); ?></a></div>

<?php while ( have_posts() ) : the_post(); ?><?php endwhile; ?>

	<div class="maincontent">
	<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>'); } ?>
	<article class="<?php post_class(); ?>" id="post-<?php the_ID(); ?>">
			<h1 class="entry-title"><a title="<?php printf( esc_attr__( 'Permalink to %s', 'striped' ), the_title_attribute( 'echo=0' ) ); ?>" href="<?php the_permalink(); ?>" rel="bookmark">
			<?php the_title(); ?>
			</a></h1>

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
<div class="pluso" data-background="transparent" data-options="small,square,line,horizontal,noncounter,theme=01" data-services="vkontakte,facebook,twitter"></div><i class="fa fa-calendar" aria-hidden="true"></i> <?php the_date(); ?><i class="fa fa-user" aria-hidden="true"></i><?php the_author(); ?>


		<?php the_content(); ?>


                    </div></article></div>

<div class="similar_records">
<h2 style="text-align: center;">Похожие записи:</h2>
<?php $tags = wp_get_post_tags($post->ID);
if ($tags) {
 $tag_ids = array();
 foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
 $args=array(
 'tag__in' => $tag_ids, // Сортировка происходит по тегам (меткам)
 'orderby'=>rand, // Добавляем условие сортировки рандом (случайный подбор)
 'caller_get_posts'=>1, // Запрещаем повторение ссылок
 'post__not_in' => array($post->ID),
 'showposts'=>6 // Цифра означает количество выводимых записей
 );
 $my_query = new wp_query($args);
 if( $my_query->have_posts() ) {
 echo '<ul>';
        while ($my_query->have_posts()) {
            $my_query->the_post();
        ?>
	<div class="threecol"><figure class="effect-sadie">
		<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('full', array('class' => 'imgnews') ); ?></a>
			<figcaption>
			<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p><h6><i class="fa fa-share" aria-hidden="true"></i></h6>
			</figcaption>			
			</figure></div>
</li>
<?php
}
echo '</ul>';
}
wp_reset_query();} 
?></div>
<?php dynamic_sidebar( 'true_side' ); ?>
<?php get_footer(); ?>