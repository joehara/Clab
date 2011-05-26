<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}
  $section=$_GET[section];
  $year=$_GET[year];
?>
<HTML>
<? require "_header.php"; ?>

<center>
<h1>:: ผู้ส่งข้อสอบ::</h1></center><br><br>
[<a href="main.php">Main</a> &gt; <a href="mstudent.php">manage student</a> &gt; <a href="check_al.php"> Section ที่ตรวจแล้ว</a> &gt; <a href="check_al2.php?lesson=<?=$lesson?>&section=<?=$section?>">บทที่ ตรวจแล้ว</a> &gt;ผู้ทำส่งข้อสอบ<br><br><br>
<table border="0">
<tr bgcolor="#D3D3D3">
<td>รหัสนักศึกษา</td>
<td>ชื่อนักศึกษา</td>

</tr>
<?

include "../connect.php";
$sql="select student.name,student.student_id from sendanswer,student where sendanswer.ref_student=student.student_id and student.section='$section' and student.year=$year and status = 1 GROUP BY student.name order by student.student_id" ;
$result=mysql_db_query($dbname,$sql);
while($record=mysql_fetch_array($result)) {

echo "
<tr>
<td>$record[student_id]</td>
<td><a href=\"check_al3.php?id=$record[student_id]&section=$section&year=$year\">$record[name]</a></td>
</tr>";

}
mysql_close();
?>
</table>

<? require "_footer.php"; ?>
</html>
