<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: ../index.html"); 	exit();
}
 $section=$_GET[section];
  $student_id=$_GET[id];
?>
<HTML>
<? require "_header.php"; ?>

<center>
<h1>บทต่างๆที่ส่งเข้ามา</h1></center><br><br>
<p><a href="main.php">Home</a> &gt; <a href="m_scroll.php"> จัดการคะแนน</a>&nbsp;&gt;
<a href="m_scroll_name.php?section=<?=$section?>"> รายชื่อที่ส่งงานเข้ามา</a>&gt; บทต่างๆที่ส่งเข้ามา</p><br>
<br>
<table border="0">
  <tr bgcolor="#D3D3D3">
    <td><b><center>NO.</center></b></td>
    <td><b><center>หัวข้อบท</center></b></td>

  </tr>
  <?
 
	include "../connect.php";
	$sql="select headlesson.lesson,headlesson.detail from sendanswer,proposition,headlesson,student where (sendanswer.ref_student=student.student_id and sendanswer.ref_question=proposition.question_id and proposition.ref_lesson=headlesson.lesson) and student.student_id='$student_id' and status = 1 GROUP BY headlesson.lesson";
 		$result=mysql_db_query($dbname,$sql);
	while($record=mysql_fetch_array($result)) {

		echo "<tr> 
			<td>$record[lesson]</td>
			<td><a href=\"m_score_question.php?section=$section&id=$student_id&lesson=$record[lesson]\">$record[detail]</a></td>
		</tr>";
			

	}
	mysql_close();
?>
</table>

<? require "_footer.php"; ?>
</html>
