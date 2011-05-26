<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: /Clab/index.html"); 	exit();
}

  $lesson=$_GET[lesson];
  $section=$_GET[section];
?>
<HTML>
<? require "_header.php"; ?>

<center>
<h1>:: ผู้ส่งข้อสอบ::</h1></center><br><br>
[<a href="main.php">Main</a> &gt; <a href="mstudent.php">manage student</a> &gt; <a href="check_al.php"> Section ที่ตรวจแล้ว</a> &gt; <a href="check_al2.php?lesson=<?=$lesson?>&section=<?=$section?>">บทที่ ตรวจแล้ว</a> &gt;ผู้ทำส่งข้อสอบ<br><br><br>
<table border="0">
<tr bgcolor="#D3D3D3">
<td>NO.</td>
<td>ผู้ส่งข้อสอบ</td>

</tr>
<?

$count=1;
include "../connect.php";
$sql="select student.name,student.student_id from sendanswer,proposition,student,check_answer where (check_answer.ref_answer=sendanswer.answer_id and sendanswer.ref_question=proposition.question_id and sendanswer.ref_student=student.student_id) and proposition.ref_lesson='$lesson' and student.section='$section' GROUP BY student.name" ;
$result=mysql_db_query($dbname,$sql);
while($record=mysql_fetch_array($result)) {

echo "
<tr>
<td>$count</td>
<td><a href=\"check_al4.php?id=$record[student_id]&lesson=$lesson&section=$section\">$record[name]</a></td>
</tr>";
$count++;


}
mysql_close();
?>
</table>

<? require "_footer.php"; ?>
</html>
