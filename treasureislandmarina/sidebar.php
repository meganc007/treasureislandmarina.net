<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 * * @package WordPress
 * @subpackage Framework 2.0
 */
?>
<? if(is_front_page()) { ?> 
		<div class="sidebar">
		
		
		
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) {return;}
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		
		<div class="fb-like-box" data-href="https://www.facebook.com/pages/Treasure-Island-Marina/229100603815384" data-width="350" data-show-faces="true" data-stream="true" data-header="true"></div>
		
<!-- BEGIN: Constant Contact Stylish Email Newsletter Form -->
<div align="center">
<div style="width:160px; background-color: #ffffff; padding: 10px;">
<form name="ccoptin" action="http://visitor.r20.constantcontact.com/d.jsp" target="_blank" method="post" style="margin-bottom:3;"><span style="background-color: #006699; float:right;margin-right:5;margin-top:3"><img src="https://imgssl.constantcontact.com/ui/images1/visitor/email1_trans.gif" alt="Email Newsletter icon, E-mail Newsletter icon, Email List icon, E-mail List icon" border="0"></span>
<font style="font-weight: bold; font-family:Arial; font-size:16px; color:#006699;">Sign up for our Email Newsletter</font>
<input type="text" name="ea" size="20" value="" style="font-family:Verdana,Geneva,Arial,Helvetica,sans-serif; font-size:10px; border:1px solid #999999;">
<input type="submit" name="go" value="GO" class="submit" style="font-family:Verdana,Arial,Helvetica,sans-serif; font-size:10px;">
<input type="hidden" name="llr" value="yf9qxciab">
<input type="hidden" name="m" value="1108193339576">
<input type="hidden" name="p" value="oi">
</form>
</div>
</div>
<!-- END: Constant Contact Stylish Email Newsletter Form -->
<!-- BEGIN: SafeSubscribe -->
<div align="center" style="padding-top:5px;">
<img src="https://imgssl.constantcontact.com/ui/images1/safe_subscribe_logo.gif" border="0" width="168" height="14" alt=""/>
</div>
<!-- END: SafeSubscribe -->
		
			</div><!-- end sidebar -->
			
			<div class="clear"></div>
<? } else { ?>

	<div class="secondside">
	
	<ul>

			<?php
				/* When we call the dynamic_sidebar() function, it'll spit out
				 * the widgets for that widget area. If it instead returns false,
				 * then the sidebar simply doesn't exist, so we'll hard-code in
				 * some default sidebar stuff just in case.
				 */
				if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
	
			<li>
				<?php get_search_form(); ?>
			</li>

			<li>
				<h3><?php _e( 'Archives', 'framework' ); ?></h3>
				<ul>
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
			</li>

			<li>
				<h3><?php _e( 'Meta', 'framework' ); ?></h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</li>
				



			<?php endif; // end primary widget area ?>
            
            
            
            
            <?php
			// A second sidebar for widgets, just because.
			if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>
            
                <li>
                    <ul>
                        <?php dynamic_sidebar( 'secondary-widget-area' ); ?>
                    </ul>
                </li>
            
            <?php endif; ?>
            
            
            	<?php if(is_page('services')) { ?>
				
				<div class="ngg-widget">
				
					<img src="<?php bloginfo('template_url'); ?>/images/forklift-operators.jpg" alt="Forklift operators" width="296" height="200" />
				
				</div>
				
				<? } ?>
            
			</ul>
	
	</div>
<div class="clear"></div>

<? } ?>