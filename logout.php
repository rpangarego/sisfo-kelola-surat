<?php 
	require_once 'includes/functions.php';

	$_SESSION['username'] = '-';
    $_SESSION['level'] = '0';
	$_SESSION=[];
	session_unset();
	session_destroy();

	redirect_js('../login');
exit;
?>