<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 * * @package WordPress
 * @subpackage Framework 2.0
 */
?>

<div class="gradient"></div>
		<div class="footer">
		
			<div class="footercontainer">
			
				<div class="footerbox">
					<h1>Treasure Island Marina</h1>
					
					<p class="large">Treasure Island Marina is Northwest Florida's premier on-the-water Storage, Parts and Service facility.</p>
					
					<p class="large">Come visit or give us a call today!</p>
					
					
					<p><span class="title">Treasure Island Marina</span><br />
					3605 Thomas Dr.<br />Panama City Beach, FL 32408<br />850.234.6533<br />
					<a href="<?php bloginfo('url'); ?>/">treasureislandmarina.net</a> | <a href="mailto:dschaler@timpcb.com">dschaler@timpcb.com</a></p>
				
				</div>
				
				<div class="footerbox">
					<h1>Weather Information</h1>
					
					<div class="footerLeft"><a href="http://www.windfinder.com/forecast/lower_grand_lagoon" target="_blank"><img src="http://www.windfinder.com/wind-cgi/windgraph_small.pl?STATIONSNR=us2473&UNIT_WIND=kts&UNIT_TEMPERATURE=f" border="0" /></a></div>
					
					<div class="footerLeft weatherbox">
					
					<script type="text/javascript" src="http://voap.weather.com/weather/oap/32408?template=GENXH&par=3000000007&unit=0&key=twciweatherwidget"></script>
					
					</div>
					
				</div>
			
			</div>
			
			<div class="clear"></div>
			
		</div>
	
	</div><!-- end wrap -->
	
	<!-- These scripts are used for the HTML5 Modernizer scripts -->
	<script>!window.jQuery && document.write(unescape('%3Cscript src="<?php bloginfo('template_url'); ?>/js/libs/jquery-1.4.4.min.js"%3E%3C/script%3E'))</script>
	<!--[if lt IE 7 ]>
	<script src="js/libs/dd_belatedpng.js"></script>
	<script> DD_belatedPNG.fix('img, .png_bg');</script>
	<![endif]-->
    
<?php
	/* ****** Always ****** have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
    
    
</body>
</html>