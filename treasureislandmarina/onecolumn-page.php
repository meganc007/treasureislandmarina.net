<?php
/**
 * Template Name: One column, no sidebar
 *
 * A custom page template without sidebar.
 * * @package WordPress
 * @subpackage Framework 2.0
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h1 class="entry-title"><?php the_title(); ?></h1>
            <?php the_content(); ?>
            <div class="clear"></div>
            <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
            <?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
    </article><!-- #post-## -->

    <?php comments_template( '', true ); ?>

<?php endwhile; ?>

<?php get_footer(); ?>
