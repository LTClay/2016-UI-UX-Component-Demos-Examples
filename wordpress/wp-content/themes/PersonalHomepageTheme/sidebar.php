<div id="linksidebar">

	<div class="widget">
		<div class="inside">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/widget-header-csstricks.png" alt="CSS Tricks" />
			
			<?php
				require_once('../../../PersonalHomepageTheme/inc/simplepie.inc');
				
				// CHANGE THE FEED ADDRESS BELOW - THAT'S IT!
				$feed = new SimplePie('http://feeds.feedburner.com/CssTricks');
				
				$feed->handle_content_type();
				
				$total_articles = 5;
				
				for ($x = 0; $x < $feed->get_item_quantity($total_articles); $x++)
				{
					$first_items[] = $feed->get_item($x);
				}
			?>
			
			<ul>
			<?php
				foreach ($first_items as $item)
				{
					echo '<li><a href="' . $item->get_link() . '">' . $item->get_title() . '</a></li>';
				}
			?>
			</ul>
		</div>
	</div>
	
	<div class="widget flickr">
		<div class="inside">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/widget-header-myphotos.png" alt="My Photos" />
			
		</div>
		<div class="clear"></div>
	</div>
	
</div>

