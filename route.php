<?php

$MyController = new employe_controller();


if(isset($_GET['Ressource'])){

    if(isset($_GET['ID'])){
        $MyController->GET($_GET['ID']);
    }else{
        $MyController->GET();
    }
}elseif(isset($_POST['Ressource'])){

    if(!isset($_POST['Action'])){
        $MyController->POST($_POST);
    }elseif(isset($_POST['Action']) and $_POST['Action']="PUT"){
        $MyController->PUT($_POST);
    }elseif(isset($_POST['Action']) and $_POST['Action']="DELETE"){
        $MyController->DELETE($_POST);
    }else{
        trigger_error($INVALID_ACTION);
    }
}else{

    echo "Page d'accueil";
}








?>