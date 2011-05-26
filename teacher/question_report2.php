<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: /Clab/index.html"); 	exit();
}

  $lesson=$_GET[lesson];
  $section=$_GET[section];
  $student_id=$_GET[id];
  $year=$_GET[year];
?>
<HTML>
<? require "_header.php"; ?>

<center>
<h1>:: โจทย์ที่ส่ง ::</h1></center><br><br>
[<a href="main.php"> Back Main</a> &gt; <a href="mstudent.php">manage student</a>
&gt; <a href="report.php"> Section ที่ส่งงานเข้ามา</a> &gt; <a href="report2.php?id=<?$student_id?>&lesson=<?=$lesson?>&amp;section=<?=$section?>&year=<?=$year?>">บทที่ส่งงานเข้ามา</a> &gt;<a href="question_report.php?student=<?=$student_id?>&lesson=<?=$lesson?>&section=<?=$section?>&year=<?=$year?>">ผู้ส่งข้อสอบ</a>&gt; โจทย์ที่ทำส่ง
<br><br><br>
<table border="0">
<tr bgcolor="#D3D3D3">
<td>NO.</td>
<td>โจทย์ที่ส่ง</td>
</tr>
<?

	$count=1;
	include "../connect.php";
	$sql="select proposition.proposition,student.name,student.student_id,sendanswer.answer_id from sendanswer,proposition,student where (sendanswer.ref_question=proposition.question_id and sendanswer.ref_student=student.student_id) and proposition.ref_lesson='$lesson' and student.section='$section' and student.student_id='$student_id'";
	$result=mysql_db_query($dbname,$sql);
	while($record=mysql_fetch_array($result)) {

	$sql2="select * from check_answer where ref_answer='$record[answer_id]'";
		$result2=mysql_db_query($dbname,$sql2);
		$record2=mysql_fetch_array($result2);
		$num2=mysql_num_rows($result2);
		if($num2<=0) {
		echo "<tr>
			<td>$count</td>
			<td>$record[proposition]</td>
			<td><a href=\"question_check.php?ans_id=$record[answer_id]\">ตรวจ</a></td>
		</tr>";

	}

	$count++;
	}

mysql_close();
?>
</table>

<? require "_footer.php"; ?>
</html>


