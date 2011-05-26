<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}
  $section=$_GET[section];
  $student_id=$_GET[student];
  $year=$_GET[year];
?>
<HTML>
<? require "_header.php"; ?>

<center>
<h1>:: บทที่ส่งเข้ามา ::</h1></center><br><br>
[<a href="main.php"> Back Main</a> &gt; <a href="mstudent.php">manage student</a>
&gt; <a href="report.php"> Section ที่ส่งงานเข้ามา</a> &gt; <a href="report2.php?id=<?$student_id?>&lesson=<?=$lesson?>&section=<?=$section?>&year=<?=$year?>">นักศึกษาที่ส่งงานเข้ามา</a> &gt; บทที่ส่งเข้ามา<br><br><br>
<table border="0">
<tr bgcolor="#D3D3D3">
<td>NO.</td>
<td>บทที่ส่งเข้ามา</td>

</tr>
<?

$count=1;
include "../connect.php";
$sql="select * from sendanswer,proposition,student,headlesson where (status = 0 and sendanswer.ref_question=proposition.question_id and sendanswer.ref_student=student.student_id and proposition.ref_lesson=headlesson.lesson) and student.student_id='$student_id' GROUP BY proposition.ref_lesson order by proposition.ref_lesson";
$result=mysql_db_query($dbname,$sql);
while($record=mysql_fetch_array($result)) {

echo "
<tr>
<td>$count</td>
<td><a href=\"question_report2.php?id=$student_id&lesson=$record[ref_lesson]&section=$record[section]&year=$record[year]\">lesson $record[lesson] $record[detail]</a></td>
</tr>";
$count++;

}

mysql_close();
?>
</table>

<? require "_footer.php"; ?>
</html>
