<?php

class strongpass{
	public function check ($pass){
		$response = "OK";
		if (strlen($pass) < 8){
			$response = "Password must be at least 8 character";
		}
		else if(is_numeric($pass)){
			$response = "Password must contain at least one letter";
		}
		else if (!preg_match('#[0-9]#', $pass)){
			$response = "Password must contain at least one number";
		}
		
		return $response;
	}
}

?>