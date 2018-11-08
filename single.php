<?php get_header() ?>

<div id="content" class="section site-content">
	<div class="container">
		<div class="row">
			<div class="col-sm-9 col-md-8">
				<main id="primary" class="site-main">
		
					<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post() ?>

					<div id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>
						<?php if(has_post_thumbnail()): ?>
								<div class="image-featured">
										<?php the_post_thumbnail(); ?>
								</div>
						<?php endif; ?>

						<h2 class="post-title"><?php the_title()?></h2>
						<div class="post-meta">	
							<div class="post-author"><i class="fa fa-pencil"></i> <?php the_author(); ?></div>
							<div class="post-cats"><i class="fa fa-tag"></i><?php the_category( ', ' )?></div>
							<div class="post-time"><i class="fa fa-calendar"></i> <?php the_time(get_option('date_format')); ?></div>
							<div class="post-comments"><i class="fa fa-comment"></i><?php comments_number( 'No Comments', 'One Comment', '% Comments' )?></div>
						</div>
				
						<div class="post-excerpt">
							<?php the_content(); 

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
							
						</div> <!-- end of post-excerpt -->


		        <?php if(has_tag()): ?>
			    		<div class="post-tag">
	    			 			<?php the_tags('Tags: &nbsp;',' ',''); ?>
			    		</div>
		         <?php endif; ?>

							<?php do_action('after-single-post-content'); ?>
					</div> <!-- end of .post-item -->

					<?php endwhile ?>
					<?php else : ?>

					<?php // No posts to display ?>

					<?php endif ?>

				</main> <!-- end of #primary -->

				<?php codexin_post_navigation(); ?>

				<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				?>

			</div><?php // .col-sm-9 ?>

			<div class="col-sm-3 col-md-3 col-md-offset-1">
				<aside id="secondary" class="widget-area">
					<?php get_sidebar() ?>
				</aside>
			</div><?php // #col-sm-3 ?>
	
		</div><?php // #content .container .row ?>
	
	</div><?php // #content .container ?>

</div><?php // #content ?>

<?php get_footer() ?>