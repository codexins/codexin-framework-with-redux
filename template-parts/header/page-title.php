<?php
if(is_home()):
	codexin_get_page_title( ! empty( $blog_title ) ? $blog_title : __( 'Blog', 'codexin' ) );
elseif(is_archive()):
	$title = get_the_archive_title();
	codexin_get_page_title( $title );

elseif(is_search()):
	$title = 'Search results for "' . get_search_query().'"';
	codexin_get_page_title( $title );

elseif(is_404()):
	codexin_get_page_title( 'Page Not Found' );
else:
	codexin_get_page_title( the_title( '', '', FALSE ), get_the_ID() );
endif;
?>
