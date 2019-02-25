<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 * * @package WordPress
 * @subpackage Framework 2.0
 */
?>

<?php /* Display previous_next to next/previous pages when applicable */ ?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	<section class="previous_next">
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'framework' ) ); ?></div>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'framework' ) ); ?></div>
        <div class="clear"></div>
	</section><!-- #nav-above -->
<?php endif; ?>





<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
	<article id="post-0" class="post error404 not-found">
		<h1><?php _e( 'Not Found', 'framework' ); ?></h1>
        <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'framework' ); ?></p>
        <?php get_search_form(); ?>
	</article><!-- #post-0 -->
<?php endif; ?>






<?php
	/* Start the Loop.
	 *
	 * We sometimes check for whether we are on an
	 * archive page, a search page, etc., allowing for small differences
	 * in the loop on each template without actually duplicating
	 * the rest of the loop that is shared.
	 * You can add custom if statements that search for a particular category if you'd like.
	 *
	 * Without further ado, the loop:
	 */ ?>
     
     
<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'framework' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

			<?php framework_posted_on(); ?>

	<?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>
			
				<?php the_excerpt(); ?>
                
	<?php else : ?>
			
				<?php the_content( __( 'Continue reading &rarr;', 'framework' ) ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'framework' ), 'after' => '</div>' ) ); ?>
			
	<?php endif; ?>

			
				<?php if ( count( get_the_category() ) ) : ?>
					
						<?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'framework' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
					
				<?php endif; ?>
				<?php
					$tags_list = get_the_tag_list( '', ', ' );
					if ( $tags_list ):
				?>
					
						<?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'framework' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
					
				<?php endif; ?>
                <!-- Comments link -->
				<?php comments_popup_link( __( 'Leave a comment', 'framework' ), __( '1 Comment', 'framework' ), __( '% Comments', 'framework' ) ); ?>
                
				<?php edit_post_link( __( 'Edit', 'framework' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
		</article>
		<?php comments_template( '', true ); ?>

<?php endwhile; // End the loop. Whew. ?>

<?php /* Display previous_next to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<section class="previous_next">
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'framework' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'framework' ) ); ?></div>
                    <div class="clear"></div>
				</section><!-- #nav-below -->
<?php endif; ?>
