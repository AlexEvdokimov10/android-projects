<?php 
    require "sqlite.php";
    if($_GET['Kod']){
        $park = New Autopark();
        $park->removeAutoparkType($_GET['Kod']);
    }
    header("Location: index.php");