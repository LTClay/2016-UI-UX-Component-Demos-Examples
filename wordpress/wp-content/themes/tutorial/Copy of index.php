<?php get_header(); ?>
<link href="style.css" rel="stylesheet" type="text/css" />


<div id="container"> 

		<div id="container_wrapper">
		
		<div id="container_content">
		
		<h1>Featured Portfolio</h1>

	<?php include (ABSPATH . '/wp-content/plugins/featured-content-gallery/gallery.php'); ?>
	<!--<?php if(have_posts()): ?> <?php while(have_posts()) : the_post(); ?>-->
		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> <?php the_title(); ?></a></h2>
			<div class="entry">
					<?php the_content(); ?>
						<p class="postmetadata">
							<?php _e('Filed under&#58;'); ?> <?php the_category(', ') ?> <?php _e('by'); ?> <?php  the_author(); ?><br />
							<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> <?php edit_post_link('Edit', ' &#124; ', ''); ?>
						</p>
			</div> <!-- ends entry div -->
		</div> <!-- ends post div -->
	<?php endwhile; ?>
			<div class="navigation">
					<?php posts_nav_link(); ?>
			</div>
	
	<?php else: ?>
			<div class="post">
				<h2><?php _e('Not Found'); ?></h2>
			</div>
	
	<?php endif; ?>
</div>

<?php get_sidebar(); ?>

</div><!--ends containter wrapper-->

</div> 


<?php get_footer(); ?>
	



</body>
</html>