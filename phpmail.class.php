<?php

class PHPMail {

			private $message = "";
			private $from = "";
			private $subject = "";
			private $to = Array();
			private $status = false;
			private $headers = "";

function PHPMail(){

			// empty constructor
			$this->headers = "Originating-IP: " . $_SERVER['REMOTE_ADDR'] . "\n";

}

function setHeader($header){

			$this->headers = $this->headers . $header . "\n";

}

function getHeaders(){

			return $this->headers;

}

function setSender($sender){

			$this->from = "From: " . $sender . "\n";

}

function getSender(){

			return $this->from;

}

function setRecipient($recipient){

			$currElems = count($this->to);
			$this->to[$currElems] = $recipient;

}

function setRecipients($recipients){

			$currElems = count($this->to);
			$counter = 0;
			
			for($counter = 0; $counter < count($recipients); $counter++){
			
			$this->to[count($this->to)] = $recipients[$counter];
			
			}

}

function getRecipients(){

			return $this->to;

}

function setSubject($subject){

			$this->subject = $subject;

}

function getSubject(){

			return $this->subject;

}

function println($message){

			$this->message = $this->message . $message . "\n";

}

function body($message){

			$this->message = $this->message . $message;

}

function bodyln($message){

			$this->message = $this->message . $message . "\n";

}

function put($message){

			$this->message = $this->message . $message;

}

function isValidEmail($email) {

			$result = true;

  		if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/i", $email)) {
 
    	$result = false;

  		}

			return $result;
			
}
  
function sendMail(){

			$status = false;
			$i = 0;
			
			for($i = 0; $i < count($this->to); $i++){
			
			if($this->headers != ""){
			
			$status = mail($this->to[$i], $this->subject, $this->message,  $this->from . $this->headers);
			
					if($status == false){
			
					return $status;
			
					} // end if

			} else {
			
			$status = mail($this->to[$i], $this->subject, $this->message, $this->from);
			
					if($status == false){
			
					return $status;
			
					} // end if

			} // end else
			
			} // end for
			
			return $status;
}

}

?>
