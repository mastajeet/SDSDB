<?php
$Employe = NULL;

if($_GET['Section']="Employe"){
    Switch ($_GET['SectionAction']){
        CASE "New":{
            $Employe = new employe();
            BREAK;
        }
        CASE "Edit":{
            $Employe = new employe($_GET['IDEmploye']);
            BREAK;
        }
    }
}
