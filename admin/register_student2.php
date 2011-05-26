<?
include "../chksession.php";

if ($sess_table<>admin) {
        header( "Location: ../index.html");     exit();
}
?>
<HTML>
<? require "_header.php"; ?>

<?
$student_id=$_GET[id];
$permission=$_GET[permission];
include "../connect.php";


$sql="update student set  permission='$permission' where student_id='$student_id' ";
$result=mysql_db_query($dbname,$sql);
if ($result) {
	echo "<h3>Edit Profile Successful</h3>";
	echo "<meta http-equiv=\"Refresh\" content=\"2; URL=register_student.php\">";
	
} else {
	echo "<h3>Edit Unsuccessful</h3>";
	echo "[ <a href=editstudent.php>Edit profile</a> ] ";
	echo "[ <a href=main.php>Back Main</a> ] ";
}
mysql_close();
?>

<? require "_footer.php"; ?>
</HTML>
