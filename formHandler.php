<?php
	define('BASE','/jfulgar');
	include('application/core/keo.strife');
	//include('application/core/connect.strife');
	include('application/models/form.model');

	//disable error notice for undefined index
	error_reporting(E_ALL ^ E_NOTICE);

	//===initialize
	if(method_exists($jeff,'init')) $jeff->init();

	if(isset($_POST['login_submit']) &&
		isset($_POST['userID']) &&
		isset($_POST['pass'])){
		if($_POST['userID'] == 'jfulgar' && $_POST['pass'] == 'qwer1234'){
			$jeff->authentication->sessionIn('Jeffrey Ace Fulgar', 'jfulgar', 'yes');
			if($_POST['remember'] == 'yes'){
				$jeff->authentication->cookieIn('Jeffrey Ace Fulgar', 'jfulgar', 'yes', NULL);
			}
			header('Location: admin/');
		}
		
		

		
		
	}
	
?>