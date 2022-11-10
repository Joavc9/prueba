<?php
require_once dirname(__DIR__)."/model/model.php";
class Controller{
    /* Cargo la vista principal */
    public function loadView(){
        include "view/index.php";
    }
    /* Cargo la data del webservice */
    public function getDataWsToken(){
        $ws = new WebService();
        return $ws->getDataModel();
    }
}
if(isset($_GET['action']) == "ajax"){
    $controller = new Controller;
    echo $controller->getDataWsToken();
}