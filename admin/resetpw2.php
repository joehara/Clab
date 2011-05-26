<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: ../index.html"); 	exit();
}
$username=$_GET[username];
$resetpw=base64_encode($_POST[resetpw]);
?>

<HTML>
<? require "_header.php"; ?>

<?
include "../connect.php";
$sql="update teacher set  password='$resetpw' where username='$username' ";
$result=mysql_db_query($dbname,$sql);
if ($result) {
	echo "<h3>Change password Successful</h3>";
	echo "[ <a href=mteacher.php>Back Show Teacher</a> ] ";
} else {
	echo "<h3>Edit Unsuccessful</h3>";
	echo "[ <a href=mteacher.php>Back to Show Teacher</a> ] ";
	echo "[ <a href=main.php>Back Main</a> ] ";
}
mysql_close();
?>

<? require "_footer.php"; ?>
</html>
