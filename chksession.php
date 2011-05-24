<?

session_start();
ob_start();
$sess_userid=$_SESSION[sess_userid];
$sess_username=$_SESSION[sess_username];
$sess_table=$_SESSION[table];
if ($sess_userid<>session_id() or $sess_username=="") {
	header( "Location: /Clab/index.html"); 	exit();
} 
?>
