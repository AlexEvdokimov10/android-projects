<?php
	session_start();
	if(!$_SESSION['user']){
		header('location: /group_list/auth/login.php');
	}