<?php
	define('BASE','/125');
	include('application/core/keo.strife');
	include('application/core/connect.strife');
	include('application/models/main.model');
	
	//default title
	$strife_title = 'Jfulgar Portfolio';

	/*route with base directory.
	 *Everything else to 404.php
	 */
	
	
	$strife_path = substr($_SERVER['REQUEST_URI'], strlen(BASE), strlen($_SERVER['REQUEST_URI']));
	$strife_request = explode('/',$strife_path);

	//===initialize
	if(method_exists($jeff,'init')) $jeff->init();

	//1st routing floor handling
	if($jeff->getRouteFloor($strife_request) < 2){
		if($strife_request[1] == 'index.html' || 
		  	$strife_request[1] == '' || 
			$strife_request[1] == 'index.php' ||
			$strife_request[1] == 'home') 
		{
			$jeff->cachePage('cache/home.html',function(){
				$strife_title = 'Home';
				include('application/templates/home_head.template');
				include('application/views/home.view');
				include('application/templates/foot.template');
			},60*30);
		/**/
		} else if ($strife_request[1] == 'about') {
			$jeff->cachePage('cache/about.html',function(){
				$strife_title = 'Strife || About';
				include('application/templates/head.template');
				include('application/views/about.view');
				include('application/templates/foot.template');
			},60*30);
		} else if ($strife_request[1] == 'portfolio') {
			$jeff->cachePage('cache/portfolio.html',function(){
				global $jeff;
				$posts = $jeff->getAllPost();
				$strife_title = 'Strife || Portfolio';
				include('application/templates/head.template');
				include('application/views/portfolio.view');
				include('application/templates/foot.template');
			},60*30);
		} else if ($strife_request[1] == 'contact') {
			$jeff->cachePage('cache/contact.html',function(){
				$strife_title = 'Strife || Contact';
				include('application/templates/head.template');
				include('application/views/contact.view');
				include('application/templates/foot.template');
			},60*30);
		} else if ($strife_request[1] == 'gallery') {
			$jeff->cachePage('cache/gallery.html',function(){
				$strife_title = 'Gallery';
				include('application/templates/head.template');
				include('application/views/gallery.view');
				include('application/templates/foot.template');	
			},60*30);
		} else {
			$jeff->cachePage('cache/404.html',function(){
				$strife_title = 'Strife || 404';
				include('application/templates/head.template');
				include('application/views/404.view');
				include('application/templates/foot.template');
			},60*30);
		}
	
	//2nd routing floor handling
	} else if ($jeff->getRouteFloor($strife_request) == 2) {
		if($strife_request[1] == 'portfolio' && 
			is_numeric($strife_request[2]) &&
			$strife_request[2] <= $jeff->countPost()){
			//handling http://example.com/home/info/
			$post = $jeff->getPost(intval($strife_request[2]));
			if (!$post) {
				$jeff->cachePage('cache/404.html',function(){
					$strife_title = 'Strife || About';
					include('application/templates/head.template');
					include('application/views/404.view');
					include('application/templates/foot.template');
				},60*30);
			} else {
				$strife_title = 'Case Study - '.$post['postTitle'];
				include('application/templates/head.template');
				include('application/views/posts.view');
				include('application/templates/foot.template');
			}
		} else {
			$jeff->cachePage('cache/404.html',function(){
				$strife_title = 'Strife || About';
				include('application/templates/head.template');
				include('application/views/404.view');
				include('application/templates/foot.template');
			},60*30);
		}
	
	} else {
		$jeff->cachePage('cache/404.html',function(){
			$strife_title = 'Strife || 404';
			include('application/templates/head.template');
			include('application/views/404.view');
			include('application/templates/foot.template');
		},60*30);
	}

	

/*Global variable list:
 *$db_....
 *$strife_...
 *$jeff
 */
?>