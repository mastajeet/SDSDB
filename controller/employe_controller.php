<?php

class employe_controller{


public function GET($Arg=NULL){
   if(is_null($Arg)){
       $employe = new employe();
   }elseif(is_numeric($Arg)){
       $employe = new employe($Arg);
   }else{
       trigger_error($INVALID_ARGUMENT);
   }
   include_once("view/employe/employe_form.php");
}


}
