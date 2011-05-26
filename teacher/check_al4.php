<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: /Clab/index.html"); 	exit();
}
  $lesson=$_GET[lesson];
  $section=$_GET[section];
  $student_id=$_GET[id];
?>
<HTML>
<? require "_header.php"; ?>

<center>
<h1>:: โจทย์ที่ส่ง::</h1></center><br><br>
[<a href="main.php">Main</a> &gt; <a href="mstudent.php">manage student</a> &gt; <a href="check_al.php"> Section ที่ตรวจแล้ว</a> &gt; <a href="check_al2.php?lesson=<?=$lesson?>&amp;section=<?=$section?>">บทที่ ตรวจแล้ว</a> &gt;ผู้ทำส่งข้อสอบ<br><br><br>
<table border="0">
  <tr bgcolor="#D3D3D3">
    <td>NO.</td>
    <td>โจทย์ที่ส่ง</td>
  </tr>
<?

$count=1;
include "../connect.php";
$sql="select student.name,student.student_id,check_answer.check_id,proposition.proposition from sendanswer,proposition,student,check_answer where (check_answer.ref_answer=sendanswer.answer_id and sendanswer.ref_question=proposition.question_id and sendanswer.ref_student=student.student_id) and proposition.ref_lesson='$lesson' and student.section='$section' and student.student_id='$student_id'";
$result=mysql_db_query($dbname,$sql);
while($record=mysql_fetch_array($result)) {

echo "
<tr>
<td>$count</td>
<td>$record[proposition]</td>
<td><a href=\"check_al_st.php?check_id=$record[check_id]\">detail</a></td>
</tr>";
$count++;


}
mysql_close();
?>
</table>

<? require "_footer.php"; ?>
</html>
