<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: ../index.html"); 	exit();
}
?>
<HTML>
<? require "_header.php"; ?>

<center>
<p><h1>:: Manage Teacher ::</h1></center><br>
<p><a href="main.php">Back Main</a>&gt;<a href="mstudent.php"> Teacher Management</a></p><br><br>
<table border="0">
<tr>
<td><center><a href="addteacher.php"><img src="../images/user_male_add2.png" alt="Add teacher" /><br> Add Teacher </a></center></td>
</tr>
</table>
<table border="1">
  <tr bgcolor="#D3D3D3"> 
    <th width="30"> <div align="center">No. </div></th>
    <th width="250"> <div align="center">Name</div></th>
    <th width="300"> <div align="center">Email</div></th>
	<th width="97"> <div align="center">Edit </div></th>
		<th width="97"> <div align="center">Delete </div></th>
  </tr>
  <?
	$count=0;
	include "../connect.php";
	$sql="select * from teacher order by name";
	$result=mysql_db_query($dbname,$sql);
	while($record=mysql_fetch_array($result)) {
		$count++;
		echo "
		<tr> 
			<td > $count</td>
			<td>$record[name]</td>
			<td>$record[email]</td>
			<td><center><a href=\"editteacher.php?id_edit=$record[teacher_id]\"><img src=\"../images/icon-edit.gif\"></a></center></td>
			<td><center><a href=\"drop_teacher.php?id=$record[teacher_id]\" onclick=\"return confirm(' ต้องการลบ $record[name] ออกจากระบบจริงหรือไม่ ')\"><img src=\"../images/b_drop.png\"></a></center></td>
		</tr>";
	}
	mysql_close();
?>
</table>

<? require "_footer.php"; ?>
</HTML>
