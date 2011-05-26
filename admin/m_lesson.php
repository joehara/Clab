<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: ../index.html"); 	exit();
}
?>
<HTML>
<? require "_header.php"; ?>

<center><h1>จัดการบทเรียน</h1></center><br><br>
<a href="main.php">Home</a>&gt; จัดการบทเรียน<br><br><br>
<table border="0">
<tr>
<td><center><a href="addlesson.php"><img src="/Clab/images/comment_add2.png" alt="Add Lesson" /><br><font size="2"> เพิ่มบทเรียน </font></a></center></td>
</tr>
</table>
  
  <table border="1">
    <tr bgcolor="#D3D3D3">
	<td><center><b>บทที่</b></center></td>
	<td><center><b>หัวข้อ</b></center></td>
        <td><center><b>แก้ไข</b></center></td>
        <td><center><b>จำนวนข้อง่าย</b></center></td>
	<td><center><b>จำนวนข้อยาก</b></center></td>
    </tr>
    <?
	$count=0;
	include "../connect.php";
	$sql="select * from headlesson  ORDER BY lesson ";
	$result=mysql_db_query($dbname,$sql);  
	while($record=mysql_fetch_array($result)) {
		
		$sql2="select count(level) as level from proposition where ref_lesson=$record[lesson] and level=0" ;
		$result2=mysql_db_query($dbname,$sql2);
		$record2=mysql_fetch_array($result2);
		$easy=$record2[level];
		
		$sql3="select count(level) as level from proposition where ref_lesson=$record[lesson] and level=1" ;
		$result3=mysql_db_query($dbname,$sql3);
		$record3=mysql_fetch_array($result3);
		$hard=$record3[level];
		echo "
		<tr> 
			
			<td>$record[lesson]</td>
			<td><a href=\"proposition.php?id_edit=$record[id]&lesson=$record[lesson]\">$record[detail]</a></td>
			<td><center><a href=\"editlesson.php?id_edit=$record[id]\"><img src=\"../images/icon-edit.gif\"></a></center></td>
			<td><center>$easy</center></td>
			<td><center>$hard</center></td>
		</tr>";
	}
	mysql_close();
?>
</table>

<? require "_footer.php"; ?>
</html>
