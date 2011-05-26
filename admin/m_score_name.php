<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: ../index.html"); 	exit();
}
?>
<HTML>
<? require "_header.php"; ?>

<center>
<h1>รายชื่อที่ส่งงานเข้ามา</h1></center><br><br>
<p><a href="main.php">Home</a> &gt; <a href="m_scroll.php"> จัดการคะแนน</a>&nbsp;&gt; รายชื่อที่ส่งงานเข้ามา</p><br>

<table border="0">
  <tr bgcolor="#D3D3D3"> 
    
    <td><b><center>NO.</center></b></td>
    <td><b><center>Student ID</center></b></td>
    <td><b><center>Name</center></b></td>
  </tr>
  <?
  $section=$_GET[section];
  $year=$_GET[year];
	$count=1;
	include "../connect.php";
	$sql="select student.student_id,student.code_st,student.name from sendanswer,student  where (sendanswer.ref_student=student.student_id and student.section='$section' and student.year=$year and status = 1) GROUP BY student.name order by student.code_st";
	$result=mysql_db_query($dbname,$sql);
	while($record=mysql_fetch_array($result)) {
		
		echo "<tr> 
			<td>$count</td>
			<td>$record[code_st]</td>
			<td><a href=\"m_score_lesson.php?section=$section&id=$record[student_id]&year=$year\">$record[name]</td>
		</tr>";
			
			$count++;

			
			
	}
	mysql_close();
?>
</table>

<? require "_footer.php"; ?>
</html>
