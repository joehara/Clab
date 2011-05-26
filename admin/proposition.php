<? 
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: ../index.html"); 	exit();
}
$id=$_GET[id_edit];
$lesson=$_GET[lesson];

?>
<HTML>
<? require "_header.php"; ?>

<center><h1>คำถาาม</h1></center><br><br>
<a href="main.php">Home</a>&gt;<a href="m_lesson.php"> จัดการบทเรียน</a>&gt;<a href="proposition.php?id_edit=<?=$id?>&lesson=<?=$lesson?>"> บทเรียนที่ <?=$lesson?></a>&gt; คำถาม<br>
<br>
<?
include "../connect.php";
$sql="select * from headLesson where lesson='$lesson' ";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);
$name_lesson=$record[detail];
echo"$name_lesson";
?><br>
<table border="0">
<tr>
<td><center><a href="adquestion.php?id_edit=<?=$id?>&lesson=<?=$lesson?>"><img src="../images/comment_add2.png" alt="Add Proposition" /><br> เพิ่มคำถาม </a></center></td>
</tr>
</table>

<table border="1">
  <tr bgcolor="#D3D3D3"> 
    <td><center><b>ข้อที่</center></b></td>
    <td><b><center>คำถาม</center></b></td>
	<td><b><center>แก้ไข</center></b></td>
	<td><b><center>ลบ</center></b></td>
  </tr>
  <?
	$count=0;

	$sql="select * from proposition where ref_lesson='$lesson' ORDER BY question_id";
	$result=mysql_db_query($dbname,$sql);
	while($record=mysql_fetch_array($result)) {
		$count++;
		echo "
		<tr> 
			<td>$count</td>
			<td>$record[proposition]</td>
			<td><center><a href=\"edquestion.php?id=$record[question_id]&lesson=$lesson\"><img src=\"/Clab/images/icon-edit.gif\"></a></center></td>
			<td><center><a href=\"drop_question.php?id=$record[question_id]\" onclick=\"return confirm(' ต้องการลบ $record[proposition] ออกจากระบบจริงหรือไม่ ')\"><img src=\"/Clab/images/b_drop.png\"></a></center></td>
		</tr>";
	}
	mysql_close();
?>
</table>


<? require "_footer.php"; ?>
</HTML>
