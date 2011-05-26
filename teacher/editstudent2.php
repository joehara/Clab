<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}
?>
<HTML>
<? require "_header.php"; ?>

<?
$id_edit=$_GET[id_edit];
$name=$_POST[name];
$section=$_POST[section];
$email=$_POST[email];
$phone=$_POST[phone];
$address=$_POST[address];

include "../function.php";
if (!checkemail($email)) {
	echo "<h3>ERROR :Email differant format </h3>"; exit();
}
include "../connect.php";
$sql="update student set name='$name',section='$section',email='$email', phone='$phone' ,address='$address' where student_id='$id_edit' ";
$result=mysql_db_query($dbname,$sql);
if ($result) {
	echo "<h3>Edit Profile Successful</h3>";
	echo "[ <a href=showstudent.php>Back Show student</a> ] ";
} else {
	echo "<h3>Edit Unsuccessful</h3>";
	echo "[ <a href=editstudent.php>Edit profile</a> ] ";
	echo "[ <a href=main.php>Back Main</a> ] ";
}
mysql_close();
?>
<? require "_footer.php"; ?>
</HTML>
