<?php 

// Menu register
register_nav_menus( array(
	'header_menu' => 'Меню в шапке',
	'footer_menu' => 'Меню в подвале'
) );
add_theme_support( 'post-thumbnails' );
$class = array('class-one', 'class-red', 'class-rounded');

// Sidebar register
function true_register_wp_sidebars() {
	/* В боковой колонке - первый сайдбар */
	register_sidebar(
		array(
			'id' => 'true_side', // уникальный id
			'name' => 'Боковая колонка', // название сайдбара
			'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', // описание
			'before_widget' => '<div id="%1$s" class="side widget %2$s">', // по умолчанию виджеты выводятся <li>
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">', // по умолчанию заголовки виджетов в <h2>
			'after_title' => '</h2>'
		)
	);
}
add_action( 'widgets_init', 'true_register_wp_sidebars' );

// bx slider post-thumb
add_theme_support(‘post-thumbnails’); // поддержка миниатюр
set_post_thumbnail_size(200, 150, false);

// fotoreps in vidgets
function devise_photorep() {
$the_query = new WP_Query( array( 'category_name' => 'photo', 'posts_per_page' => 4 ) );
if ( $the_query->have_posts() ) {
	$string .= '<ul class="photorep">';
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
			if ( has_post_thumbnail() ) {
			$string .= '<li><figure class="effect-sadie"><a href="' . get_the_permalink() .'" rel="bookmark">' . get_the_post_thumbnail($post_id, 'full', array('class' => 'imgnews') ) .'<h6><i class="fa fa-share" aria-hidden="true"></i></h6> </figure><span class="phototext">' . get_the_title() .'</span></a></li>';
			} else {
			// if no featured image is found
			$string .= '<li><a href="' . get_the_permalink() .'" rel="bookmark">' . get_the_title() .'</a></li>';
			}
			}
	} else {
}
$string .= '</ul>';
return $string;
wp_reset_postdata();
}
add_shortcode('photorep', 'devise_photorep');
add_filter('widget_text', 'do_shortcode');

add_theme_support('html5', array('search-form'));

// Similar posts
function nav() {
global $wp_query, $wp_rewrite;
$pages = '';
$max = $wp_query->max_num_pages;
if (!$current = get_query_var('paged')) $current = 1;
$a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
$a['total'] = $max;
$a['current'] = $current;
$total = 1; //1 - вывод текста "Страница N из N", 0 - не выводить
$a['mid_size'] = 3; //количество ссылок на страницы слева и справа от текущей
$a['end_size'] = 5; //Количество ссылок вначале и в конце
$a['prev_text'] = '&laquo; Предыдущая '; //отображение ссылки для предыдущей страницы
$a['next_text'] = 'Следующая &raquo;'; //отображение ссылки для следующей страницы
if ($max > 1) echo '<div class="nav">';
if ($total = 1 && $max > 1) $pages = '<span>Страница ' . $current . ' из ' . $max . '</span>'."\r\n";
echo $pages . paginate_links($a);
if ($max > 1) echo '</div>';
}

?>
