<?php
	//si l'id n'est pas vide ou nul
	if(isset($_GET['id']) && !empty($_GET["id"])){
		//inclure le fichier qui va lire les données du fichier json
		include("includes/card_infos.php");
		//je recupére toutes les transactions effectuées 
		$transactions=$account->getTransactions();
		//déclaration et définition d'un drapeau qui va
		$flag=0;
		//une boucle pour retrouver la transacction concernée
		for($i=0;$i<count($transactions);$i++){
			//si l'id de la tr courante == l'id de la tr recherchée on converte l'objet en json et on l'affiche
			if($transactions[$i]->getTransactionId()==$_GET['id']){
				$arr=transaction_detail($transactions[$i]);
				echo json_encode($arr);
				$flag=1;
				break;
			}
		}
		//si la transaction est introuvable 
		if($flag!=1){
			echo json_encode(array("status"=>-1));
		}
		
	//lazy loading on renvoie la nb+1 transaction.
	}else if(isset($_GET['nb']) && !empty($_GET["nb"])){
		$nb=(int)$_GET["nb"];
		//inclure le fichier qui va lire les données du fichier json
		include("includes/card_infos.php");
		//je recupére toutes les transactions effectuées 
		$transactions=$account->getTransactions();
		if($nb<count($transactions)){
			$arr=transaction_detail($transactions[$nb]);
			echo json_encode($arr);
		}else{
			//tt les transactions sont affichées
			echo "";
		}
	}
	else{
		echo "ERREUR";
	}
	//fonction pour la conversion objet en array
	function transaction_detail($obj)
	{
	    return array("id"=>$obj->getTransactionId(),"date"=>$obj->getDateTransaction(),"acc_id"=>$obj->getAccountId(),"total"=>$obj->getTotalTransaction(),"currency"=>$obj->getCurrency(),"type"=>$obj->getType(),"status"=>$obj->getStatus());
	}
?>
