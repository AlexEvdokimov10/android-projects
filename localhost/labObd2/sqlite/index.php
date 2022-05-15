<?php
    require 'sqlite.php';
?>
<!DOCTYPE html>
<html>
    <head>    
        <title>SQLite3</title>
        <meta charset = 'utf-8'>
        <link rel="stylesheet" type='text/css' href="style.css">
    </head>
    <body>
    <form action="add.php" name="add-autopark-name" method="post">
        Назва автопарку <input type="text" name="autopark-name">
        <input type="submit" value="Додати">
    </form>
    <table class="autopark-list">
        <thead>
            <tr>
                <th class="id">Kod</th>
                <th class="name">Name</th>
                <th class="places"></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $autopark = new Autopark();
            $autoparkTypes = $autopark->getAutoparkType();
            foreach($autoparkTypes as $autoparkType):
            ?>
            <tr>
                <td class="id"><?php echo $autoparkType['Kod']; ?></td>
                <td class="name"><?php echo $autoparkType['Name']; ?></td>
                <td class='places'><?php echo $autoparkType['Places']; ?></td>
                <td>
                    <a href="edit.php?Kod=<?php echo $autoparkType['Kod'];?>"> Змінити</a> | <a href="delete.php?Kod=<?php echo $autoparkType['Kod'];?>"> Видалити</a> 
                </td>
            </tr>
            <?php
               endforeach;
            ?>
        </tbody>
    </table>