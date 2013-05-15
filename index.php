<?php
	define('BASE','/125');
	include('application/core/keo.strife');
	//include('application/core/connect.strife');
	include('application/models/main.model');
	


	/*route with base directory.
	 *Everything else to 404.php
	 */
	
	
	$strife_path = substr($_SERVER['REQUEST_URI'], strlen(BASE), strlen($_SERVER['REQUEST_URI']));
	$strife_request = explode('/',$strife_path);

	//===initialize
	if(method_exists($keo,'init')) $keo->init();

	//1st routing floor handling
	if($keo->getRouteFloor($strife_request) < 2){
		if($strife_request[1] == 'index.html' || 
		  	$strife_request[1] == '' || 
			$strife_request[1] == 'index.php' ||
			$strife_request[1] == 'home') 
		{
			$strife_title = 'Home';
			include('application/templates/home_head.template');
			include('application/views/home.view');
			include('application/templates/foot.template');
		/**/
		} else if ($strife_request[1] == 'about') {
			
				$strife_title = 'Strife || About';
				include('application/templates/head.template');
				include('application/views/about.view');
				include('application/templates/foot.template');
		} else if ($strife_request[1] == 'portfolio') {
			
				$strife_title = 'Strife || Portfolio';
				include('application/templates/head.template');
				include('application/views/portfolio.view');
				include('application/templates/foot.template');
		} else if ($strife_request[1] == 'contact') {
			
				$strife_title = 'Strife || Contact';
				include('application/templates/head.template');
				include('application/views/contact.view');
				include('application/templates/foot.template');
		} else if ($strife_request[1] == 'gallery') {
			
				$strife_title = 'Gallery';
				include('application/templates/head.template');
				include('application/views/gallery.view');
				include('application/templates/foot.template');	
		} else {
			$keo->cachePage('cache/404.html',function(){
				$strife_title = 'Strife || 404';
				include('application/templates/head.template');
				include('application/views/404.view');
				include('application/templates/foot.template');
			},60*10);
		}
	/*
	//2nd routing floor handling
	} else if ($keo->getRouteFloor($strife_request) == 2) {
		if($strife_request[1] == 'home' && $strife_request[2] == 'info'){
			//handling http://example.com/home/info/
		} else {
			$keo->cachePage('cache/404.html',function(){
				$strife_title = 'Strife || About';
				include('application/templates/head.template');
				include('application/views/404.view');
				include('application/templates/foot.template');
			},60*10);
		}
	*/
	} else {
		$keo->cachePage('cache/404.html',function(){
			$strife_title = 'Strife || 404';
			include('application/templates/head.template');
			include('application/views/404.view');
			include('application/templates/foot.template');
		},60*10);
	}

	

/*Global variable list:
 *$db_....
 *$strife_...
 *$keo
 */
?>