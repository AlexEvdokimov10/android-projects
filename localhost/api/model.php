<?php
class Model{
    public static function getAquariumList(){
        return (new DB())->getArrFromQuery(
            "select id, numb, form, size, isBackLight 
            FROM aquariums order by numb"
        );
    }

    public static function editAquarium($aquarium)
    {
        return (new DB())->runQuery(
            "update aquariums set numb = '" . $aquarium['numb'] . "',
            form ='" . str_replace("'", "\'", $aquarium['form']) . "',
            size ='" .  $aquarium['size'] . "',
            isBackLight =" . $aquarium['isBackLight'] . "
            where id = " . $aquarium['id']);

    }
    public static function addAquarium($aquarium){
        return (new DB())->runQuery(
            "insert into aquariums(numb, form, size, isBackLight) values ('" . $aquarium['numb']."','" . str_replace("'", "\'", $aquarium['form'])."', '".$aquarium['size']."','" . $aquarium['isBackLight'] . "')"
        );
    }
    public static function removeAquarium($aquarium){
        return (new DB())->runQuery(
            "delete from aquariums where id =" . $aquarium['id']
        );
    }

    public static function getFishs($aquairumId){
        return (new DB())->getArrFromQuery(
            "SELECT id,nameOfType,amount,aquarium_id FROM `fishs` where aquarium_id=$aquairumId order by nameOfType"
        );
    }

    public static function editFish($fish)
    {
        return (new DB())->runQuery(
            "update `fishs` set `nameOfType`='" . str_replace("'", "\'", $fish['nameOfType']) . "',
            `amount` ='" .  $fish['amount'] . "',`aquarium_id` ='" .  $fish['aquarium_id'] . "' where `fishs`.`id` = " .$fish['id']);

    }
    public static function addFish($fish){
        return (new DB())->runQuery(
            "insert into fishs(nameOfType,amount,aquarium_id) values ('" . str_replace("'", "\'", $fish['nameOfType'])."', '" . $fish['amount']."','" . $fish['aquarium_id'] . "')"
        );
    }
    public static function removeFish($fish){
        return (new DB())->runQuery(
            "delete from fishs where id =" . $fish['id']
        );
    }


}