<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	
	<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
	
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<!--[if IE 6]>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/style-ie6.css" />
	<![endif]-->


	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<script src="http://css-tricks.com/js/jquery-1.2.6.min.js" type="text/javascript"></script>
	
	<script type="text/javascript">
		$(function(){
		
			$.getJSON('http://twitter.com/status/user_timeline/chriscoyier.json?count=1&callback=?', function(data){
				$.each(data, function(index, item){
					$('.twitter .inside').append('<div class="tweet"><p>' + item.text + '</p></div>');
				});
			});
			
			$.getJSON("http://api.flickr.com/services/feeds/photos_public.gne?ids=52723107@N00&lang=en-us&format=json&jsoncallback=?", function(data){
			  $.each(data.items, function(index, item){
				$("<img/>").attr("src", item.media.m).addClass("thumb").appendTo(".flickr .inside").wrap("<a href='" + item.link + "'></a>").wrap("<div class='flickr-thumb' />");
			  });
			});
			
		});
	</script>

	<?php wp_head(); ?>
</head>

<?php
	$page = $_SERVER['REQUEST_URI'];
	$page = str_replace("/","",$page);
	$page = str_replace(".php","",$page);
	$page = $page ? $page : 'default'
?>

<body id="<?php echo $page ?>">

	<div id="page-wrap">
			
		<div id="top-bar">

			<h1 id="logo"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
		
			<p><?php bloginfo('description'); ?></p>
			
			<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		
			<div class="clear"></div>
		</div>
		
		<div id="menu-bar">
				
			<ul id="main-nav">
				<li class="home"><a href="/">Home</a></li>
				<li class="about"><a href="/about/">About</a></li>
				<li class="contact"><a href="/contact/">Contact</a></li>
			</ul>
			
			<ul id="extra-nav">
				<li class="portfolio"><a href="/portfolio/">Portfolio</a></li>
				<li class="resume"><a href="/resume/">Resume</a></li>
			</ul>
			
			<div class="clear"></div>
		
		</div>