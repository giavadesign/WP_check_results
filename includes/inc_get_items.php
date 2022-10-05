<?php 
/*=============================================
posts
=============================================*/
$args = array(
	'post_type' => 'post',
	'orderby' => 'title',
	'order' => 'ASC',
  'numberposts' => -1,
);
$dk_hc_posts = get_posts( $args );
/* ===================  posts  =================*/

/*=============================================
prods
=============================================*/
$args = array(
	'post_type' => 'product',
	'orderby' => 'title',
  'order' => 'ASC',
  'numberposts' => -1,
);
$dk_hc_prods = get_posts( $args );
/* ===================  prods  =================*/
?>