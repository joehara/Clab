<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: /Clab/index.html"); 	exit();
}
 $section=$_GET[section];
  $student_id=$_GET[id];
  $lesson=$_GET[lesson];
 
?>
<HTML>
<? require "_header.php"; ?>

<center>
<h1>:: ข้อต่างๆที่ส่งเข้ามา ::</h1></center><br><br>
<p><a href="main.php">Back Main</a> &gt; <a href="m_scroll.php"> Score Management</a>&nbsp;&gt;
<a href="m_scroll_name.php?section=<?=$section?>"> รายชื่อที่ส่งงานเข้ามา</a>&gt;
<a href="m_scroll_lesson.php?section=<?=$section?>&amp;id=<?=$student_id?>"> บทต่างๆที่ส่งเข้ามา</a>&gt; ข้อต่างๆที่ส่งเข้ามา</p></br>
</br>
<table border="0">
  <tr bgcolor="#D3D3D3">
    <td><b><center>NO.</center></b></td>
    <td><b><center>โจทย์</center></b></td>
  </tr>
  <?
 
	include "../connect.php";
	$count=1;
	$sql="select proposition.proposition,proposition.question_id from check_answer,sendanswer,proposition,student where (check_answer.ref_answer=sendanswer.answer_id and sendanswer.ref_student=student.student_id and   									    sendanswer.ref_question=proposition.question_id ) and sendanswer.ref_student='$student_id'  and proposition.ref_lesson='$lesson' GROUP BY proposition.proposition ORDER BY proposition.question_id";
 		$result=mysql_db_query($dbname,$sql);
	while($record=mysql_fetch_array($result)) {
	

		echo "<tr> 
			<td>$count</td>
			<td><a href=\"m_scroll_result.php?section=$section&id=$student_id&question_id=$record[question_id]\">$record[proposition]</a></td>
		</tr>";
			
$count++;
			
	}
	mysql_close();
?>
</table>

<? require "_footer.php"; ?>
</html>
