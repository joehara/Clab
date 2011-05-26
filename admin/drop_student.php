<?
include "../chksession.php";

if ($sess_table<>admin) {
        header( "Location: ../index.html");     exit();
}
?>
<HTML>
<? require "_header.php"; ?>

<?
$id=$_GET[id];
include "../connect.php";
$sql="delete from student where student_id='$id' ";
$result=mysql_db_query($dbname,$sql);
if ($result) {
	echo "<h3>Delete student successful</h3>";
	//echo "<meta http-equiv=\"Refresh\" content=\"2; URL=m_lesson.php\">";
} else {
	echo "<h3>ERROR Delete student unsucessful</h3>";
}
	
$sql2="select  check_answer.check_id,check_answer.ref_answer from check_answer,answer where (check_answer.ref_answer=answer.ans_id) and answer.ref_student='$id'";
$result2=mysql_db_query($dbname,$sql2);
$record2=mysql_fetch_array($result2);
		$num2=mysql_num_rows($result2);
		if($num2>0){
		$sql3="delete from check_answer where check_id='$record2[check_id]'";
		$result3=mysql_db_query($dbname,$sql3);
		if($result3){
		echo"<h3>Delete From DB คะแนน successful</h3>";
		}else{
		echo"<h3>Error From DB คะแนน</h3>";
		}
		}
		
$sql4="select ans_id from answer where ref_student='$id'";
$result4=mysql_db_query($dbname,$sql4);
$record4=mysql_fetch_array($result4);
$num3=mysql_num_rows($result4);
if($num3>0){
		$sql3="delete from answer where ref_student='$id'";
		$result3=mysql_db_query($dbname,$sql3);
		if($result3){
		echo"<h3>Delete From DB คะแนน successful</h3>";
		}else{
		echo"<h3>Error From DB คะแนน</h3>";
		}
		}
mysql_close();
?>

<? require "_footer.php"; ?>
</html>
