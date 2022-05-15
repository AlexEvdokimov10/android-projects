<?php
include(__DIR__ . '/../auth/check_auth.php');

require_once '../model/autorun.php';
$myModel = Model\Data::makeModel(Model\Data::FILE);
$myModel->setCurrentUser($_SESSION['user']);

if (!$myModel->addGroup()) {
    die($myModel->getError());
} else {
    header("Location: ../index.php?group=" . $newGroupName);
}
/*
if(!CheckRight('group','create')){
    die("Ви не маєте права на виконання цієї операції ! ");
}
$nameTpl='/^group_\d\d\z/';
$path=__DIR__.'/../data';
$conts=scandir($path);
$i=0;
foreach($conts as $node){
    if(preg_match($nameTpl,$node)){
        $last_group=$node;
    }
}
$group_index=(String)(((int)substr($last_group,-1,2))+1);
if(strlen($group_index)==1){
    $group_index='0'.$group_index;
}
$newGroupName='group_'.$group_index;
mkdir(__DIR__.'/../data/'.$newGroupName);
$f=fopen(__DIR__.'/../data/'.$newGroupName.'/group.txt','w');
fwrite($f, 'New; ; "');
fclose($f);
header('location:../index.php?group='.$newGroupName);*/