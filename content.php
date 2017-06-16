<div id="content">
<?php while ( have_posts() ) : the_post(); ?>

	<article class="threecol">
	<figure class="effect-sadie">
		<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('full', array('class' => 'imgnews') ); ?></a>
			<figcaption>
			<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p><h6><i class="fa fa-share" aria-hidden="true"></i></h6><span><?php $category = get_the_category(); echo $category[0]->cat_name; ?></span>
			</figcaption>			
			</figure></article>
	<?php endwhile; ?>
	<center><a href="https://alsport.kz/sportivnye-sobyitiya-almaty-2017">ВСЕ НОВОСТИ</a></center> 
</div>