<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}
?>
<HTML>
<? require "_header.php"; ?>

<center>
<h1>:: Question ที่ตรวจแล้ว ::</h1></center><br><br>
[ <a href="main.php"> Main</a> &gt; <a href="mstudent.php"> manage student</a>&nbsp;&gt; <a href="check_al.php">Section ที่ตรวจแล้ว</a> &gt; Question ที่ตรวจแล้ว<br><br><br>
<table border="0">
  <tr bgcolor="#D3D3D3"> 
    
    <td>บทที่</td>
    <td>Question</td>
  </tr>
  <?
  $section=$_GET[section];
  $year=$_GET[year];
  $student_id = $_GET[id];
	include "../connect.php";
$sqlx="select * from teacher where username='$sess_username'";
$resultx=mysql_db_query($dbname,$sqlx);
$record=mysql_fetch_array($resultx);

	$sql="select distinct headlesson.detail,headlesson.lesson,student.section from sendanswer,proposition,student,headlesson  where sendanswer.ref_question=proposition.question_id and sendanswer.ref_student=student.student_id and proposition.ref_lesson=headlesson.lesson and student.teach='$record[name]' and student.section='$section' and status=1 and student.year=$year and student.student_id=$student_id order by headlesson.lesson";
	$result=mysql_db_query($dbname,$sql);
	while($record=mysql_fetch_array($result)) {
		echo "<tr> 
			<td>$record[lesson]</td>
			<td><a href=\"check_al4.php?id=$student_id&lesson=$record[lesson]&section=$record[section]&year=$year\">$record[detail]</a></td>
			
		</tr>";
	}
	mysql_close();
?>
</table>

<? require "_footer.php"; ?>
</html>
