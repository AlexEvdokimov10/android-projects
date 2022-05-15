<?php   
    require 'sqlite.php';
    $park = New Autopark();
    if($_GET['Kod'] && $_POST['autopark-name']){
        $park->editAutoparkType($_GET['Kod'], $_POST['autopark-name']);
        header("Location: index.php");
    }
?>
<!DOCTYPE>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <form name='autopark-type-edit' method='post' action="edit.php?Kod=<?php echo $_GET['Kod'];?>">
            Тип автопарку <input type="text" name="autopark-name" value="<?php echo $park->getParkType($_GET['Kod']); ?>">
            <input type="submit" value='Змінити'>
        </form>
    </body>
</html>
