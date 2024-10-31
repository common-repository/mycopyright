<?php

/*
Plugin Name: myCopyRight
Version:     0.5
Plugin URI:  http://blog.30c.org/1931.html
Description: 在单页文章页面的底部添加版权说明显示
Author:      Clove
Author URI:  http://blog.30c.org
*/

// for add to content ...
function myCopyRight($outer){
	if(!is_singular()){ return $outer; }

	global $post;
	$pName = $post->post_title;
	$pHref = get_permalink($post->ID);

	$outer .= "\n<!-- Begin myCopyRight http://30c.org-->\n";
	$outer .= '<link rel="stylesheet" href="'.WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)).'/myCopyRight.css?v=5">';
	$outer .= '<div id="myCopyRight">';
	$outer .= '<p>本文链接：<a href="'. $pHref .'" rel="bookmark" title="本文固定链接 '. $pHref .'">'. $pName.'</a></p>';  	
	$outer .= '<p>转载声明：本站文章若无特别说明，皆为原创，转载请注明来源：<a href="'.get_settings('home').'">'.get_bloginfo('name').'</a>，谢谢！^^</p>';
	$outer .= '<br clear="all"></div>';
	$outer .= "\n<!-- End of myCopyRight -->\n";
	return $outer;
}

add_filter('the_content', 'myCopyRight');

?>