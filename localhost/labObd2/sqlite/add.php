<?php   
    require "sqlite.php";
    if($_POST['autopark-name']){
        $park = New Autopark();
        $park->addAutoparkType($_POST['autopark-name']);
    }
    header("Location: index.php");