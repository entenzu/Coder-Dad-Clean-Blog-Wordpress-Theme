<?php 

// Removes [...] in excerpts
function cdcb_new_excerpt_more($more) {
	return null;
}
add_filter('excerpt_more', 'cdcb_new_excerpt_more');