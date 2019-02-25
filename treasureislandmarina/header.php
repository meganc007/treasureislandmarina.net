<?php
/**
 * The Header for the theme
 *
 * Displays all of the <head> section and everything that 
 resides above your content in the code and will be repeating 
 for all pages of the site. There are exceptions that you can use if statements for
 * * @package WordPress
 * @subpackage Framework 2.0
 * @since Twenty Ten 1.0
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />


<!-- This is just a lot of code for applying custom titles based on the information for pages -->
<title>
<?php global $page, $paged; wp_title( '|', true, 'right' ); bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'framework' ), max( $paged, $page ) );
?>
</title>

<meta name="author" content="CYber SYtes, Inc.">
	
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!-- This is the default call to the styles.css file within this theme -->
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

<!-- ************    This is a great(ness) place to add your custom styles and scripts -->


<!-- include jQuery Library From Google Code -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo ('template_url'); ?>/js/jquery.easing.1.2.js"></script>
<script src="<?php bloginfo ('template_url'); ?>/js/jquery.orbit.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(window).load(function() {
				$('#featured').orbit({
					directionalNav: false,
     				captions: true, 
     				captionAnimation: 'fade',
     				bullets: true
				});
			});
		</script>

<!-- ************     end of great(ness) place -->


<!-- Modernizer script that allows HTML5 to display on all browsers -->
<script src="<?php bloginfo('template_url'); ?>/js/libs/modernizr-1.7.min.js"></script>

<?php
	/****************** DO NOT REMOVE **********************
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* ****  ALWAYS **** have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>



 

</head>

<!-- Be sure to keep the body_class(); function in the <body> tag below. It allows you
to customize each page of the site based on the class applied to that page -->
<body <?php body_class(); ?>>
<div class="wrap">
	
		<div class="container">
			
			<h1 class="logo"><a href="<?php echo home_url( '/' ); ?>" title="Treasure Island Marina"><img src="<?php bloginfo ('template_url'); ?>/images/logo.png" alt="Treasure Island Marina" /></a></h1>
			
			<p class="largefont">Northwest Florida&#8217;s Premier Marina, Storage and Service Facility</p>
			<div class="clear"></div>
			
			
			
			
			<ul class="navigation">
				
					
    <?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  
		        The menu assiged to the primary position is the one used.  
		        If none is assigned, the menu with the lowest ID is used.  */ 
		        wp_nav_menu( array( 'container_class' => 'navigation', 'theme_location' => 'primary' ) );
		    ?>
			</ul><!-- end navigation -->
			
			<div class="clear"></div>