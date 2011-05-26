<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}
?>
<HTML>
<? require "_header.php"; ?>
<center>
<h1>:: Section ที่ส่งงานเข้ามา::</h1></center><br><br>
[ <a href="main.php">Back Main</a> &gt; <a href="mstudent.php">Back manage student</a>&nbsp;&gt; Section ที่ส่งงานเข้ามา<br><br><br>
<table border="0">
  <tr bgcolor="#D3D3D3"> 
    
    <td>NO.</td>
    <td>SECTION ที่ส่งงานเข้ามา</td><td>ปีการศึกษา</td>
  </tr>
  <?
	$count=1;
	include "../connect.php";

	$sqlx="select * from teacher where username='$sess_username'";
	$resultx=mysql_db_query($dbname,$sqlx);
	$record=mysql_fetch_array($resultx);

		$sql2="select student.section,student.year from sendanswer,student where (sendanswer.ref_student=student.student_id and sendanswer.ref_student=student.student_id and student.teach='$record[name]' and status=0) GROUP BY student.section,student.year";
 		$result2=mysql_db_query($dbname,$sql2);
		while($record=mysql_fetch_array($result2)) {
		echo "<tr> 
			<td>$count</td>
			<td><a href=\"report2.php?section=$record[section]&year=$record[year]\">$record[section]</a></td>
			<td>$record[year]</td>
		    </tr>";
			$count++;	
			}

	
	mysql_close();
?>
</table>

<? require "_footer.php"; ?>
</HTML>
