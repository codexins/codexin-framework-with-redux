<form role="search" method="get" class="input-group" action="<?php echo home_url('/'); ?>">
	<input type="search" class="form-control" placeholder="Search..." value="<?php echo get_search_query(); ?>" name="s" title="Search" />
	<input type="submit" value="search">
</form>