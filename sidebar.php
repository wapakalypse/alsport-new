<div id="sidebar-1">
<h4>Предстоящие события</h4>
<br>
<ul><?php wp_list_cats ('sort_column=name'); ?></ul>
<br>
<h4>Места</h4> <br>
<ul><?php get_archives ('postbypost', 10); ?></ul>
<br>
<h4>Наши команды</h4> <br>
<ul><?php wp_get_archives ('type=monthly'); ?></ul>
</div>

<div id="sidebar-2">
<h4>Фоторепортажи</h4>
<br>
<ul><?php wp_list_cats ('sort_column=name'); ?></ul>
<br>
<h4>Видео</h4> <br>
<ul><?php get_archives ('postbypost', 10); ?></ul>
<br>
<h4>Последние события</h4> <br>
<ul><?php wp_get_archives ('type=monthly'); ?></ul>
</div>