<?php

//
$dokui = array(
	'navigation' => array(
		'page' => null,
		'link' => null,
	)
	
);

//
function dokui_navigation_page() {
	global $dokui;
	
	if ($dokui['navigation']['page'] == null) { 
		$page = explode(':',tpl_pagetitle(NULL,true));
		array_pop($page);
		$page = count($page)>0 ? implode(':',$page).':navigation' : 'navigation';
		$dokui['navigation']['page'] = $page;
	}
	
	return $dokui['navigation']['page'];
}

//
function dokui_navigation_link() {
	global $dokui;
	
	if ($dokui['navigation']['page'] == null) { 
		$page = dokui_navigation_page();
		$link = tpl_pagelink($page);
		$dokui['navigation']['link'] = $link;
	}
	
	return $dokui['navigation']['link'];
}

function dokui_navigation_init() {
	
	
}
