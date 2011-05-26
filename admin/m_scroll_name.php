<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: /Clab/index.html"); 	exit();
}
?>
<HTML>
<? require "_header.php"; ?>

<center>
<h1>:: รายชื่อที่ส่งงานเข้ามา ::</h1></center><br><br>
<p><a href="main.php">Back Main</a> &gt; <a href="m_scroll.php"> Score Management</a>&nbsp;&gt; รายชื่อที่ส่งงานเข้ามา</p><br>

<table border="0">
  <tr bgcolor="#D3D3D3"> 
    
    <td><b><center>NO.</center></b></td>
    <td><b><center>Student ID</center></b></td>
    <td><b><center>Name</center></b></td>
  </tr>
  <?
  $section=$_GET[section];
	$count=1;
	include "../connect.php";
	$sql="select student.student_id,student.code_st,student.name from check_answer,sendanswer,student  where (check_answer.ref_answer=sendanswer.answer_id and sendanswer.ref_student=student.student_id and student.section='$section') GROUP BY student.name";
	$result=mysql_db_query($dbname,$sql);
	while($record=mysql_fetch_array($result)) {
		
		echo "<tr> 
			<td>$count</td>
			<td><a href=\"m_scroll_lesson.php?section=$section&id=$record[student_id]\">$record[code_st]</td>
			<td>$record[name]</td>
		</tr>";
			
			$count++;

			
			
	}
	mysql_close();
?>
</table>

<? require "_footer.php"; ?>
</html>
