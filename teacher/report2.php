<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}
?>
<HTML>
<? require "_header.php"; ?>
<center>
<h1>:: นักศึกษาที่ส่งงานเข้ามา::</h1></center><br><br>
[ <a href="main.php">Back Main</a> &gt; <a href="mstudent.php">Back manage student</a>&nbsp;&gt; <a href="report.php">Section ที่ส่งงานเข้ามา</a> &gt; นักศึกษาที่ส่งงานเข้ามา<br><br><br>
<table border="0">
  <tr bgcolor="#D3D3D3"> 
    
    <td>NO.</td>
    <td>นักศึกษาที่ส่งงานเข้ามา</td>
  </tr>
  <?
include "../connect.php";
$sqlx="select * from teacher where username='$sess_username'";
$resultx=mysql_db_query($dbname,$sqlx);
$record=mysql_fetch_array($resultx);

  $section=$_GET[section];
  $year=$_GET[year];
  $lesson=$_GET[lesson];
  $student_id=$_GET[student];
  $count=1;
	
	$sql="select student.student_id,student.name,student.section,student.year from sendanswer,proposition,student,headlesson  where (sendanswer.ref_question=proposition.question_id and sendanswer.ref_student=student.student_id and proposition.ref_lesson=headlesson.lesson )and student.section='$section' and student.teach='$record[name]'  and student.year='$year' and status = 0 GROUP BY student.name";
	$result=mysql_db_query($dbname,$sql);
	while($record=mysql_fetch_array($result)) {
		

		echo "<tr> 
			<td>$count</td>
			<td><a href=\"question_report.php?section=$record[section]&student=$record[student_id]&year=$record[year]\">$record[name]</a></td>
			
		</tr>";
	
			$count++;
			
		
	}
	mysql_close();
?>
</table>
<? require "_footer.php"; ?>
</html>
