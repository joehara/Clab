<?
include "/Clab/chksession.php";
if ($sess_table<>student) {
	header( "Location: /Clab/index.html"); 	exit();}
?>
<HTML>
<? require "_header.php"; ?>
<center>
<h1>:: ผลคะแนนทั้งหมด ::</h1> </center><br><br>
[ <a href="main.php">Back Main</a> ]<br> <br><center>
<table border="1">
  <tr bgcolor="#D3D3D3"> 
    
    <td>Lesson</td>
    <td><center>Detail Lesson</center></td>
    <td>คะแนนทั้งหมด</td>
  </tr>
  <?
  	include "/Clab/connect.php";
  $sql="select * from student where username='$sess_username' ";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);
$student_id=$record[student_id];

	$count=0;

	$sql="select * from headLesson  ORDER BY lesson asc";
	$result=mysql_db_query($dbname,$sql);
	while($record=mysql_fetch_array($result)) {
		
		echo "
		<tr> 
			
			<td>$record[lesson]</td>
			<td><a href=\"result_question.php?student_id=$student_id&lesson=$record[lesson]\">$record[detail]</a></td>
			
			
		</tr>";
	}
	mysql_close();
?>
</table></center>
<? require "_footer.php"; ?>
</HTML>
