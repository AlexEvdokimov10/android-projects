<?php

class Controller{

    private $data;
    private $action;
    private $protectedActions=['get-aquariums','edit-aquarium','add-aquarium','del-aquarium'];

    function __construct(){
        $this->action=$_GET['action'];
        $this->data=(array)json_decode(file_get_contents('php://input'),true);
    }
    function run(){
        $res=[];
        if(in_array($this->action, $this->protectedActions) && !Auth::checkToken($_GET['token'])){
            echo json_encode( ['error'=>'authentication failed']);
            return;
        }
        switch ($this->action){
            case 'login':
                $res=Auth::getUserToken($this->data);
                break;
            case 'get-aquariums':
                $res=Model::getAquariumList();
                break;
            case 'edit-aquarium':
                if(Model::editAquarium($this->data)) {
                    $res = ['update' => 'success'];
                }
                else{
                    $res=['error'=>'aquariums update error!'];
                }
                break;
            case 'add-aquarium':
                if(Model::addAquarium($this->data)){
                    $res = ['insert'=>'success'];
                }
                else
                {
                    $res=['error'=>'aquariums insert error !'];
                }
                break;
            case 'del-aquarium':
                if(Model::removeAquarium($this->data)) {
                    $res=['delete'=>'success'];
                }
                else
                {
                    $res=['error'=>'aquarium delete error !'];
                }
                break;
            case 'get-fishs':
                $res=Model::getFishs($_GET['aquarium']);
                break;
            case 'add-fish':
                if(Model::addFish($this->data)){
                    $res = ['insert'=>'success'];
                }
                else
                {
                    $res=['error'=>'fishs insert error !'];
                }
                break;
            case 'del-fish':
                if(Model::removeFish($this->data)) {
                    $res=['delete'=>'success'];
                }
                else
                {
                    $res=['error'=>'fish delete error !'];
                }
                break;
            case 'edit-fish':
                if(Model::editFish($this->data)) {
                    $res = ['update' => 'success'];
                }
                else{
                    $res=['error'=>'fish update error!'];
                }
                break;
            default:
                $res=['error'=>'this route is incorrect'];
                break;
        }
        echo json_encode($res);
    }

}