<?php
	include('application/core/keo.strife');
	//include('application/core/connect.strife');
	include('application/models/form.model');

	//disable error notice for undefined index
	error_reporting(E_ALL ^ E_NOTICE);

	if(isset($_POST['submit_home'])){
		if(!$keo->input->validate('required|alphanumeric',$_POST['name'])){
			echo $keo->input->getError();
		}
		$keo->input->validate('required|length|1',$_POST['checkbox']);
		//echo $keo->input->getError();
		echo $keo->input->filter('url|xss', $_POST['name']);
	}
	
?>