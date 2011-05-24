
<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}
$id=$_GET[id];
include "../connect.php";
$sql="delete from student where student_id='$id' ";
$result=mysql_db_query($dbname,$sql);
if ($result) {
	echo "<h3>Delete student successful</h3>";

} else {
	echo "<h3>ERROR Delete student unsucessful</h3>";
}
	
$sql2="select  Check_answer.check_id,Check_answer.ref_answer,SendAnswer.answer_id from Check_answer,SendAnswer where (Check_answer.ref_answer=SendAnswer.answer_id) and SendAnswer.ref_student='$id'";
$result2=mysql_db_query($dbname,$sql2);
		while($record=mysql_fetch_array($result2)) {
		$sql3="delete from Check_answer where ref_answer='$record[answer_id]'";
		$result3=mysql_db_query($dbname,$sql3);
	
		}
		
		
$sql2="select * from SendAnswer where ref_student='$id'";
$result2=mysql_db_query($dbname,$sql2);
while($record=mysql_fetch_array($result2)) {
		$sql3="delete from SendAnswer where ref_student='$id'";
		$result3=mysql_db_query($dbname,$sql3);
	
		}

$sql2="select * from Random where ref_student='$id'";
$result2=mysql_db_query($dbname,$sql2);
while($record=mysql_fetch_array($result2)) {
		$sql3="delete from Random where ref_student='$id'";
		$result3=mysql_db_query($dbname,$sql3);
	
		}
$sql2="select * from Time_use where ref_student='$id'";
$result2=mysql_db_query($dbname,$sql2);
while($record=mysql_fetch_array($result2)) {
		$sql3="delete from Time_use where ref_student='$id'";
		$result3=mysql_db_query($dbname,$sql3);
	
		}
		
mysql_close();
	echo "<meta http-equiv=\"Refresh\" content=\"2; URL=showstudent.php\">";
?>

