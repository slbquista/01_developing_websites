<?php 
	function encryptPW($pw){
		$salt = "thisisasalt";
		$pw = $pw . $salt;
		$pw = sha1($pw);
		return $pw;
	}
?>