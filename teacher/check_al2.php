<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: /Clab/index.html"); 	exit();
}
?>
<HTML>
<? require "_header.php"; ?>

<center>
<h1>:: Question ที่ตรวจแล้ว ::</h1></center><br><br>
[ <a href="main.php"> Main</a> &gt; <a href="mstudent.php"> manage student</a>&nbsp;&gt; <a href="check_al.php">Section ที่ตรวจแล้ว</a> &gt; Question ที่ตรวจแล้ว<br><br><br>
<table border="0">
  <tr bgcolor="#D3D3D3"> 
    
    <td>NO.</td>
    <td>Question</td>
  </tr>
  <?
  $section=$_GET[section];
	$count=1;
	include "../connect.php";
$sqlx="select * from teacher where username='$sess_username'";
$resultx=mysql_db_query($dbname,$sqlx);
$record=mysql_fetch_array($resultx);

	$sql="select headlesson.detail,headlesson.lesson,student.section from sendanswer,proposition,student,headlesson  where sendanswer.ref_question=proposition.question_id and sendanswer.ref_student=student.student_id and proposition.ref_lesson=headlesson.lesson and student.teach='$record[name]' and student.section='$section'";
	$result=mysql_db_query($dbname,$sql);
	while($record=mysql_fetch_array($result)) {
		
		if($a!=$record[detail]){
		echo "<tr> 
			<td>$count</td>
			<td><a href=\"check_al3.php?lesson=$record[lesson]&section=$record[section]\">$record[detail]</a></td>
			
		</tr>";
			$a=$record[detail];
			$count++;
			}
		
	}
	mysql_close();
?>
</table>

<? require "_footer.php"; ?>
</html>
