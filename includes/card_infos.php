<?php
	include("account_class.php");
	//je vais ouvrir le fichier json qui contient tt les informations du compte.
	//je vais mettre cette ligne ci-dessous dans un bloc de try catch car le non-existance du fiichier json va provoquer une exception.
	try{
		$str_account_json = file_get_contents("account.json");
		// Convert to array 
		$account_array = json_decode($str_account_json, true);
		//var_dump($account_array); 
	}catch (Exception $e) {
		echo $e->getMessage();
	}
	$account= new Account($account_array);
?>