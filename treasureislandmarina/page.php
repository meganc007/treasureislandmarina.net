<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 * * @package WordPress
 * @subpackage Framework 2.0
 */

get_header(); ?>

<? if(is_front_page()) { ?>


			<!-- Buckets -->
			
			<ul class="buckets">
			
				<li><a class="storage" href="<?php bloginfo('url'); ?>/boat-storage/">Boat Storage</a></li>
				<li><a class="service" href="<?php bloginfo('url'); ?>/service-and-parts/">Boat Service</a></li>
				<li><a class="charters" href="<?php bloginfo('url'); ?>/charters-tours-rentals/">Charters, Tours &amp; Rentals</a></li>
			
			</ul>
			
			<!-- / Buckets -->
			
			
			
			<h1 class="bigheading"><?php the_title(); ?></h1>
			
			
			
			<div id="featured">
			
			
			<?php
            	$slider_query = new WP_Query($query_string.'post_type=slides&posts_per_page=-1');
                if ($slider_query -> have_posts()) : while ($slider_query -> have_posts()) : $slider_query -> the_post(); 
            {?>
				
			<img src="<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'large', true); echo $image_url[0]; ?>" alt="<?php the_title(); ?>" />
		
			<? } ?>
		
			<?php endwhile; endif; ?>
			
			</div><!-- end featured -->
			<div class="clear"></div>
			
						<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			
			<div class="pagecontent">
				<?php the_content(); ?>			
			</div><!-- end pagecontent -->
			
			<?php endwhile; ?>

<? } else { ?>



<div class="pages">

<div class="pagecontent">
			
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
        <div class="clear"></div>
        <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'framework' ), 'after' => '</div>' ) ); ?>
        <?php edit_post_link( __( 'Edit', 'framework' ), '<span class="edit-link">', '</span>' ); ?>
    </article><!-- #post-## -->
			<?php endwhile; ?>
			</div><!-- end pagecontent -->
			
<? } ?>
			
			<?php get_sidebar(); ?>
			
			<? if(!is_front_page()) { ?><div class="vlinner"></div>
			
			</div><!-- end pages -->
			<? } ?>
			
			<ul class="featuredboxes">
			
				<li><a href="<?php bloginfo('url'); ?>/events-and-fishing/">Events <br />&amp; Fishing</a></li>
				<li><a href="<?php bloginfo('url'); ?>/photo-gallery/">Photo<br />Gallery</a></li>
				<li><a href="<?php bloginfo('url'); ?>/contact-us/">Contact<br>Us</a></li>
				<li><a href="<?php bloginfo('url'); ?>/special-offers/">Special<br />Offers</a></li>
				
			</ul>
			<div class="clear"></div>
		</div><!-- end container -->
		

<?php get_footer(); ?>
