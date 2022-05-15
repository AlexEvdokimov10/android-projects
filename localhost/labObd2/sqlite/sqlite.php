<?php
    class Autopark{
        private $bd;

        function __construct(){
            $this->bd = new SQLite3('AutoparkDB.db');
        }

        function getAutoparkType(){
            $res = array();
            $sql = 'select Kod, Name, Places from autopark';
            $ret = $this->bd->query($sql);
            while($row = $ret->fetchArray(SQLITE3_ASSOC)){
                $res[] = $row;
            }
            return $res;
        }

        function addAutoparkType($name){
            $sql = "insert into autopark(Kod, Name, Places) select max(Kod)+1, '" . $name . "'from autopark";
            $this->bd->exec($sql);
        }

        function removeAutoparkType($id){
            $sql = "delete from autopark where Kod = " . $id;
            $this->bd->exec($sql);
        }

        function editAutoparkType($id, $name){
            $sql = "update autopark set Name = '" . $name . "'where Kod = " . $id;
            $this->bd->exec($sql);
        }

        function getParkType($id){
            $sql = "select Name from autopark where Kod = " . $id;
            $ret = $this->bd->query($sql);
            if($row = $ret->fetchArray(SQLITE3_ASSOC)){
                return $row['Name'];
            }
            return '';
        }
    }