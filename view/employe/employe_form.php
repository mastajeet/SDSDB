<?PHP
$MainOutput = new html();
$MainOutput->addform('Ajouter / Modifier un employé');
$MainOutput->inputhidden_env('Ressource','employe');
if($employe->$IDEmploye<>NULL){
    $MainOutput->inputhidden_env('method','put');
}else{
    $MainOutput->inputhidden_env('method','post');
}

$MainOutput->addlink('index.php?Section=Employe_Report&IDEmploye='.$employe->IDEmploye.'&ToPrint=TRUE','<img src=b_sheet.png border=0>');
$MainOutput->addlink('index.php?Section=Employe_Horshift&IDEmploye='.$employe->IDEmploye,'<img src=b_fact.png border=0>');
$MainOutput->addlink('index.php?Section=Display_AskedRemplacement&IDEmploye='.$employe->IDEmploye,'<img src=b_del.png border=0>');

$MainOutput->inputtext('IDEmploye','Numéro d\'employé','3',$employe->IDEmploye);


$MainOutput->OpenRow();
$MainOutput->OpenCol('100%',2);
	$MainOutput->addtexte('----------Personnel------------------------------','Titre');
$MainOutput->CloseCol();
$MainOutput->CloseRow();

$MainOutput->inputtext('Nom','Nom','28',$employe->Nom);
$MainOutput->inputtext('Prenom','Prénom','28',$employe->Prenom);
$MainOutput->inputtext('HName','Nom Horaire','28',$employe->HName);
$MainOutput->inputtime('DateNaissance','Date de naissance',$employe->DateNaissance,array('Date'=>TRUE,'Time'=>FALSE));
$MainOutput->inputtext('NAS','Numéro d\assurance sociale','9',$employe->NAS);
$MainOutput->textarea('Notes','Notes','25','2',$employe->Notes);


$MainOutput->OpenRow();
$MainOutput->OpenCol('100%',2);
	$MainOutput->addtexte('----------Contact----------------------------------------','Titre');
$MainOutput->CloseCol();
$MainOutput->CloseRow();

$MainOutput->inputtext('Adresse','Adresse','28',$employe->Adresse);
#$Req = "SELECT IDSecteur, Nom FROM secteur ORDER BY Nom ASC";
#$MainOutput->inputselect('IDSecteur',$Req,$employe->IDSecteur,'Secteur');
$MainOutput->inputtext('Ville','Ville','28',$employe->Ville);
$MainOutput->inputtext('CodePostal','Code Postal','7',$employe->CodePostal);
$MainOutput->inputtext('Email','Courriel','28',$employe->Email);
$MainOutput->inputphone('TelP','Tél. Principal',$employe->TelP);
$MainOutput->inputphone('TelA','Tél. Autre',$employe->TelA);
$MainOutput->inputphone('Cell','Cellulaire',$employe->Cell);
$MainOutput->inputphone('Paget','Paget',$employe->Paget);


$MainOutput->OpenRow();
$MainOutput->OpenCol('100%',2);
	$MainOutput->addtexte('----------Compagnie----------------------------------------','Titre');
$MainOutput->CloseCol();
$MainOutput->CloseRow();

$MainOutput->inputtime('DateEmbauche','Date d\'embauche',$employe->DateEmbauche,array('Date'=>TRUE,'Time'=>FALSE));
$Status = array('Temps plein'=>'Temps plein','Secondaire'=>'Secondaire','CÉGEP'=>'CÉGEP','Université'=>'Université','Bureau'=>'Bureau');
  #  $Session = get_saison_list();
  #  $Saison = array();
  #  foreach($Session as $v){
  #      $Saison[$v]=$v;
  #  }
#$MainOutput->inputselect('Session',$Saison,$employe->Session,'Session');
#$MainOutput->inputselect('Status',$Status,$employe->Status,'Status');
$MainOutput->inputselect('Emploi',array('1'=>'Assistant','0'=>'Sauveteur'),$employe->EAssistant);
$MainOutput->inputtext('SalaireB','Salaire Bureau','5',$employe->SalaireB);
$MainOutput->inputtext('SalaireS','Salaire Sauveteur','5',$employe->SalaireS);
$MainOutput->inputtext('SalaireA','Salaire Assitant','5',$employe->SalaireA);
$MainOutput->flag('Cessation',$employe->Cessation);
$MainOutput->textarea('Raison','Raison du départ','25','2',$employe->Raison);



/*
$Path = strstr($_SERVER['HTTP_REFERER,'?');
$Path = substr($Path,1);
$Path = explode('&',$Path);

foreach($Path as $v){
	if($Var = explode('=',$v))
		$MainOutput->inputhidden_env($Var[0],$Var[1]);
}

*/


$MainOutput->formsubmit('Ajouter / Modifier');
echo $MainOutput->send(1);

?>
