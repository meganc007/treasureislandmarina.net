<?php
/**
 * The Template for displaying all single posts.
 * * @package WordPress
 * @subpackage Framework 2.0
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <section class="previous_next">
        <div class="alignleft"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'framework' ) . '</span> %title' ); ?></div>
        <div class="alignright"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'framework' ) . '</span>' ); ?></div>
        <div class="clear"></div>
    </section><!-- .previous_next top -->
    
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
        <h1><?php the_title(); ?></h1>
        
        <?php framework_posted_on(); ?>
        
		<?php the_content(); ?>
        
        <div class="clear"></div>
        
        <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'framework' ), 'after' => '</div>' ) ); ?>
            
    
		<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
        
			<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'framework_author_bio_avatar_size', 60 ) ); ?>
            
            <h2><?php printf( esc_attr__( 'About %s', 'framework' ), get_the_author() ); ?></h2>
            
            <?php the_author_meta( 'description' ); ?>
            
            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
                <?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'framework' ), get_the_author() ); ?>
            </a>
                    
        <?php endif; ?>
           
		<?php framework_posted_in(); ?>
        <?php edit_post_link( __( 'Edit', 'framework' ), '<span class="edit-link">', '</span>' ); ?>
        
    </article><!-- #post-## -->
    
    <div class="clear"></div>
    
    <?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
