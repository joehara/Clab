<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: ../index.html"); 	exit();
}
?>
<HTML>
<? require "_header.php"; ?>

<center><h1>:: นักศึกษาที่ลงทะเบียนผ่านเว็บ  ::</h1></center><br><br>
<p><a href="main.php">Back Main</a>&gt;<a href="mstudent.php"> Student Management</a>&gt; นักศึกษาที่ลงทะเบียนผ่านเว็บ </p><br><br>
<form name="form1" method="post" action="">
  <table border="1">
    <tr bgcolor="#D3D3D3">
      <td><center><b>No.</b></center></td>
      <td><center><b>Student ID</b></center></td>
      <td><center><b>Name</b></center></td>
      <td><center><b>Section</b></center></td>
	  <td><center><b>Accept</b></center></td>
	  <td><center><b>Dismiss</b></center></td>
      
    </tr>
    <?
	$count=0;
	include "../connect.php";
	$sql="select * from student  where permission=0";
	$result=mysql_db_query($dbname,$sql);
	while($record=mysql_fetch_array($result)) {
		$count++;
		echo "
		<tr> 
			<td>$count</td>
			<td>$record[code_st]</td>
			<td>$record[name]</td>
			<td>$record[section]</td>
			<td><center><a href=\"register_st2.php?id=$record[student_id]&permission=1\"><img src=\"../images/b_usrcheck.png\"></a></center></td>
			<td><center><a href=\"register_st2.php?id2=$record[student_id]\" onclick=\"return confirm(' ต้องการลบ $record[name] ออกจากระบบจริงหรือไม่ ')\"><img src=\"../images/b_usrdrop.png\"></a></center></td>
		</tr>";
	}
	mysql_close();
?>
  </table>
</form>

<? require "_footer.php"; ?>
</HTML>
