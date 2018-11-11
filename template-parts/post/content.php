<?php

/**
 * Template part for displaying posts
 *
 * @package 	Codexin
 * @subpackage 	Core
 * @since 		1.0
 */

// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'TEXT_DOMAIN' ) );

$length_switch   = codexin_get_option( 'cx_blog_title_excerpt_length' );
$title_length    = codexin_get_option( 'cx_title_length' );
$excerpt_length  = codexin_get_option( 'cx_excerpt_length' );
$read_more       = codexin_get_option( 'cx_blog_read_more' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-item' ); ?>>
	<div class="post-content-wrapper">
		<?php if( has_post_thumbnail() ) { ?>
			<div class="post-media">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'codexin-fr-rect-two' ); ?>
				</a>
			</div> <!-- end of post-media -->
		<?php } ?>

		<div class="post-content">
			<h2 class="post-title">
				<a href="<?php the_permalink(); ?>">
                    <?php
                    if( $length_switch ) {                            
                        // Limit the title characters
                        echo apply_filters( 'the_title', codexin_char_limit( $title_length, 'title' ) );
                    } else {
                        the_title();
                    }
                    ?>
				</a>
			</h2>
			<div class="post-meta">	
				<div class="post-author"><i class="fa fa-pen"></i> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a></div>
				<div class="post-cats"><i class="fa fa-tag"></i> <?php the_category( ', ' ); ?></div>
				<div class="post-time"><i class="fa fa-calendar"></i> <a href="<?php echo get_day_link( get_post_time( 'Y' ), get_post_time( 'm' ), get_post_time( 'j' ) );  ?>"><?php the_time( get_option( 'date_format' ) ); ?></a></div>
				<div class="post-comments"><i class="fa fa-comment"></i> <a href="<?php comments_link(); ?>"><?php comments_number( 'No Comments', 'One Comment', '% Comments' ); ?></a></div>
			</div>

			<div class="post-excerpt">
				<?php 
                if( $length_switch ) {
                    echo '<p>';
                        echo apply_filters( 'the_content', codexin_char_limit( $excerpt_length, 'excerpt' ) );
                    echo '</p>';
                } else {
                    the_excerpt();
                }
				?>
			</div>
		</div> <!-- end of post-content -->
		
		<div class="post-footer">
			<?php 
			if( ! is_single() ) { 
				if( $read_more ) {  ?>				
					<div class="read-more">
						<a href="<?php the_permalink(); ?>"><?php echo esc_html__( 'Read More', 'TEXT_DOMAIN' ); ?></a>
					</div>
				<?php 
				}
			} else{
		        if( has_tag() ) { ?>
		    		<div class="post-tag">
			 			<?php the_tags('Tags: &nbsp;',' ',''); ?>
		    		</div>
		        <?php 
		    	}
			}
			?>
		</div> <!-- end of post-footer -->
	 </div> <!-- end of post-content-wrapper -->
</article> <!-- end of #post-## -->