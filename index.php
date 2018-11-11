<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package 	Codexin
 * @subpackage 	Templates
 * @since 		1.0
 */

// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'TEXT_DOMAIN' ) );

get_header() ?>

<!-- Start of Main Content Wrapper -->
<div id="content" class="main-content-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">
				<main id="primary" class="site-main">
					<div class="blog-area">
						<?php 
						if ( have_posts() ) { 

							// Start the loop
							while ( have_posts() ) {
								the_post();

								// Load the Post-Format-specific template for the content.
								get_template_part( 'template-parts/post/content', get_post_format() );
							}
						} else { 
							// No posts to display
						}
						?>
					</div> <!-- end of blog-area -->

					<?php

					// Rendering Pagination
					codexin_posts_nav();
					?>
				</main> <!-- end of #primary -->
			</div>

			<div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-3">
				<aside id="secondary" class="widget-area">
					<?php 
					// Get active assigned sidebar
					get_sidebar();
					?>
				</aside> <!-- end of #secondary -->
			</div>
		</div>
	</div> <!-- end of container -->
</div>
<!-- End of Main Content Wrapper -->

<?php get_footer() ?>