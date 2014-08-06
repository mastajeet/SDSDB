<?php

function StringArrayToString($VarArray,$Separator=","){
    #This will return a "Separated" string made of items in the array
    $RetString = "";
    foreach ($VarArray as $v){
        $RetString .= $RetString .$v. $Separator;
    }
    return substr($RetString,0,-1);
  
}

function PushArrayIntoInfo($Class, &$Model, $Data){

    foreach($Data as $k=>$v){
    
        if (array_key_exists($k,$Model)){
           $Model[$k] = $v;
        }else{
            trigger_error("No Such item (".$k.") in model:".$Class); 
        }
    
    }
}

Function GenerateUpdateStatement($Class, $Model, $FieldType){
    
    $TableName = ucfirst($Class);
    $Statement = "Update ".$TableName." SET ";
    
    foreach($Model as $k=>$v){
        $Statement .= "`".addslashes($k)."`=";
                
        if(strtolower($FieldType[$k])=="string"){
            $Statement.= "'".addslashes(nl2br($v))."', ";
        }elseif(strtolower($FieldType[$k])=="bool"){
            if($v){
                $Statement.= "TRUE, ";
            }else{
                $Statement.= "FALSE, ";
            }
            
        }elseif(strtolower($FieldType[$k])=="integer"){
            $Statement.= intval($v).", ";
        }elseif(strtolower($FieldType[$k])=="double"){
            $Statement.= doubleval($v).", ";
        }else{
            trigger_error($UNKNOWN_DATATYPE);
        }
        
      
    }
    
    $Statement = substr($Statement, 0,-2)." WHERE ID".$TableName." = ".$Model['ID'.$TableName];
    return $Statement;
}

function GenerateInsertStatement($Class, $Model, $FieldType){
    $TableName = ucfirst($Class);
    $Statement = "INSERT INTO ".$TableName." (";
    
    $Field = "";
    $Values = "";
    
    foreach($Model as $k=>$v){

        $Field .= "`".addslashes($k)."`,";
        
        if(strtolower($FieldType[$k])=="string"){
            $Values.= "'".addslashes(nl2br($v))."', ";
        }elseif(strtolower($FieldType[$k])=="bool"){
            if($v){
                $Values.= "TRUE, ";
            }else{
                $Values.= "FALSE, ";
            }
            
        }elseif(strtolower($FieldType[$k])=="integer"){
            $Values.= intval($v).", ";
        }elseif(strtolower($FieldType[$k])=="double"){
            $Values.= doubleval($v).", ";
        }else{
            trigger_error($UNKNOWN_DATATYPE);
        }
    
    }
     
    $Statement .= substr($Field, 0,-1).") VALUES(".substr($Values,0,-2).")";
    return $Statement;
}


?>