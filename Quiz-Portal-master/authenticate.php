<?php

	function isLoggedIn(){
		//isset($_SESSION) && isset($_SESSION['logged_in'])
		if(isset($_COOKIE['user_id']) && isset($_COOKIE['quiz_id'])) {
			return TRUE;
		}
		else{
			removeCookies();
			removeSessionVariables();
			return FALSE;
		}
	}

	function removeCookies(){
		if (isset($_SERVER['HTTP_COOKIE'])){
	    	$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
	    	foreach($cookies as $cookie){
	        	$parts = explode('=', $cookie);
	        	$name = trim($parts[0]);
	        	setcookie($name, '', time()-1000);
	        	setcookie($name, '', time()-1000, '/');
    		}
		}
	}

	function removeSessionVariables(){
    	$helper = array_keys($_SESSION);
    	foreach ($helper as $key){
        	unset($_SESSION[$key]);
    	}
	}

?>
