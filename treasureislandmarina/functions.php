<?php
/**
 * framework functions and definitions
 * * @package WordPress
 * @subpackage Framework 2.0
 */
 
 
 
 /* ........................... CUSTOM POST TYPES ................................ */
/* Below is an include to a default custom post type.
To turn it off, just remove the code or comment it out.*/
include(TEMPLATEPATH . '/library/post_types.php');





/* .............................. CUSTOM FIELDS FOR POSTS/PAGES .................. */
/* Below is an include to default custom fields for the blog posts.
To turn it off, just remove the code or comment it out.*/
//include(TEMPLATEPATH . '/library/custom_fields.php');
 
 
 
 


// This theme styles the visual editor with editor-style.css to match the theme style.
add_editor_style();




// This theme uses post thumbnails
if ( function_exists( 'add_theme_support' ) ) { // WP 2.9 or Greater
	
   add_theme_support( 'post-thumbnails' );
   set_post_thumbnail_size( 300, 250, true ); // Normal Post Thumbnail
   add_image_size( 'featured-homepage', 640, 310, true ); // Home Page Featured  Thumbnail
   add_image_size( 'tab-thumbnail', 60, 60, true ); // For Tabs
   add_image_size( 'archive-photo-thumbnail', 225, 150, true ); // Archive Thumbnail
   
   add_theme_support( 'automatic-feed-links' );
   
}


//................... CUSTOM NAV MENU ..................................................//
// If you'd like to add a custom navigation to the site, uncomment the block of code below:
// Go to http://codex.wordpress.org/Function_Reference/wp_nav_menu for questions about usage

// To register a custom nav so that you can update it from wordpress back office:
register_nav_menus( array(
	'primary' => __( 'Primary Navigation', 'framework' ),
) );
// To display custom nav in theme use: 
//*** <? wp_nav_menu( array( 'container_class' => 'your_navigation_container', 'theme_location' => 'primary' ) ); ? >



//.................. GIVE CUSTOM NAV MENU ABILITY FOR DESCRIPTIONS .................. //
// To apply this to a theme simply add an item to the wp_nav_menu array like so:
//<?php $walker = new My_Walker;
//		wp_nav_menu(array(
//			'menu_class' => 'navigation',
//			'theme_location' => 'primary-menu',
//			'walker' => $walker
//		));
//	? >
class My_Walker extends Walker_Nav_Menu
{
	function start_el(&$output, $item, $depth, $args) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = '';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= '<strong>' . $item->title . '</strong>';
		$item_output .= '<span>' . $item->description . '</span>';
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}


//.................. CUSTOM NAV MENU FALLBACK TO SHOW A HOME LINK ....................// 
 /* Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * To override this in a child theme, remove the filter and optionally add
 * your own function tied to the wp_page_menu_args filter hook.
 *
 * @since Twenty Ten 1.0
 */
function framework_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'framework_page_menu_args' );
	








/**
 * sets the_content length in posts of wordpress
 *
 TO use this, echo this on your page: <?php the_content_limit(390,"learn more"); ?>
 */
/*

function the_content_limit($max_char, $more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
$content = get_the_content($more_link_text, $stripteaser, $more_file);
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);

if (strlen($_GET['p']) > 0) {
echo $content;
}
else if ((strlen($content)>$max_char) && ($espacio = strpos($content, " ", $max_char ))) {
$content = substr($content, 0, $espacio);
$content = $content;
echo $content;
echo "<a class=".'learnMore'." href='";
the_permalink();
echo "'>...".$more_link_text."</a></p>";
}
else {
echo $content;
}
}

*/






/**
 * Sets the post excerpt length to 40 characters.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 *
 * @since Framework 1.0
 * @return int
 */
function framework_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'framework_excerpt_length' );






/**
 * Set Your Own Custom Excerpt Length
 * To set the amount of words that you want your excerpt to be simply use:
 * <?php echo excerpt(15); ?>
 */
 /*
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}
*/






/**
 * Returns a "Continue Reading" link for excerpts
 *
 * @since Framework 1.0
 * @return string "Continue Reading" link
 */
function framework_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'framework' ) . '</a>';
}







/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and framework_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @since Twenty Ten 1.0
 * @return string An ellipsis
 */
 /*
function framework_auto_excerpt_more( $more ) {
	return ' &hellip;' . framework_continue_reading_link();
}
add_filter( 'excerpt_more', 'framework_auto_excerpt_more' );
*/







/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 * @since Framework 1.0
 * @return string Excerpt with a pretty "Continue Reading" link
 */
/*
function framework_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= framework_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'framework_custom_excerpt_more' );
*/









//..................................................... ADD IS_CHILD FUNCTION
// This is a neat little function that allows for you to use interact with a
// page based on whether or not it is a child of a page.
// is_child()
function is_child($parent) {
	global $wp_query;
	if ($wp_query->post->post_parent == $parent) {
		$return = true;
	}
	else {
		$return = false;
	}
	return $return;
}











if ( ! function_exists( 'framework_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Framework 1.0
 */
function framework_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>', 'framework' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'Your comment is awaiting moderation.', 'framework' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'framework' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'framework' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'framework' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'framework'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;




/**
 * Register widgetized areas, including two sidebars widgets for this framework.
 *
 * @since Framework 1.0
 * @uses register_sidebar
 */

	
// Area 1, located at the top of the sidebar.
register_sidebar( array(
	'name' => __( 'Primary Widget Area', 'framework' ),
	'id' => 'primary-widget-area',
	'description' => __( 'The primary widget area', 'framework' ),
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );

// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
register_sidebar( array(
	'name' => __( 'Secondary Widget Area', 'framework' ),
	'id' => 'secondary-widget-area',
	'description' => __( 'The secondary widget area', 'framework' ),
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );




/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 *
 * To override this in a child theme, remove the filter and optionally add your own
 * function tied to the widgets_init action hook.
 *
 * @since Framework 1.0
 */
function framework_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'framework_remove_recent_comments_style' );






if ( ! function_exists( 'framework_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post—date/time and author.
 *
 * @since Twenty Ten 1.0
 */
function framework_posted_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'framework' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'framework' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;

if ( ! function_exists( 'framework_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 * @since Twenty Ten 1.0
 */
function framework_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'framework' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'framework' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'framework' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;



// TIM THUMB... HELPS RESIZE IMAGES USING PHP
/*
*Place this image code below in your code to display images from Tim Thumb script. Tim thumb will display the first image uploaded to a post.
Go Here for Documentation: http://www.darrenhoyt.com/2008/04/02/timthumb-php-script-released/

<img src="<?php bloginfo('template_directory'); ?>/tools/timthumb.php?src=<?php echo sp_get_image(); ?>&amp;h=70&amp;w=70&amp;zc=1">
*/



// Pull an image URL from the media gallery
function sp_get_image($num = 0) {
	global $post;
	$children = get_children(array(
		'post_parent' => $post->ID,
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'orderby' => 'menu_order',
		'order' => 'ASC'
	));

	$count = 0;
    foreach ((array)$children as $key => $value) {
        $images[$count] = $value;
        $count++;
    }
	if(isset($images[$num]))
		return wp_make_link_relative(wp_get_attachment_url($images[$num]->ID));
	else
		return false;
}



/********************* THESE LINES OF CODE ARE FOR THE .htaccess file

The first two lines of code are used to allow you to include .php files from outside of the /wordpress/ directory.

The next two lines of code are used for increasing the upload sizes for media to wordpress.

*** These lines below need to be added to the top of the .htaccess file that is in the root of the site.

php_value allow_url_fopen	on
php_value allow_url_include	on

php_value post_max_size 8M
php_value upload_max_filesize 8M




*/




?>