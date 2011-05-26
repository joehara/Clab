<?
	session_start();
	unset( $_SESSION['sess_userid']);
	unset( $_SESSION['sess_username']);
	session_destroy();
	header('Location: ../index.html');
?>
