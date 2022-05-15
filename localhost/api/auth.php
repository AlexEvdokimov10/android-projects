<?php

class Auth {
    public static function getUserToken($user){
        $res = (new DB())->getArrFromQuery(
            "select id from users where username='".$user['username']."'
            and passwd=md5('".$user['passwd']."')"
        );
        if(count($res)>0) {
            $id=$res[0]['id'];
            $token=substr(bin2hex(random_bytes(64)),0,100);
            $res2=(new DB())->runQuery("update users set token='$token' where id= $id");
             if($res2) {
                 return ['token'=>$token];
             }

        }
        return ['error'=>'Username or password is incorrect'];

    }
    public static function checkToken($token){
        $res=(new DB())->getArrFromQuery(
            "select id from users where  token='$token'"
        );
        if(count($res)>0){
            return true;
        }
        return false;
    }


}