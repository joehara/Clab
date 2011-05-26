<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}?>
<HTML>
<? require "_header.php"; ?>
<center>
<h1>:: Report Score ::</h1></center><br><br>
[ <a href="main.php"> Main</a> &gt; <a href="mstudent.php">manage student</a> &gt; Report Score<br>
<br>
<center>
<table border="1">
<tr bgcolor="#D3D3D3">
<td>ลำดับ</td><td><center>ห้อง</center></td><td>ปีการศึกษา</td><td>รายงานผล</td>
</tr>

<?
include "../connect.php";

$sqlx="select * from teacher where username='$sess_username'";
$resultx=mysql_db_query($dbname,$sqlx);
$record=mysql_fetch_array($resultx);

$sql="select * from check_answer,sendanswer,student where check_answer.ref_answer=sendanswer.answer_id and sendanswer.ref_student=student.student_id and student.teach='$record[name]' group by student.year";


$result=mysql_db_query($dbname,$sql);
$count=1;
while($record=mysql_fetch_array($result)){
echo"<tr>
<td>$count</td>
<td>$record[section]</td>
<td><center>$record[year]</center></td>
<td><center><a href='report_scroll2.php?section=$record[section]&year=$record[year]'><img src=\"../images/report_magnify.png\"></a></center></td>
</tr>";
$count++;
}

?>
</table>
</center>

<? require "_footer.php"; ?>
</html>
