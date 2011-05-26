<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}
?>
<HTML>
<? require "_header.php"; ?>

<?
$code_st=$_GET[code_st];
$resetpw=base64_encode($_POST[resetpw]);
include "../connect.php";
$sql="update student set  password='$resetpw' where code_st='$code_st' ";
$result=mysql_db_query($dbname,$sql);
if ($result) {
	echo "<h3>Change password Successful</h3>";
	echo "[ <a href=mstudent.php>Back Show Student</a> ] ";
} else {
	echo "<h3>Edit Unsuccessful</h3>";
	echo "[ <a href=mstudent.php>Back Show Student</a> ] ";
	echo "[ <a href=main.php>Back Main</a> ] ";
}
mysql_close();
?>

<? require "_footer.php"; ?>
</html>
