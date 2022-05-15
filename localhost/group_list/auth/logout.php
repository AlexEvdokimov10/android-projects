<?php
	session_start();
	unset($_SESSION['user']);
	header('location: /group_list/auth/login.php');