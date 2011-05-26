<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: ../index.html"); 	exit();
}
?>
<HTML>
<? require "_header.php"; ?>

<center>
<h1>จัดการคะแนน</h1></center><br><br>
<a href="main.php">Home</a>&gt; จัดการคะแนน<br />
<br />
<table border="1">
  <tr bgcolor="#D3D3D3">
    <td><b><center>NO.</center></b></td>
    <td><b><center>ปีการศึกษา</center></b></td>
    <td><b><center>Section</center></b></td>
  </tr>
  <?
	$count=1;
	include "../connect.php";
		$sql="select distinct student.section, student.year from sendanswer,student where sendanswer.ref_student=student.student_id and status = 1 ORDER BY  student.year desc, student.section asc";
 		$result=mysql_db_query($dbname,$sql);
	while($record=mysql_fetch_array($result)) {
		
		
		echo "<tr> 
			<td>$count</td>
			<td>$record[year]</td>
			<td><a href=\"m_score_name.php?section=$record[section]&year=$record[year]\">$record[section]</a></td>
		    </tr>";
			$count++;	
			

	}
	mysql_close();
?>
</table>

<? require "_footer.php"; ?>
</html>
