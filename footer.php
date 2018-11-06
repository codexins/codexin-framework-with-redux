	<footer id="footer">
		<div class="container">
			<div class="row">
				<div id="footer_left" class="col-sm-3">
					<?php if ( is_active_sidebar('codexin-footer-col-1') ) dynamic_sidebar('codexin-footer-col-1') ?>
				</div>
				<div id="footer_left_center" class="col-sm-3">
					<?php if ( is_active_sidebar('codexin-footer-col-2') ) dynamic_sidebar('codexin-footer-col-2') ?>
				</div>
				<div id="footer_right_center" class="col-sm-3">
					<?php if ( is_active_sidebar('codexin-footer-col-3') ) dynamic_sidebar('codexin-footer-col-3') ?>
				</div>

				<div id="footer_right" class="col-sm-3">
					<?php if ( is_active_sidebar('codexin-footer-col-4') ) dynamic_sidebar('codexin-footer-col-4') ?>
				</div>
			</div>
		</div>
	</footer> <!-- end of footer -->
	
	<div id="copyright">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<p class="copyright-legal">
						<?php echo !empty(codexin_get_option('cx_copyright')) ? codexin_get_option('cx_copyright') : '' ?>
					</p>
				</div>
			</div>
		</div>
	</div> <!-- end of copyright -->
	<?php 
	    $to_top = codexin_get_option( 'cx_totop' );
	    if( $to_top ){
	    	echo '<!-- Go to Top Button at right bottom of the window screen -->';
	        echo '<div id="toTop">';
		        echo '<i class="fa fa-chevron-up"></i>';
		    echo '</div>';
		    echo '<!-- Go to Top Button finished-->';
	    }
	 ?>
</div> <!-- end of #whole -->

<?php wp_footer() ?>

</body>
</html>