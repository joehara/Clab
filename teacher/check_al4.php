<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}
  $lesson=$_GET[lesson];
  $section=$_GET[section];
  $student_id=$_GET[id];
  $year=$_GET[year];
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
    <td>รายละเอียด</td>
  </tr>
<?

$count=1;
include "../connect.php";
$sql="select sendanswer.answer_id,proposition.proposition,sendanswer.ref_question from sendanswer,proposition,student where (sendanswer.ref_question=proposition.question_id and sendanswer.ref_student=student.student_id) and proposition.ref_lesson='$lesson' and student.section='$section' and student.student_id='$student_id' and student.year=$year and status = 1 order by sendanswer.ref_question";
$result=mysql_db_query($dbname,$sql);
while($record=mysql_fetch_array($result)) {

echo "
<tr>
<td>$count</td>
<td>$record[proposition]</td>
<td><a href=\"check_al_st.php?check_id=$record[ref_question]&id=$student_id\">detail</a></td>
</tr>";
$count++;


}
mysql_close();
?>
</table>

<? require "_footer.php"; ?>
</html>
