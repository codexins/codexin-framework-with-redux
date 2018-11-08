<?php get_header() ?>

<div id="content" class="section site-content">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<main id="primary" class="site-main">
		
					<?php if ( have_posts() ) : ?>
					<h1 class="search-title"><?php printf( __( 'Search Results for: %s', 'codexin' ), '<span>"' . get_search_query() . '"</span>' ); ?></h1>
					<?php while ( have_posts() ) : the_post() ?>

					<div id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>
						<?php if(has_post_thumbnail()): ?>
								<div class="image-featured">
										<?php the_post_thumbnail(); ?>
								</div>
						<?php endif; ?>
						
						<h2 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title()?></a></h2>
						<div class="post-meta">	
							<div class="post-author"><i class="fa fa-pencil"></i> <?php the_author(); ?></div>
							<div class="post-cats"><i class="fa fa-tag"></i><?php the_category( ', ' )?></div>
							<div class="post-time"><i class="fa fa-calendar"></i> <?php the_time(get_option('date_format')); ?></div>
							<div class="post-comments"><i class="fa fa-comment"></i><?php comments_number( 'No Comments', 'One Comment', '% Comments' )?></div>
						</div>
				
						<div class="post-excerpt"><?php the_excerpt() ?></div>

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

					<h2 class="search-title text-center"><?php _e( 'Nothing found for the search keyword "'. get_search_query() .'"', 'codexin' ); ?></h2>
					<p class="text-center">Please use the menu above to locate what you are searching for. Or you can try searching with another keyword below:</p>
					<?php get_search_form(); ?>

					<?php endif ?>

				</main> <!-- end of #primary -->

					<?php codexin_posts_navigation(); ?>
			</div><?php // .col-xs-12 ?>
	
		</div><?php // #content .container .row ?>
	
	</div><?php // #content .container ?>

</div><?php // #content ?>

<?php get_footer() ?>