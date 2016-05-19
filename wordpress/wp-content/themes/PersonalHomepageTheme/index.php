<?php get_header(); ?>

<?php include (TEMPLATEPATH . '/socialsidebar.php'); ?>

<div id="main-col">

	<p id="intro-paragraph">
		<span>Hi.</span> Welcome to the new digs. I was going to put my most recent blog entry right up here, but then I got to thinking that might be <em>confusing</em>. What if I wanted to blog about Sea Monkies one day? People stopping by might think this is just yet-another-site about Sea Monkies. It's not. It's actually about...
	</p>

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php the_ID(); ?>">
			
				<div class="datebox">
					<p class="day"><?php the_time('d') ?></p>
					<p class="month"><?php the_time('M') ?></p>
					<p class="year"><?php the_time('Y') ?></p>
				</div>
			
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				
				<p><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
				
				<?php the_content('Read the rest of this entry &raquo;'); ?>
				
				
				
			</div>

		<?php endwhile; ?>

	<?php else : ?>

		<h2>Not Found</h2>
		<p>Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>
	
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
