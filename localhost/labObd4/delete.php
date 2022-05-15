<?php
require 'model.php';
if($_GET['code']){
	$db=new CarDB();
	$db->removeCar(new Car($_GET['code']));
}
header("Location: index.php");