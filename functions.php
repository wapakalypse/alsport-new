<?php 

/* MENU REGISTER */

register_nav_menus( array(
	'header_menu' => 'Меню в шапке',
	'footer_menu' => 'Меню в подвале'
) );
add_theme_support( 'post-thumbnails' );
$class = array('class-one', 'class-red', 'class-rounded');


/* SIDEBAR REGISTER */

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


/* FOTOREPS IN WIDGET */

function devise_photorep() {
$the_query = new WP_Query( array( 'tag' => 'photo', 'posts_per_page' => 4 ) );
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
			if ( has_post_thumbnail() ) {
			$string .= '<figure class="effect-sadie"><a href="' . get_the_permalink() .'">' . get_the_post_thumbnail($post_id, 'full', array('class' => 'imgnews') ) .' <p class="photorep">' . get_the_title() .'</p><span><i class="fa fa-share" aria-hidden="true"></i></span></a></figure>';
			} else {
			// if no featured image is found
			$string .= '<li>:<a href="' . get_the_permalink() .'" rel="bookmark">' . get_the_title() .'</a></li>';
			}
			}
	} else {
}

return $string;
wp_reset_postdata();
}
add_shortcode('photorep', 'devise_photorep');
add_filter('widget_text', 'do_shortcode');
add_theme_support('html5', array('search-form'));


/* NAVIGATION */

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
$a['prev_text'] = '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'; //отображение ссылки для предыдущей страницы
$a['next_text'] = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>'; //отображение ссылки для следующей страницы
if ($max > 1) echo '<div class="nav">';
if ($total = 1 && $max > 1) $pages = '<span>Страница ' . $current . ' из ' . $max . ':</span>'."\r\n";
echo $pages . paginate_links($a);
if ($max > 1) echo '</div>';
}


/* CYR-TO-LAT */

function ctl_sanitize_title($title) {
	global $wpdb;
	$iso9_table = array(
		'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Ѓ' => 'G`',
		'Ґ' => 'G`', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'YO', 'Є' => 'YE',
		'Ж' => 'ZH', 'З' => 'Z', 'Ѕ' => 'Z', 'И' => 'I', 'Й' => 'Y',
		'Ј' => 'J', 'І' => 'I', 'Ї' => 'YI', 'К' => 'K', 'Ќ' => 'K',
		'Л' => 'L', 'Љ' => 'L', 'М' => 'M', 'Н' => 'N', 'Њ' => 'N',
		'О' => 'O', 'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T',
		'У' => 'U', 'Ў' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'TS',
		'Ч' => 'CH', 'Џ' => 'DH', 'Ш' => 'SH', 'Щ' => 'SHH', 'Ъ' => '``',
		'Ы' => 'YI', 'Ь' => '`', 'Э' => 'E`', 'Ю' => 'YU', 'Я' => 'YA',
		'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'ѓ' => 'g',
		'ґ' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'є' => 'ye',
		'ж' => 'zh', 'з' => 'z', 'ѕ' => 'z', 'и' => 'i', 'й' => 'y',
		'ј' => 'j', 'і' => 'i', 'ї' => 'yi', 'к' => 'k', 'ќ' => 'k',
		'л' => 'l', 'љ' => 'l', 'м' => 'm', 'н' => 'n', 'њ' => 'n',
		'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
		'у' => 'u', 'ў' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'ts',
		'ч' => 'ch', 'џ' => 'dh', 'ш' => 'sh', 'щ' => 'shh', 'ь' => '',
		'ы' => 'yi', 'ъ' => "'", 'э' => 'e`', 'ю' => 'yu', 'я' => 'ya'
	);	
	$term = $wpdb->get_var("SELECT slug FROM {$wpdb->terms} WHERE name = '$title'");
	if ( empty($term) ) {
		$title = strtr($title, apply_filters('ctl_table', $iso9_table));
		$title = preg_replace("/[^A-Za-z0-9`'_\-\.]/", '-', $title);
	} else {
		$title = $term;
	}
	return $title;
}
if ( !empty($_POST) || !empty($_GET['action']) && $_GET['action'] == 'edit' || defined('XMLRPC_REQUEST') && XMLRPC_REQUEST ) {
	add_filter('sanitize_title', 'ctl_sanitize_title', 9);
	add_filter('sanitize_file_name', 'ctl_sanitize_title');
}
function ctl_convert_existing_slugs() {
	global $wpdb;
	$posts = $wpdb->get_results("SELECT ID, post_name FROM {$wpdb->posts} WHERE post_name REGEXP('[^A-Za-z0-9\-]+') AND post_status = 'publish'");
	foreach ( (array) $posts as $post ) {
		$sanitized_name = ctl_sanitize_title(urldecode($post->post_name));
		if ( $post->post_name != $sanitized_name ) {
			add_post_meta($post->ID, '_wp_old_slug', $post->post_name);
			$wpdb->update($wpdb->posts, array( 'post_name' => $sanitized_name ), array( 'ID' => $post->ID ));
		}
	}
	$terms = $wpdb->get_results("SELECT term_id, slug FROM {$wpdb->terms} WHERE slug REGEXP('[^A-Za-z0-9\-]+') ");
	foreach ( (array) $terms as $term ) {
		$sanitized_slug = ctl_sanitize_title(urldecode($term->slug));
		if ( $term->slug != $sanitized_slug ) {
			$wpdb->update($wpdb->terms, array( 'slug' => $sanitized_slug ), array( 'term_id' => $term->term_id ));
		}
	}
}
function ctl_schedule_conversion() {
	add_action('shutdown', 'ctl_convert_existing_slugs');
}
register_activation_hook(__FILE__, 'ctl_schedule_conversion');


/* CLOSED */

function wp_maintenance_mode(){
if(!current_user_can('edit_themes') || !is_user_logged_in()){
wp_die('<img width="50px" align="left" src="http://s019.radikal.ru/i627/1707/f8/00df24303cc2.jpg"><p style="font-size: 21pt; padding-top: 5px; text-align: center;"> AlSport.kz скоро вернётся обновлённым</p><br />
<p style="font-size: 14pt; text-align: center;">Следите за нашими новостями в социальных сетях:</p>
<p style="text-align: center;">
<a href="//vk.com/alsportkz" target="_blank"><img style="margin: 0 10px;" src="http://s014.radikal.ru/i326/1707/7f/d9d59b452afb.png"></a> 
<a href="//instagram.com/alsport.kz/" target="_blank"><img style="margin: 0 10px;" src="http://s019.radikal.ru/i635/1707/00/435fd98c33b1.png"></a> 
<a href="//facebook.com/alsport.kz/" target="_blank"><img style="margin: 0 10px;" src="http://s019.radikal.ru/i620/1707/c3/940df953373a.png"></a> 
<a href="//twitter.com/alsportkz" target="_blank"><img style="http://radikal.ru"><img src="http://s013.radikal.ru/i323/1707/f9/bce656be017a.png"></a> </p>');
}
}
//add_action('get_header', 'wp_maintenance_mode');


/* REMOVE SIZES */

add_filter('wp_get_attachment_image_attributes', function($attr) {
	if (isset($attr['sizes'])) unset($attr['sizes']);
	if (isset($attr['srcset'])) unset($attr['srcset']);
	return $attr;
}, PHP_INT_MAX);


/* THUMBNAILS */

add_filter( 'intermediate_image_sizes', 'delete_intermediate_image_sizes' );
function delete_intermediate_image_sizes( $sizes ){
	return array_diff( $sizes, array(
		'medium_large',
		'large',
		'post-thumbnail',
	) );
}


/* H2-H3 IN EDITOR */

add_action( 'admin_print_footer_scripts', 'add_sheensay_quicktags' );
function add_sheensay_quicktags() {
   if (wp_script_is('quicktags')) :
?>
    <script type="text/javascript">
      if (QTags) {  
        // QTags.addButton( id, display, arg1, arg2, access_key, title, priority, instance );
        QTags.addButton( 'sheens_h2', 'h2', '<h2>', '</h2>', 'h', 'Заголовок 2 уровня', 2 );
        QTags.addButton( 'sheens_h3', 'h3', '<h3>', '</h3>', 'h3', 'Заголовок 3 уровня', 3 );
        QTags.addButton( 'sheens_adaptive-frame', 'frame', '<div style="position: relative; height: 0; padding-bottom: 56.25%;"><iframe style="position: absolute; width: 100%; height: 100%; left: 0;" src="https://www.youtube.com/embed/____"></iframe></div>', '', 'frame', 'Адаптивный фрэйм', 7 );
      }
    </script>
<?php endif;
}


/* DISABLED EMOJI */
if(1){
	add_filter('emoji_svg_url', '__return_empty_string');
	add_action( 'init', 'disable_emojis' );
	function disable_emojis() {
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	}
	function disable_emojis_tinymce( $plugins ) {
		if ( is_array( $plugins ) ) {
			return array_diff( $plugins, array( 'wpemoji' ) );
		} else {
			return array();
		}
	}
}

/* CUSTOM-FIELDS IN EVENTS */
function true_custom_fields() {
	add_post_type_support( 'am_event', 'custom-fields'); // в качестве первого параметра укажите название типа поста
}
add_action('init', 'true_custom_fields');

?>