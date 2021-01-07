<?php
	class Card{
		private $cc_number;
		private $date_exp;
		private $cvc;
		private $holder_name;
		private $balance;
		private $currency;
		function __construct($card){
			$this->cc_number=$card["cc_number"];
			$this->date_exp=$card["date_exp"];
			$this->cvc=$card["cvc"];
			$this->holder_name=$card["holder_name"];
			$this->balance=$card["balance"];
			$this->currency=$card["currency"];
		}
		public function getCcNumber(){ return $this->cc_number; }
		public function getDateExp(){ return $this->date_exp; }
		public function getCvc(){ return $this->cvc; }
		public function getHolderName(){ return $this->holder_name; }
		public function getBalance(){ return $this->balance; }
		public function getCurrency(){ return $this->currency; }
		public function setCcNumber($cc_number){
			$this->cc_number=cc_number;
		}
		public function setDateExp($date_exp){
			$this->date_exp=date_exp;
		}
		public function setCvc($cvc){
			$this->cvc=cvc;
		}
		public function setHolderName($holder_name){
			$this->holder_name=holder_name;
		}
		public function setBalance($balance){
			$this->balance=balance;
		}
		public function setCurrency($currency){
			$this->currency=currency;
		}
	}
?>