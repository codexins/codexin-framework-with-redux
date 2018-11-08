<?php

add_action('init', 'codexin_shortcodes');

function codexin_shortcodes() {

	$shortcodes = array(
		'print',
		'container',
		'row',
		'col',
		'spacer',
		'get_section',
		'sec_title',
		'icap',
		'h',
		// 'schema_address',
		'PRIVATE',
		'recent_posts',
		'get_posts',
		'img_series',
		'service_box',
		'lead_text',
		'img_popup',
		'blockquote',
		'divider',
		'img_divider',
		'p',
		'span',
		'year',
		'month',
		'day',
		'well',
		'newsletter',
		'button',
		'cta_image'
		
	);



	foreach ( $shortcodes as $shortcode ) :
		add_shortcode( $shortcode, $shortcode . '_shortcode' );
	endforeach;

}


/*
col
divider
blockquote
dropcap
lightboix
mini cta
responsive video
clear
tab
accord
highlight
map embed
citation
image
message
button
toggle
list styles

*/


/*  
* Syntax:
* [print] .. [/print]
* This Shortcode is used for admin purpose only
*
*/
function print_shortcode( $atts, $content = null) {
		extract(shortcode_atts(array(

		), $atts));

		$result = '';
		ob_start(); 
		?>
		
		 <pre class="codexin-admin-print"><?php echo $content; ?></pre>

		<?php
		$result .= ob_get_clean();
		return $result;
}


/*  
* Syntax:
* [container inside_class="flex-wrapper"] ... [container] 
*
*/
function container_shortcode( $atts, $content = null ) {
	   extract(shortcode_atts(array(
	   		'inside_class' => ''
	   ), $atts));

	   $result = '';
	   ob_start(); 
	   ?>
	   <div class="container">
	   		<div class="row">
	   			<?php if(!empty($inside_class)): ?>
	   				<div class="<?php echo $inside_class; ?>">
	   			<?php else: endif; ?>

	   				<?php echo do_shortcode($content); ?>
	   			<?php if(!empty($inside_class)): ?>	
	   				</div>
	   			<?php else: endif; ?>	
	   		</div>
	   </div>
		<?php
		$result .= ob_get_clean();
		return $result;
}

/*  
* Syntax:
* [row inside_class="flex-wrapper"] ... [row] 
*
*/
function row_shortcode ( $atts, $content = null ) { 
	   extract(shortcode_atts(array(
	   		'inside_class' => ''
	   ), $atts));

	   $result = '';
	   ob_start(); 
	   ?>
	   
   		<div class="row">
   			<?php if(!empty($inside_class)): ?>
   				<div class="<?php echo $inside_class; ?>">
   			<?php else: endif; ?>

   				<?php echo do_shortcode($content); ?>
   			<?php if(!empty($inside_class)): ?>	
   				</div>
   			<?php else: endif; ?>	
   		</div>
	   
		<?php
		$result .= ob_get_clean();
		return $result;
} // row_shortcode ( $atts, $content = '' )





/*  
* Syntax:
* [col sm="6" md="4"] ... [col] 
*
*/
function col_shortcode( $atts, $content = null) {
	   extract(shortcode_atts(array(
	   		'xs' => '',
	   		'sm' => '',
	   		'md' => '',
	   		'lg' => '',

	   ), $atts));
	   $result = '';
	   ob_start(); ?>
	   <div class="<?php if($xs): echo 'col-xs-'.$xs." "; endif; if($sm): echo 'col-sm-'.$sm." "; endif; if($md): echo 'col-md-'.$md." "; endif; if($lg): echo 'col-lg-'.$lg." "; endif;?> wow fadeIn">
	   		<?php echo do_shortcode($content); ?>
	   </div>

	   <?php
	   $result .= ob_get_clean();
	   return $result;
} 



/*  
* Syntax:
* [spacer size="50"]
*
*/
function spacer_shortcode ( $atts ) {
	$atts = shortcode_atts( array(
		'size' => '30',
	), $atts, 'spacer' );
	return '<div class="spacer" style="height:' . $atts['size'] . 'px; clear:both;overflow: hidden; width:100%;display: block"></div>';
} // codexin_spacer_shortcode ( $atts )




/*  
* Syntax:
* [get_section id="12"]
*
*/
function get_section_shortcode ( $page ) {
	$page = shortcode_atts( array( 
		'id' => FALSE 
	), $page, 'get_section' );
	if ( $page['id'] !== FALSE ) :
		$page_data = @get_page( $page['id'] );
		if ( $page_data ) :
			return do_shortcode( $page_data->post_content );
		else :
			return "PAGE DOES NOT EXIST";	
		endif;
	else :
		return "PAGE ID NOT SET";
	endif;
} // get_section_shortcode ( $page )




/*  
* Syntax:
* [sec_title type="1" align="left" mg_btm="50"] .. [/sec_title]
*
*/
function sec_title_shortcode( $atts, $content = null) {
		extract(shortcode_atts(array(
			'type' => '1',
			'align' => 'left',
			'mg_btm' => '30'
		), $atts));

		$result = '';
		ob_start(); 
		?>
		<?php if($type == 1): ?>
			<h2 class="codexin-sec-title-1" style="text-align: <?php echo $align; ?>; margin-bottom: <?php echo $mg_btm; ?>px"><?php echo $content; ?></h2>

		<?php elseif($type == 2): ?>
			<div class="codexin-title-wrapper <?php echo $align; ?>" style="margin-bottom: <?php echo $mg_btm; ?>px;"><h2 class="codexin-sec-title-2"><?php echo $content; ?></h2></div>

		<?php else: ?>
			<h2 class="codexin-primary-title" style="text-align: <?php echo $align; ?>; margin-bottom: <?php echo $mg_btm; ?>px"><?php echo $content; ?></h2>

		<?php endif; ?>	

		<?php
		$result .= ob_get_clean();
		return $result;
}



/*  
* Syntax:
* [icap color="#444"] .. [/icap]
*
*/

function icap_shortcode( $atts, $content = null ) {
	   extract(shortcode_atts(array(
	   		'color' => ''
	   ), $atts));

	   $result = '';
	   ob_start(); ?>
	   
		<span class="codexin-dropcap-square" <?php if(!empty($color)): echo 'style="color: '.$color.';"'; endif; ?>><?php echo do_shortcode($content); ?></span>

	   <?php $result .= ob_get_clean();
	   return $result;
}


/*  
* Syntax: ths will highlight a text with the specified color
* [h color=""] .. [/h]
*
*/

function h_shortcode( $atts, $content = null ) {
	   extract(shortcode_atts(array(
	   		'color' => '#c84c31'
	   ), $atts));

	   $result = '';
	   ob_start(); ?>
	   
		<span <?php if($color): echo 'style="color:'. $color .'"'; endif; ?>><?php echo $content; ?></span>

	   <?php $result .= ob_get_clean();
	   return $result;
}




function PRIVATE_shortcode ( $atts, $content = '' ) {
	# Returns absolutely nothing. 
	# This shortcode is used for internal comments.
	return; 
} // PRIVATE_shortcode ( $atts, $content = '' )





/*  
* Syntax:
* [recent_posts limit="" cat=""]
*
*/

function recent_posts_shortcode ( $atts, $content = null ) {
   extract(shortcode_atts(array(
		'limit' => '4',
		'cat'   => ''
   ), $atts)); 

   $result = '';
    $result.=  '<div class="row codexin-posts">';
   ?>

	<?php $q = new WP_Query(
	   array( 
	   		'orderby' => 'date', 
	   		'order'   => 'DEC',
	   		'showposts' => $limit, 
	   		'ignore_sticky_posts' => '1',
	   		'post_type' => 'post',
	   		'cat'  => $cat
	   		)
	 );

	 if($q->have_posts()):
	 	$i = 0;
	 	//$list .= '<ul class="related-posts">';
	 	while ($q->have_posts()): $q->the_post();
	 		
	 		ob_start();?>
		        <div class="col-sm-6 col-md-4 col-lg-3 wow fadeIn">
		            <div class="codexin-item-blog-post">
		                <div class="thumb">
		                    <a href="<?php the_permalink(); ?>" title="Single Image Post" style="background-image:url('<?php the_post_thumbnail_url(); ?>')"></a>
		                    <div class="date">
		                        <div class="bg"></div>
		                        <div class="text">
		                            <span class="d"><?php the_time('j'); ?></span>
		                            <span class="m"><?php the_time('M'); ?></span>
		                        </div>
		                    </div>
		                </div>
		                <!-- /.thumb -->
		                <div class="content">
		                    <h2 class="title">
		                            <a href="<?php the_permalink(); ?>"> <?php echo wp_trim_words( get_the_title(), 4, null ); ?></a>
		                        </h2>
		                    <div class="excerpt">
		                        
		                        <?php echo wp_trim_words( get_the_excerpt(), 15, null ); ?>
		                    </div>
		                    <a href="<?php the_permalink(); ?>" class="readmore" title="Read More">Read More &raquo;</a>
		                </div>
		                <!-- /.content -->
		            </div>
		            <!-- /.post -->
		        </div>

		        <?php $i++; if($i == 2): echo '<div class="clearfix visible-sm-block"></div>';  endif; ?>

	 		<?php $result .= ob_get_clean();
	 	endwhile;
	 	wp_reset_query();
	 endif;

	 return $result.= '</div>';

}


/*  
* Syntax:
* [get_posts include="" exclude=""]
*
*/

function get_posts_shortcode ( $atts, $content = null ) {
   extract(shortcode_atts(array(
		'include'   => '',
		'exclude'   => '',

   ), $atts)); 


   $result = '';
    $result.=  '<div class="row codexin-posts">';

    $cat_list = get_categories( '' );
    $cat_arr = array();
    $final_in_arr = array();
    $final_out_arr = array();
    foreach ($cat_list as $single_cat) {
    	 array_push($cat_arr, $single_cat->slug);
    }

    $given_in = explode(',', $include);
    $given_out = explode(',', $exclude);

    foreach ($given_in as $single) {
    	 $trimmed = trim($single);

    	if(in_array($trimmed, $cat_arr)):
    		$fslug = get_category_by_slug($trimmed);
    		$cat_id = $fslug->term_id;
    		array_push($final_in_arr, $cat_id);
    	endif;

    }

    foreach ($given_out as $single_out) {
    	 $trimmed_out = trim($single_out);

    	if(in_array($trimmed_out, $cat_arr)):
    		$fslug_out = get_category_by_slug($trimmed_out);
    		$cat_id_out = $fslug_out->term_id;
    		array_push($final_out_arr, $cat_id_out);
    	endif;

    }

   ?>

	<?php $q = new WP_Query(
	   array( 
	   		'orderby' => 'date', 
	   		'order'   => 'DEC',
	   		'ignore_sticky_posts' => '1',
	   		'post_type' => 'post',
	   		'category__in'  => $final_in_arr,
	   		'category__not_in'  => $final_out_arr,
	   		)
	 );




	 if($q->have_posts()):
	 	$i = 0;
	 	//$list .= '<ul class="related-posts">';
	 	while ($q->have_posts()): $q->the_post();
	 		
	 		ob_start();?>
		        <div class="col-sm-6 col-md-4 col-lg-3 wow fadeIn">
		            <div class="codexin-item-blog-post">
		                <div class="thumb">
		                    <a href="<?php the_permalink(); ?>" title="Single Image Post" style="background-image:url('<?php the_post_thumbnail_url(); ?>')"></a>
		                    <div class="date">
		                        <div class="bg"></div>
		                        <div class="text">
		                            <span class="d"><?php the_time('j'); ?></span>
		                            <span class="m"><?php the_time('M'); ?></span>
		                        </div>
		                    </div>
		                </div>
		                <!-- /.thumb -->
		                <div class="content">
		                    <h2 class="title">
		                            <a href="<?php the_permalink(); ?>"> <?php echo wp_trim_words( get_the_title(), 4, null ); ?></a>
		                        </h2>
		                    <div class="excerpt">
		                        
		                        <?php echo wp_trim_words( get_the_excerpt(), 15, null ); ?>
		                    </div>
		                    <a href="<?php the_permalink(); ?>" class="readmore" title="Read More">Read More &raquo;</a>
		                </div>
		                <!-- /.content -->
		            </div>
		            <!-- /.post -->
		        </div>

		        <?php $i++; if($i == 2): echo '<div class="clearfix visible-sm-block"></div>';  endif; ?>

	 		<?php $result .= ob_get_clean();
	 	endwhile;
	 	wp_reset_query();
	 endif;

	 return $result.= '</div>';

}





/*  
* Syntax:
* [img_series source1="http://placehold.it/800X533" source2="http://placehold.it/800X533" source3="http://placehold.it/800X533"] 
*
*/
function img_series_shortcode( $atts, $content = null ) {
	   extract(shortcode_atts(array(
	      'source1' => 'http://placehold.it/800X533',
	      'source2' => 'http://placehold.it/800X533',
	      'source3' => 'http://placehold.it/800X533',
	   ), $atts));

	   $result = '';
	   ob_start();
	   ?>
	
	<div class="image-series">
		<div class="row">
			<div class="col-sm-4">
				<a href="<?php echo $source1; ?> " class="mpopup"><img src="<?php echo $source1; ?> " class="img-responsive"></a>
			</div>

			<div class="col-sm-4">
				<a href="<?php echo $source2; ?> " class="mpopup"><img src="<?php echo $source2; ?> " class="img-responsive"></a>
			</div>

			<div class="col-sm-4">
				<a href="<?php echo $source3; ?> " class="mpopup"><img src="<?php echo $source3; ?> " class="img-responsive"></a>
			</div>
		</div>
	</div>

	<?php $result .= ob_get_clean();

	return $result;

}

/*  
* Syntax:
* [service_box img="http://placehold.it/600X400" link_target="#" link_text="Read More" service_title="Sample Title"]
*
*/

function service_box_shortcode( $atts, $content = null ) {
	   extract(shortcode_atts(array(
	   		'img'           => 'http://placehold.it/600X400',
	   		'link_target'   => '#',
	   		'link_text'     => 'Read More',
	   		'service_title' => 'Sample Title'
	   ), $atts));

	   $result = '';
	   ob_start(); ?>

		<div class="codexin-single-service-wrapper">
			<a href="<?php echo $link_target; ?>">
				<div class="codexin-image-thumb">
					<img src="<?php echo $img; ?>" alt="" class="img-responsive">
				</div>
				<div class="codexin-service-link"><?php echo $link_text; ?></div>
			</a>

			<div class="codexin-service-desc">
				<h3><?php echo $service_title; ?></h3>
			</div>
		</div>
		<?php
		$result .= ob_get_clean();

		return $result;

}



/*  
* Syntax:
* [lead_text cap="L"] orem ipsum dolor  [/lead_text]
*
*/
function lead_text_shortcode(  $atts, $content = null) {
	   extract(shortcode_atts(array(
	   			'cap' => '',
	   ), $atts));

	   $result = '';
	   ob_start(); ?>

		<p class="lead"><span class="codexin-dropcap-square"><?php echo $cap; ?></span><?php echo $content; ?></p>
		<?php
		$result .= ob_get_clean();
		return $result;

}



/*  
* Syntax:
* [img_popup source="" align="pull-right" alt="Sample Image" max_width="300"]
*
*/
function img_popup_shortcode( $atts, $content = null ) {
	   extract(shortcode_atts(array(
	   		'source' => 'http://placehold.it/300X200',
	   		'align'  => 'pull-left',
	   		'alt'    => 'Image',
	   		'max_width' => '300'
	   ), $atts));

	   $result = '';
	   ob_start(); ?>

		<a href="<?php echo $source; ?>" class="mpopup <?php echo ' '. $align .' '; ?> thumbnail-img" style="max-width: <?php echo $max_width; ?>px">
			<img src="<?php echo $source; ?>" class="img-responsive center-block" alt="<?php echo $alt; ?>">
		</a>
		<?php
		$result .= ob_get_clean();
		return $result;
}

/*  
* Syntax:
* [blockquote align="right" author="Sample Author"]
*
*/
function blockquote_shortcode( $atts, $content =null ) {
	   extract(shortcode_atts(array(
	   	 'author' => 'Sample Author',
	   	 'align'  => ''
	   ), $atts));

	   $result = '';
	   ob_start(); ?>

		<blockquote <?php if($align): echo 'class="blockquote-reverse"'; else: endif; ?>><?php echo do_shortcode($content); ?><?php if($author): ?><footer><?php echo $author; ?></footer><?php  endif; ?></blockquote>
		<?php
		$result .= ob_get_clean();
		return $result;
}




/*  
* Syntax:
* [divider width="100%" mg_top="15" mg_btm="15"]
*
*/
function divider_shortcode( $atts, $content = null ) {
	   extract(shortcode_atts(array(
	   		'mg_top' => '15',
	   		'mg_btm' => '15',
	   		'width' => '100%'
	   ), $atts));

	   $result = '';
	   ob_start(); ?>
	   <div class="codexin-divider" style="width:<?php  echo $width; ?>"><hr style="margin-top: <?php  echo $mg_top;?>px; margin-bottom: <?php echo $mg_btm; ?>px;" /></div>
	   <?php $result .= ob_get_clean();
	   return $result;
}



/*  
* Syntax:
* [p class=""] ... [/p]
*
*/
function p_shortcode( $atts, $content = null ) {
	   extract(shortcode_atts(array(
	   		'class' => ''
	   ), $atts));

	   $result = '';
	   ob_start(); ?>
	   
	   <p <?php if($class): echo 'class="'. $class .'"'; endif; ?>><?php echo do_shortcode($content); ?></p>


	   <?php $result .= ob_get_clean();
	   return $result;
}


/*  
* Syntax:
* [span class=""] ... [/span]
*
*/
function span_shortcode( $atts, $content = null ) {
	   extract(shortcode_atts(array(
	   		'class' => ''
	   ), $atts));

	   $result = '';
	   ob_start(); ?>
	   
	   <span <?php if($class): echo 'class="'. $class .'"'; endif; ?>><?php echo $content; ?></span>


	   <?php $result .= ob_get_clean();
	   return $result;
}


/*  
* Syntax:
* [year plus=""] or [year minus=""]
*
*/
function year_shortcode( $atts, $content = null ) {
	   extract(shortcode_atts(array(
	   		'plus' => '',
	   		'minus' => ''
	   ), $atts));

	   $result = '';
	   ob_start(); ?>
	   

		<?php 
		if($plus && !$minus): 
			echo date('Y')+$plus;
		elseif($minus && !$plus):
			echo date('Y')-$minus;
		else: 
			echo date('Y'); 
		endif; ?>

	   <?php $result .= ob_get_clean();
	   return $result;
}


/*  
* Syntax:
* [month plus=""] or [month minus=""]
*
*/
function month_shortcode( $atts, $content = null ) {
	   extract(shortcode_atts(array(
	   		'plus' => '',
	   		'minus' => ''
	   ), $atts));

	   $result = '';
	   ob_start(); ?>
	   
		<?php
		$month = date('n') ;
		$year = date('Y');
		$date = mktime( 0, 0, 0, $month, 1, $year );
		if($plus && !$minus): 
			echo strftime( '%B', strtotime( '+'. $plus .' month', $date ) );
		elseif($minus && !$plus):
			echo strftime( '%B', strtotime( '-'. $minus .' month', $date ) );
		else: 
			echo date('F');
		endif; ?>

	   <?php $result .= ob_get_clean();
	   return $result;
}



/*  
* Syntax:
* [day plus=""] or [day minus=""]
*
*/
function day_shortcode( $atts, $content = null ) {
	   extract(shortcode_atts(array(
	   		'plus' => '',
	   		'minus' => ''
	   ), $atts));

	   $result = '';
	   ob_start(); ?>
	   

		<?php 

		$month = date('n') ;
		$year = date('Y');
		$current_date = date('j');

		$date = mktime( 0, 0, 0, $month, $current_date, $year );
		if($plus && !$minus): 
			echo strftime( '%d', strtotime( '+'. $plus .' day', $date ) );
		elseif($minus && !$plus):
			echo strftime( '%d', strtotime( '-'. $minus .' day', $date ) );
		else: 
			echo date('d'); 
		endif; ?>

	   <?php $result .= ob_get_clean();
	   return $result;
}


/*  
* Syntax:
* [well bg_color="" color=""] .. [/well]
*
*/
function well_shortcode( $atts, $content = null ) {
	   extract(shortcode_atts(array(
	   		'bg_color' => '#f1f1f1',
	   		'color'  => ''
	   ), $atts));

	   $result = '';
	   ob_start(); ?>
	   
	  	<div class="codexin-emphasize-text" style="<?php if($bg_color): echo 'background-color:'. $bg_color.';'; endif; ?><?php if($color): echo 'color:'. $color.';'; endif; ?>"><?php echo do_shortcode($content); ?></div>
	   

	   <?php $result .= ob_get_clean();
	   return $result;
}


/*  
* Syntax:
* [newsletter title="" btn_text="" bg_color=""]
*
*/

function newsletter_shortcode( $atts, $content = null ) {
	   extract(shortcode_atts(array(
	   		'title'     => 'Newsletter',
	   		'btn_text'  => 'Subscribe',
	   		'bg_color'  => '#fafafa'

	   ), $atts));

	   $result = '';
	   ob_start();?>

		<div class="codexin-newsletter wow fadeIn" style="background-color: <?php  echo $bg_color; ?>">
			<!-- <div class="container"> -->
				<div class="row">
					<div class="flex-wrapper codexin-centered">
						<h2><?php echo $title; ?></h2>
						<form class="form-inline">
						  <div class="form-group">
						    <input type="email" class="form-control" id="email" placeholder="Your Email Address">
						  </div>
						  <div class="form-group">
						    <input type="submit" class="form-control primary-btn" id="submit" value="<?php echo $btn_text; ?>">
						  </div>
						</form>
					</div>
				</div>
			<!-- </div> -->
		</div>

		<?php
		$result .= ob_get_clean();
		return $result;
}

/*  
* Syntax:
* [button button_txt="" target="" href="" type=""]
*
*/

function button_shortcode( $atts, $content = null ) {
	   extract(shortcode_atts(array(
	   		'button_txt'  => 'Read More',
	   		'target'  => '_self',
	   		'href'   => '#',
	   		'type'   => '1',
	   		'class'  => ''

	   ), $atts));

	   $result = '';
	   ob_start(); 
	   ?>

		<?php if($type == 1): ?>
			<a class="codexin_btn codexin_centerSwipe primary-btn" href="<?php echo $href; ?>" target="<?php echo $target; ?>">
			  	<span><?php echo $button_txt; ?></span>
			</a>
		<?php elseif($type == 2): ?>	
			<a class="codexin_btn codexin_centerSwipe codexin_skewSwipe primary-btn" href="<?php echo $href; ?>" target="<?php echo $target; ?>">
			  <span><?php echo $button_txt; ?></span>
			</a>

		<?php elseif($type == 3): ?>	
			<div class="codexin_btn_3_wrapper primary-btn">
				<a class="codexin_btn_3"  href="<?php echo $href; ?>" target="<?php echo $target; ?>">
					<span><?php echo $button_txt; ?></span><em></em>
				</a>
			</div>

		<?php elseif($type == 4): ?>	
				<div class="<?php echo $class; ?>"><a class="codexin_btn_4 primary-btn"  href="<?php echo $href; ?>" target="<?php echo $target; ?>"><?php echo $button_txt; ?></a></div>

		<?php else: echo 'Button type not exists'; ?>	

		<?php endif; ?>	

		<?php
		$result .= ob_get_clean();
		return $result;
}


/*  
* Syntax:
* [cta_image img="" link=""]
*
*/
function cta_image_shortcode( $atts, $content = null ) {
	   extract(shortcode_atts(array(
	   		'img' => 'http://placehold.it/1000X170',
	   		'link' => '/contact/'
	   ), $atts));

	   $result = '';
	   ob_start(); ?>
	   
	   <a href="<?php echo $link; ?>"><img src="<?php echo $img; ?>" style="width:100%;clear:both;margin-bottom:30px;float: none;overflow: hidden"></a>
	   

	   <?php $result .= ob_get_clean();
	   return $result;
}


/*  
* Syntax:
* [img_divider mg_top="" mg_btm="" width=""]
*
*/
function img_divider_shortcode( $atts, $content = null ) {
	   extract(shortcode_atts(array(
	   		'mg_top' => '0px',
	   		'mg_btm' => '0px',
	   		'width' => '100%'
	   ), $atts));

	   $result = '';
	   ob_start(); ?>
	   <div class="codexin-img-divider" style="width:<?php  echo $width; ?>;margin-top: <?php  echo $mg_top;?>; margin-bottom: <?php echo $mg_btm; ?>">
	   		<img src="/wp-content/uploads/2017/04/image-divider.png" alt="Divider Image">
	   </div>
	   <?php $result .= ob_get_clean();
	   return $result;
}
