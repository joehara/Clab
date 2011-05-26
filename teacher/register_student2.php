<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}
?>
<HTML>
<? require "_header.php"; ?>

<?
$student_id=$_GET[id];
$permission=$_GET[permission];
include "../connect.php";
if($student_id!=""){

$sql="update student set  permission='$permission' where student_id='$student_id' ";
$result=mysql_db_query($dbname,$sql);
if ($result) {
	echo "<h3>Add student Successful</h3>";
	echo "<meta http-equiv=\"Refresh\" content=\"2; URL=register_student.php\">";
	
} else {
	echo "<h3>Add Unsuccessful</h3>";
	echo "[ <a href=editstudent.php>Edit profile</a> ] ";
	echo "[ <a href=main.php>Back Main</a> ] ";
}
}else{

$id2=$_GET[id2];
$sql2="delete from student where student_id='$id2' ";
$result2=mysql_db_query($dbname,$sql2);
if ($result2) {
	echo "<h3>Delete successful</h3>";
	echo "<meta http-equiv=\"Refresh\" content=\"2; URL=showstudent.php\">";
} else {
	echo "<h3>ERROR Delete unsucessful</h3>";
}
}

mysql_close();
?>
<? require "_footer.php"; ?>
</HTML>
