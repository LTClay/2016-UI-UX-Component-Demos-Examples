<?php get_header(); ?>
<link href="style.css" rel="stylesheet" type="text/css" />


<div id="container"> 

		<div id="container_wrapper">
		
		<div id="container_content">
		
		<h1>Featured Portfolio</h1>

	<p><?php include (ABSPATH . '/wp-content/plugins/featured-content-gallery/gallery.php'); ?></p>
	
		<h1>Graphic Design Highlights</h1>
		
		</div>		

<?php get_sidebar(); ?>
	</div><!--ends containter wrapper-->



</div> <!-- ends container -->


<?php get_footer(); ?>
	



</body>
</html>