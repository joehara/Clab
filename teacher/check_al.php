<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}
?>
<HTML>
<? require "_header.php"; ?>

<center>
<h1>:: Section ที่ตรวจแล้ว ::</h1></center></b><br><br>
[ <a href="main.php"> Main</a> &gt; <a href="mstudent.php"> manage student</a>&nbsp;&gt; Section ที่ตรวจแล้ว<br><br><br>
<table border="0">
  <tr bgcolor="#D3D3D3"> 
    
    <td>NO.</td>
    <td>SECTION </td><td>ปีการศึกษา</td>
  </tr>
  <?
	$count=1;
	include "../connect.php";
$sqlx="select * from teacher where username='$sess_username'";
$resultx=mysql_db_query($dbname,$sqlx);
$record=mysql_fetch_array($resultx);

		
				$sql="select student.section,student.year from check_answer,sendanswer,student where check_answer.ref_answer=sendanswer.answer_id and sendanswer.ref_student=student.student_id and student.teach='$record[name]' GROUP BY student.section";
 		$result=mysql_db_query($dbname,$sql);
	while($record=mysql_fetch_array($result)) {
		
		
		echo "<tr> 
			<td>$count</td>
			<td><a href=\"check_al2.php?section=$record[section]\">$record[section]</a></td>
			<td>$record[year]</td>
		    </tr>";
			$count++;	
			

	}
	
	mysql_close();
?>
</table>

<? require "_footer.php"; ?>
</HTML>



