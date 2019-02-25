
<?php
/**
 * The template for displaying 404 pages (Not Found).
 * * @package WordPress
 * @subpackage Framework 2.0
 */

get_header(); ?>


<div class="pages">

<div class="pagecontent">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<h1><?php _e( 'Not Found', 'framework' ); ?></h1>
	<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'framework' ); ?></p>
	<?php get_search_form(); ?>
	
	<script type="text/javascript">
		// focus on search field after it has loaded
		document.getElementById('s') && document.getElementById('s').focus();
	</script>
	 <div class="clear"></div>
	
				</article>
				
				</div>
				
				<?php get_sidebar(); ?>
							
				</div>


	

<ul class="featuredboxes">
				
					<li><a href="<?php bloginfo('url'); ?>/events-and-fishing/">Events <br />&amp; Fishing</a></li>
					<li><a href="<?php bloginfo('url'); ?>/photo-gallery/">Photo<br />Gallery</a></li>
					<li><a href="<?php bloginfo('url'); ?>/contact-us/">Contact<br>Us</a></li>
					<li><a href="<?php bloginfo('url'); ?>/special-offers/">Special<br />Offers</a></li>
					
				</ul>
				<div class="clear"></div>
				
				</div><!-- end container -->
			

<?php get_footer(); ?>
