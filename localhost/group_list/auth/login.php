<?php
	if($_POST){
		require('../model/autorun.php');
		$myModel=Model\Data::makeModel(Model\Data::FILE);
		if($user=$myModel->readUser($_POST['username'])){
			if($user->checkPassWord($_POST['password'])){
				session_start();
				$_SESSION['user']=$user->getUserName();
				header('Location: ../index.php');
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Аутентифікація</title>
	<link rel='stylesheet' type='text/css' href='../styles/login_style.css'/>
</head>
<body>
	<form method='post'>
		<p>
			<input align='center' type='text' name='username' placeholder='username'/>
		</p>
		<p>
			<input type='password' name='password' placeholder='password'/>
		</p>
		<p>
			<input type="submit" value="login"/>
		</p>
	</form>
</body>
</html>