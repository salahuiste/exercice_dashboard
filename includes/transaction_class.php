<?php
	/*la classe ci-dessous représente une transaction*/
	class Transaction{
		private $transaction_id;
		private $date_transaction;
		private $account_id;
		private $total_transaction;
		private $currency;
		private $type;
		//status == -1 ==>Canceled,status == 0 ==> Pending, status==1 ==> Confirmed
		private $status;
		function __construct($transaction,$acc_id){
			$this->transaction_id=$transaction["id"];
			$this->date_transaction=$transaction["date"];
			$this->account_id=$acc_id;
			$this->total_transaction=$transaction["total"];
			$this->currency=$transaction["currency"];
			$this->type=$transaction["type"];
			$this->status=$transaction["status"];
		} 
		//les getters
		public function getTransactionId() {
			return $this->transaction_id;
		}
		public function getDateTransaction() {
			return $this->date_transaction;
		}
		public function getAccountId() {
			return $this->account_id;
		}
		public function getTotalTransaction() {
			return $this->total_transaction;
		}
		public function getCurrency() {
			return $this->currency;
		}
		public function getType() {
			return $this->type;
		}
		public function getStatus(){
			return $this->status;
		}
		//les setters
		public function setTransactionId($transactionId){
			$this->transaction_id=$transactionId;
		}
		public function setDateTransaction($dateTransaction){
			$this->date_transaction=$dateTransaction;
		}
		public function setAccountId($accountid){
			$this->account_id=$accountid;
		}
		public function setTotalTransaction($total_transaction){
			$this->total_transaction=$total_transaction;
		}
		public function setCurrency($currency){
			$this->currency=$currency;
		}
		public function setType($type){
			$this->type=$type;
		}
		public function setStatus($status){
			$this->status=$status;
		}
	}
?>