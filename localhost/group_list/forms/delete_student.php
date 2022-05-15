<?php
	include(__DIR__ . '/../auth/check_auth.php');

	require_once "../model/autorun.php";
	$myModel=Model\Data::makeModel(Model\data::FILE);
	$myModel->setCurrentUser($_SESSION['user']);

	$student=(new \Model\Student())->setId($_GET['file'])->setGroupId($_GET['group']);
	if(!$myModel->removeStudent($student)){
	    die($myModel->getError());
    } else {
	    header("location: ../index.php?group=" . $_GET['group']);
    }