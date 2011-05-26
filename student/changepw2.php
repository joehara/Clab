<?
include "../chksession.php";

if ($sess_table<>student) {
	header( "Location: /Clab/index.html"); 	exit();
}
?>

<HTML>
<? require "_header.php"; ?>

<?

$oldpass=base64_encode($_POST[oldpass]);
$newpass=base64_encode($_POST[newpass]);
$newpass2=base64_encode($_POST[newpass2]);

if ($oldpass=="" or $newpass=="" or $newpass2=="" or $newpass<>$newpass2) {
	echo "<h3>ERROR : Don't have User or Password<h3>"; 	exit();
}
include "../connect.php";
$sql="select * from student where code_st='$sess_username' and password='$oldpass' ";
$result=mysql_db_query($dbname,$sql);
$num=mysql_num_rows($result);
if($num<1) {
	echo "<h3>ERROR : Don't have User on database </h3>"; 	exit();
}

$sql="update student set  password='$newpass' where code_st='$sess_username' ";
$result=mysql_db_query($dbname,$sql);
if ($result) {
	echo "<h3>Change password successful</h3>";
	echo "[ <a href=main.php>Back main</a> ] ";
} else {
	echo "<h3>Error Can't change password</h3>";
}
mysql_close();
?>
<? require "_footer.php"; ?>
</HTML>
