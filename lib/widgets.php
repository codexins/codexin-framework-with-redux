<?php
	
add_action( 'widgets_init', 'codexin_sidebar_widgets_init' );

function codexin_sidebar_widgets_init () {
	
	register_sidebar( array(
		'name'				=> 'Sidebar (General)',
		'id'				=> 'codexin-sidebar-general',
		'description'		=> 'This sidebar will show everywhere the sidebar is enabled, both Posts and Pages.',	
	    'class'         	=> '',
		'before_widget' 	=> '<div id="%1$s" class="%2$s sidebar-widget clearfix">',
		'after_widget'  	=> '</div>',			
	) );

	register_sidebar( array(
		'name'				=> 'Sidebar (Pages)',
		'id'				=> 'codexin-sidebar-page',
		'description'		=> 'This sidebar will show on all Pages.',
	    'class'         	=> '',
		'before_widget' 	=> '<div id="%1$s" class="%2$s sidebar-widget clearfix">',
		'after_widget'  	=> '</div>',		
	) );
	
	register_sidebar( array(
		'name' 				=> 'Sidebar (Blog)',
		'id'				=> 'codexin-sidebar-blog',
		'description'		=> 'This sidebar will show on all blog Posts.', 
	    'class'         	=> '',
		'before_widget' 	=> '<div id="%1$s" class="%2$s sidebar-widget clearfix">',
		'after_widget'  	=> '</div>',		
	) );

} // codexin_sidebar_widgets_init ()
	



add_action( 'widgets_init', 'codexin_footer_widgets' );

function codexin_footer_widgets () {

	register_sidebar( array(
		'name'				=> 'Footer (Column 1)',
		'id'				=> 'codexin-footer-col-1',
    'class'         	=> '',
		'before_widget' 	=> '<div id="%1$s" class="%2$s sidebar-widget footer-widget clearfix">',
		'after_widget'  	=> '</div>',			
	) );

	register_sidebar( array(
		'name'				=> 'Footer (Column 2)',
		'id'				=> 'codexin-footer-col-2',
    'class'         	=> '',
		'before_widget' 	=> '<div id="%1$s" class="%2$s sidebar-widget footer-widget clearfix">',
		'after_widget'  	=> '</div>',			
	) );
	

	register_sidebar( array(
		'name'				=> 'Footer (Column 3)',
		'id'				=> 'codexin-footer-col-3',
    'class'         	=> '',
		'before_widget' 	=> '<div id="%1$s" class="%2$s sidebar-widget footer-widget clearfix">',
		'after_widget'  	=> '</div>',			
	) );

	register_sidebar( array(
		'name'				=> 'Footer (Column 4)',
		'id'				=> 'codexin-footer-col-4',
    'class'         	=> '',
		'before_widget' 	=> '<div id="%1$s" class="%2$s sidebar-widget footer-widget clearfix">',
		'after_widget'  	=> '</div>',			
	) );
		
} // codexin_footer_widgets ()	

?>