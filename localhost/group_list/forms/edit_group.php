<?php
	include(__DIR__ . '/../auth/check_auth.php');

	require_once "../model/autorun.php";
	$myModel=Model\Data::makeModel(Model\Data::FILE);
	$myModel->setCurrentUser($_SESSION['user']);

	if($_POST){
	    if(!$myModel->writeGroup((new \Model\Group())
            ->setId($_GET['group'])
            ->setNumber($_POST['number'])
            ->setStarosta($_POST['starosta'])
            ->setDepartment($_POST['department'])
        )){
	        die($myModel->getError());
        } else {
	        header("Location: ../index.php?group=" . $_GET['group']);
        }
    }
	if(!$data['group']=$myModel->readGroup($_GET['group'])){
	    die($myModel->getError());
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Редагування групи</title>
	<link rel="stylesheet" type="text/css" href="../styles/edit_group_form_style.css"/>
</head>
<body>
	<a href="../index.php?group=<?php echo($_GET['group']);?>">На головну</a>
	<form name="edit_group" method='post'>
		<div><label for='number'>Номер групи : </label><input type='text' name='number' value="<?php echo $data['group']->getNumber(); ?>"/></div>
		<div><label for='starosta'>староста : </label><input type='text' name='starosta' value="<?php echo $data['group']->getStarosta(); ?>"/></div>
		<div><label for='department'>Факультет : </label><input type='text' name='department' value="<?php echo $data['group']->getDepartment(); ?>"/></div>
		<div><input type='submit' name='OK' value='Змінити'/></div>
	</form>
</body>
</html>