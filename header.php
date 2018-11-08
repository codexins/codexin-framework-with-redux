<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<?php wp_head() ?>
</head>
<body <?php body_class(); ?>>
	<?php if( codexin_get_option('cx_page_loader') == true ) { ?>
	    <!-- Site Loader started-->
	    <div class="cx-pageloader">
	        <div class="cx-pageloader-inner"></div>
	    </div>
	    <!-- Site Loader Finished-->
    <?php } ?>


<div id="c-menu--slide-left" class="c-menu c-menu--slide-left">
    <button class="c-menu__close">&larr; Back</button><?php get_mobile_menu() ?>
</div>
<div id="c-mask" class="c-mask"></div>


<div id="whole" class="topbar-active whole-site-wrapper">
	<header class="header">
		<div class="header-top">
			<div class="container">
				<div class="row">

					<div class="col-sm-3">
						<div class="logo">
							<?php
					        $logo_type          = codexin_get_option( 'cx_logo_type' );
					        $text_logo          = codexin_get_option( 'cx_text_logo' ); 
					        $image_logo         = codexin_get_option( 'cx_image_logo' )['url'];

							 ?>
							<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>">
								<?php 
					            if( $logo_type == 2 ) {
					                echo '<img src="' . esc_url( $image_logo ) . '" alt="Logo">';
					            } else {
					                echo $text_logo;
					            }
								 ?>
							</a>
						</div>
						<div id="o-wrapper" class="mobile-nav o-wrapper">
							  <div class="primary-nav">
							    <button id="c-button--slide-left" class="primary-nav-details">Menu <i class="fa fa-navicon"></i></button>
							  </div>
						</div>
					</div>

					<div class="col-sm-9">
						<div id="nav" class="clearfix">						
							<?php get_main_menu() ?>
						</div>
					</div>
				</div>
			</div> <!-- end of .container -->
		</div>

		<?php if ( is_front_page() ):  
					get_header( 'home' ); 
			else:
					get_template_part( 'lib/page-titles/page', 'title' );
			endif;		
		?>

	</header> <!-- end of #header -->
