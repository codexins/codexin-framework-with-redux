<?php // Template Name: Page (Home Page) ?>
<?php get_header() ?>

<div id="content" class="section site-content">
	<div id="home">
			<div id="primary" class="site-main">
				<?php 
				if ( have_posts() ) : 
					while ( have_posts() ) : the_post();
						if ( !empty ( get_the_content() ) ) : ?>

						<div id="page-<?php the_ID(); ?>" <?php post_class(array('clearfix', 'page-entry-content')); ?>>
								<?php 
									the_content(); 


												// This section is for pagination purpose for a long large page that is seperated using nextpage tags
						            $args = array(
						                'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'codexin' ) . '</span>',
						                'after'       => '</div>',
						                'link_before' => '<span>',
						                'link_after'  => '</span>',
						                'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'codexin' ) . ' </span>%',
						                'separator'   => '<span class="screen-reader-text">, </span>',
						            );                 
						            wp_link_pages( $args );

								 ?>
						</div><!-- #post-## -->

						<?php
						else :
						endif;

					endwhile;
				else : 
					// No posts to display
				endif;
				?>
			</div> <!-- end of #primary -->
	</div> <!-- end of #home -->
</div><?php // #content ?>
<?php get_footer() ?>