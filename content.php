<div class="greed-3"> 

<?php while ( have_posts() ) : the_post(); ?>

	<figure class="effect-sadie">
		<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('full', array('class' => 'imgnews') ); ?></a>
			<figcaption>
			<p><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></p><span><?php $category = get_the_category(); echo $category[0]->cat_name; ?></span>
			</figcaption>			
			</figure>

			<?php endwhile; ?>
</div>
     
<?php nav(); ?> 