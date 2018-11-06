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
										<?php the_post_thumbnail('single-post-image'); ?>
								</div>
						<?php endif; ?>

						<h2 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title()?></a></h2>
						<div class="post-meta">	
							<div class="post-author"><i class="fa fa-pencil"></i> <?php the_author(); ?></div>
							<div class="post-cats"><i class="fa fa-tag"></i><?php the_category( ', ' )?></div>
							<div class="post-time"><i class="fa fa-calendar"></i> <?php the_time(get_option('date_format')); ?></div>
							<div class="post-comments"><i class="fa fa-comment"></i><?php comments_number( 'No Comments', 'One Comment', '% Comments' )?></div>
						</div>
				
						<div class="post-excerpt"><?php the_excerpt(); ?></div>

						<?php if(!is_single()):  ?>
								<div class="read-more">
										<a href="<?php the_permalink(); ?>">Read More</a>
								</div>
						<?php endif; ?>

				        <?php if(has_tag()): ?>

					    		<div class="post-tag">
			    			 			<?php the_tags('Tags: &nbsp;',' ',''); ?>
					    		</div>
				         <?php endif; ?>
					</div> <!-- end of .post-item -->

					<?php endwhile ?>
					<?php else : ?>

					<?php // No posts to display ?>

					<?php endif ?>

				</main> <!-- end of #primary -->

					<?php  codexin_posts_navigation();	?>
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