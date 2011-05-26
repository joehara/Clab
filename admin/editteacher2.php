<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: ../index.html"); 	exit();
}
$id=$_GET[id];
$code=$_POST[code];
$username=$_POST[username];
$name=$_POST[name];
$email=$_POST[email];
$phone=$_POST[phone];
$address=$_POST[address];

?>

<HTML>
<? require "_header.php"; ?>

<?

include "../function.php";
if (!checkemail($email)) {
	echo "<h3>ERROR :Email differant format </h3>"; exit();
}
include "../connect.php";
$sql="update teacher set  name='$name',username='$username',email='$email',phone='$phone',address='$address' where teacher_id='$id' ";
$result=mysql_db_query($dbname,$sql);
if ($result) {
	echo "<h3>Edit Profile Successful</h3>";
	echo "[ <a href=mteacher.php>Back Show Teacher</a> ] ";
} else {
	echo "<h3>Edit Unsuccessful</h3>";
	echo "[ <a href=editteacher.php?id_edit=$id>Edit profile</a> ] ";
	echo "[ <a href=main.php>Back Main</a> ] ";
}
mysql_close();
?>

<? require "_footer.php"; ?>
</html>
