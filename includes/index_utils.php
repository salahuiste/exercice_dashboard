<?php
	class Page{
		public static function printTransactions($transactions,$nb){
			$currencies=["USD"=>"$","EUR"=>"€"];

			for($i=0;$i<count($transactions);$i++){
				//on affiche juste nb transactions...
				if($nb==$i){
					break;
				}
				#on recupère la monnaie(usd ou euro par exemple)
				$cur=$transactions[$i]->getCurrency();
				$transactionId=$transactions[$i]->getTransactionId();
				$date=$transactions[$i]->getDateTransaction();
				$amount=$transactions[$i]->getTotalTransaction();
				#on recupère le statut de l'opération
				$status=Page::getTransactionStatus($transactions[$i]->getStatus());
				echo "<tr class='transaction'>";
                echo "<td data-label='ID TRANSACTION'>$transactionId</td>";
                echo "<td data-label='Date'>$date</td>";
                echo "<td data-label='Amount'>$amount $currencies[$cur]</td>";
                echo "<td data-label='Status' class='$status[2]'><img src='$status[1]'/>$status[0]</td>";
                echo "</tr>";
			}
		}
		public static function getTransactionStatus($status){
			//si le statut == -1 ==> opération Canceled
			if($status==-1){
				return array("Canceled","icon/canceled.svg","tr_canceled");
			}//si le status == 0 ==> opération pending
			else if($status==0){
				return array("Pending","icon/pending.svg","tr_pending");
			}else if($status==1){ //status completed
				return array("Completed","icon/completed.svg","tr_completed");
			}
		}
	}
?>