<?php
	//si l'id n'est pas vide ou nul
	if($_GET['card']==0 || isset($_GET['card']) && !empty($_GET["card"])){
		if(isset($_GET['key']) && !empty($_GET["key"]) && $_GET["key"]=="a54daze2zaea6z"){
			$i_card=(int)$_GET['card'];
			//inclure le fichier qui va lire les données du fichier json
			include("includes/card_infos.php");
			//je recupére toutes les cartes enregistrées sur le compte
			$cards=$account->getCards();
			if($i_card>=count($cards)){
				$i_card=0;
			}else if($i_card<0){
				$i_card=count($cards)-1;
			}
			$arr=card_details($cards[$i_card],$i_card);
			echo json_encode($arr);
		}
		
		
	}
	else{
		echo "ERREUR";
	}
	//fonction pour la conversion objet en array
	function card_details($obj,$card)
	{
	    return array("id"=>$card,"cc_number"=>$obj->getCcNumber(),"date_exp"=>$obj->getDateExp(),"cvc"=>$obj->getCvc(),"holder_name"=>$obj->getHolderName());
	}
?>
