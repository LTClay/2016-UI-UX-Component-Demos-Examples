<?php
/*
Template Name: Subpage
*/
?>
<?php get_header(); ?>

<div id="container"> 

		<div id="container_wrapper">
		
		<div id="container_content">

   		<?php if(have_posts()): ?> <?php while(have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<h1><?php the_title(); ?></h1>
			
			<div class="entry">
					<?php the_content(); ?>
					<?php link_pages('<p><strong>Pages:</strong>','</p>','number'); ?>
					<?php edit_post_link('Edit','<p>','</p>'); ?>
					
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


					
		</div> <!-- ends container content -->
	
		</div><!--ends container wrapper-->



</div> <!-- ends container -->

<?php get_footer(); ?>
	
</div> <!--ends main-->

</body>
</html>