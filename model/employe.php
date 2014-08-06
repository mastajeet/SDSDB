<?php

class employe{

    protected $Info;
    protected $FieldType;
    protected $IDEmploye;
    protected $SQL;

    public function init(){
        $this->SQL = new SqlClass;
        $this->Info = array(
            'IDEmploye'=>0,
            'HName'=>'',
            'Ville'=>'Québec',
            'Status'=>'',
            'NAS'=>'',
            'Nom'=>'',
            'Prenom'=>'',
            'Session'=>'',
            'DateNaissance'=>0,
            'Adresse'=>'',
            'CodePostal'=>'',
            'Email'=>'',
            'TelM'=>'',
            'TelP'=>'',
            'TelA'=>'',
            'Cell'=>'',
            'Paget'=>'',
            'IDSecteur'=>'',
            'Ajustement'=>0,
            'Cessation'=>'',
            'Notes'=>'',
            'Raison'=>'',
            'SalaireB'=>'9.50',
            'SalaireS'=>'9.75',
            'SalaireA'=>'9.25',
            'DateEmbauche'=>0,
            'Engage'=>1,
            'EAssistant'=>'',
            'LastVisited'=>time()
    );
        $FieldType = array(
            'IDEmploye'=>0,
            'HName'=>'String',
            'Ville'=>'String',
            'Status'=>'String',
            'NAS'=>'String',
            'Nom'=>'String',
            'Prenom'=>'String',
            'Session'=>'String',
            'DateNaissance'=>'Integer',
            'Adresse'=>'String',
            'CodePostal'=>'String',
            'Email'=>'String',
            'TelM'=>'String',
            'TelP'=>'String',
            'TelA'=>'String',
            'Cell'=>'String',
            'Paget'=>'String',
            'IDSecteur'=>'Integer',
            'Ajustement'=>'Double',
            'Cessation'=>'Bool',
            'Notes'=>'String',
            'Raison'=>'String',
            'SalaireB'=>'Double',
            'SalaireS'=>'Double',
            'SalaireA'=>'Double',
            'DateEmbauche'=>'Integer',
            'Engage'=>'Bool',
            'EAssistant'=>'Bool',
            'LastVisited'=>'Integer'
        );

    }

    public function __construct($Args=NULL){
        $this->init();

        if(!is_null($Args)){
            if(is_numeric($Args)){
                #Arg is ID...
                $this->Info['IDEmploye'] = $Args;
                $Req = "SELECT * FROM employe WHERE IDEmploye=".$Args;
                $this->SQL->SelecT($Req);
                PushArrayIntoInfo("Employe",$this->Info,$this->SQL->FetchAssoc());
            }elseif(is_array($Args)){
                if(isset($Args['IDEmploye'])){
                    $this->Info['IDEmploye'] = $Args['IDEmploye'];
                }
                PushArrayIntoInfo("Employe",$this->Info,$Args);
            }
        }
    }

    public function save(){
        if(isset($IDEmploye) and $IDEmploye <>0 ){
            $Req = GenerateUpdateStatement("Employe",$this->Info,$this->FieldType);
            $this->SQL->Query($Req);
            return $this->Info['IDEmploye'];
        }else{
            $Req = GenerateInsertStatement("Employe",$this->Info,$this->FieldType);
            $this->SQL->Query($Req);
            return get_last_id("Employe");

        }
    }

    public function __get($Var){

        if (isset($this->Info[$Var])) {

            return $this->Info[$Var];
        } else {
            trigger_error($UNDEFINED_VAR);
        }
    }

}
?>