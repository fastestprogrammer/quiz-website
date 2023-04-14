<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}

	require_once('authenticate.php');

	if(isLoggedIn()){
		removeCookies();
		removeSessionVariables();
	}
	echo "<meta http-equiv='refresh' content='0;url=index.php'>";
?>
