<?php
session_start();
	require_once("action/config.php");
		if ($user->logout()) {
			$user->redirect('login.php');
		}
?>
