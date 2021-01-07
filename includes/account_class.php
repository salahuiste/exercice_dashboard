<?php
	include("card_class.php");
	include("transaction_class.php");
	class Account{
		private $account_id;
		private $last_name;
		private $first_name;
		private $gender;
		private $currenct_balance=0;
		private $cards=[];
		private $transactions=[];
		function __construct($account){
			$this->account_id=$account["account_id"];
			$this->last_name=$account["last_name"];
			$this->first_name=$account["first_name"];
			$this->gender=$account["gender"];
			for($i=0;$i<count($account["cards"]);$i++){
				$this->cards[]=new Card($account["cards"][$i]);
			}
			$this->currenct_balance=$account["currenct_balance"];
			for($i=0;$i<count($account["transactions"]);$i++){
				$this->transactions[]=new Transaction($account["transactions"][$i],$account["account_id"]);
			}
		}
		public function getAccountId(){
			return $this->account_id;
		}
		public function getLastName(){
			return $this->last_name;
		}
		public function getFirstName(){
			return $this->first_name;
		}
		public function getCurrentBalance(){
			return $this->currenct_balance;
		}
		public function getCards(){
			return $this->cards;
		}
		public function getTransactions(){
			return $this->transactions;
		}
		public function setAccountId($acc_id){
			$this->account_id=$acc_id;
		}
		public function setFirstName($first_name){
			$this->first_name=$first_name;
		}
		public function setLastName($last_name){
			$this->last_name=$last_name;
		}
		public function setCurrentBalance($currenct_balance){
			$this->currenct_balance=$currenct_balance;
		}
		public function setCards($cards){
			$this->cards=$cards;
		}
		public function setTransaction($transactions){
			$this->transactions=$transactions;
		}
	}	
?>