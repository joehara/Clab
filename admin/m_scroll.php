<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: /Clab/index.html"); 	exit();
}
?>
<HTML>
<? require "_header.php"; ?>

<center>
<h1>:: Score Management ::</h1></center><br><br>
<a href="main.php">Back Main</a>&gt; Section <br />
<br />
<table border="1">
  <tr bgcolor="#D3D3D3">
    <td><b><center>NO.</center></b></td>
    <td><b><center>SECTION ที่ส่งงานเข้ามา</center></b></td>
  </tr>
  <?
	$count=1;
	include "../connect.php";
		$sql="select student.section from check_answer,sendanswer,student where check_answer.ref_answer=sendanswer.answer_id and sendanswer.ref_student=student.student_id GROUP BY  student.section ";
 		$result=mysql_db_query($dbname,$sql);
	while($record=mysql_fetch_array($result)) {
		
		
		echo "<tr> 
			<td>$count</td>
			<td><a href=\"m_scroll_name.php?section=$record[section]\">$record[section]</a></td>
		    </tr>";
			$count++;	
			

	}
	mysql_close();
?>
</table>

<? require "_footer.php"; ?>
</html>
