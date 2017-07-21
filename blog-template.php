<?php
/*
 * Template name: Blog
 */
$current_page = (get_query_var('paged')) ? get_query_var('paged') : 1; // ���������� ������� �������� �����
$args = array(
	'posts_per_page' => get_option('posts_per_page'), // �������� �� ��������� ������ �� ��������, �� �� ������ ������������ � �����������
	'paged'          => $current_page // ������� ��������
);
query_posts( $args );
 
$wp_query->is_archive = true;
$wp_query->is_home = false;
 
while(have_posts()): the_post();
	?>
	<h2><?php the_title() /* ��������� */ ?></h2>
	<p><?php the_content() /* ���������� ����� */ ?></p>
	<?php
endwhile;
 
if( function_exists('wp_pagenavi') ) wp_pagenavi(); // ������� ������������ ���������