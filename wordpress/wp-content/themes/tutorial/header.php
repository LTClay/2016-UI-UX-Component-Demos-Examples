<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head profile="http://gmpg.org/xfn/11">
<style type="text/css">
<!--
.style1 {font-size: 9px}
-->
</style>
<head profile="http://gmpg.org/xfn/11">

	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<link rel='archives' title='May 2009' href='http://leonardclay.com/wordpress/2009/05' />
	<link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://leonardclay.com/wordpress/xmlrpc.php?rsd" />
	<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://leonardclay.com/wordpress/wp-includes/wlwmanifest.xml" /> 

	<!--<script type='text/javascript' src='http://leonardclay.com/wordpress/wp-includes/js/jquery/jquery.js?ver=1.2.6'></script>
	<script type='text/javascript' src='http://leonardclay.com/wordpress/wp-includes/js/jquery/jquery.form.js?ver=2.02'></script>
	<script type='text/javascript' src='http://leonardclay.com/wordpress/wp-content/plugins/lightbox-gallery/js/jquery.dimensions.js?ver=2.7.1'></script>
	<script type='text/javascript' src='http://leonardclay.com/wordpress/wp-content/plugins/lightbox-gallery/js/jquery.bgiframe.js?ver=2.7.1'></script>
	<script type='text/javascript' src='http://leonardclay.com/wordpress/wp-content/plugins/lightbox-gallery/js/jquery.lightbox.js?ver=2.7.1'></script>
	<script type='text/javascript' src='http://leonardclay.com/wordpress/wp-content/plugins/lightbox-gallery/js/jquery.tooltip.js?ver=2.7.1'></script>
	<script type='text/javascript' src='http://leonardclay.com/wordpress/wp-content/plugins/lightbox-gallery/lightbox-gallery.js?ver=2.7.1'></script>-->
	
	<!-- begin gallery scripts -->
    <link rel="stylesheet" href="http://leonardclay.com/wordpress/wp-content/plugins/featured-content-gallery/css/jd.gallery.css.php" type="text/css" media="screen" charset="utf-8"/>

	<link rel="stylesheet" href="http://leonardclay.com/wordpress/wp-content/plugins/featured-content-gallery/css/jd.gallery.css" type="text/css" media="screen" charset="utf-8"/>
	<!--<script type="text/javascript" src="http://leonardclay.com/wordpress/wp-content/plugins/featured-content-gallery/scripts/mootools.v1.11.js"></script>
	<script type="text/javascript" src="http://leonardclay.com/wordpress/wp-content/plugins/featured-content-gallery/scripts/jd.gallery.js.php"></script>
	<script type="text/javascript" src="http://leonardclay.com/wordpress/wp-content/plugins/featured-content-gallery/scripts/jd.gallery.transitions.js"></script>-->
	<!-- end gallery scripts -->
<link rel="stylesheet" type="text/css" href="http://leonardclay.com/wordpress/wp-content/plugins/lightbox-gallery/lightbox-gallery.css" />
<link rel="stylesheet" type="text/css" href="http://leonardclay.com/wordpress/wp-content/plugins/lightbox-gallery/js/jquery.lightbox.css" />
<link rel="stylesheet" type="text/css" href="http://leonardclay.com/wordpress/wp-content/plugins/lightbox-gallery/js/jquery.tooltip.css" />
    <link href="style.css" rel="stylesheet" type="text/css" />

	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>	
	
</head>
<body>
	<div id="main">
	<!-- start topbar code -->
		<div id="topbar">
				<div id="topbarwrapper">
						<div id="topbarleft"><?php echo date('l, F jS, Y') ?></div>
						<div id="topbarright"><?php wp_loginout(); ?>&nbsp; <?php wp_meta(); ?></div>
				</div>
		</div>
		
		<!-- start header code -->
		
		<div id="header">
				<div id="headerwrapper">
						<a href="http://leonardclay.com/wordpress/"><div id="header_logo"></div></a>
				</div>
		</div>
		
		<!-- start topnavbar code -->
		
		<div id="navbar">
				<div id="navbarwrapper">
						<div id="navbarleft" ><div id="navmenu"><ul><?php wp_list_pages('title_li='); ?></ul>  </div></div>
						<div id="navbarright"><?php include(TEMPLATEPATH . '/searchform.php'); ?></div>
				</div>
		</div>
		
		
		
		
				
