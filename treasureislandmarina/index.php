<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 * * @package WordPress
 * @subpackage Framework 2.0
 */

get_header(); ?>
		<div id="featured">
			
				<img src="<?php bloginfo ('template_url'); ?>/images/img.jpg" />
				<img src="<?php bloginfo ('template_url'); ?>/images/img2.jpg" />
			
			</div><!-- end featured -->
			<div class="clear"></div>
			<h1 class="bigheading">Welcome to Treasure Island Marina</h1>
			
			<div class="pagecontent">
				<p>Treasure Island Marina is Northwest Florida's largest boat dealer!  It has been the Gulf Coast's trusted family owned dealership for over 30 years!</p>
				<p>Treasure Island Marina is Northwest Florida's most complete marina.  We are one of the few "On The Water" Dealers.  We not only sell boats but we have both wet and dry storage facilities for over 400 boats and we also have the areas # 1 Service and Parts Department.  We have won the Mercury CSI's top award for the last three consecutive years.</p>
				<p>Treasure Island Marina is the region's exclusive dealer of Sea Ray Yachts, Boston Whaler unsinkable boats, Parker Boats, Southwind Boats and Grady-White Boats.</p>

<p>If you are looking for a new or top-quality used boat, you're in the right place! Treasure Island Marina has something to fit every dream from 13' runabouts to 68' yachts.</p>
			
			</div><!-- end pagecontent -->
			
			<?php get_sidebar(); ?>
			
			<ul class="featuredboxes">
			
				<li><a href="" title="">Boat<br>Storage</a></li>
				<li><a href="" title="">Service<br>& Parts</a></li>
				<li><a href="" title="">Events</a></li>
				<li><a href="" title="">Other</a></li>
				
			</ul>
			<div class="clear"></div>
		</div><!-- end container -->
<?php get_footer(); ?>