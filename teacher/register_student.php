<?
include "../chksession.php";

if ($sess_table<>teacher) {
header( "Location: /Clab/index.html"); exit();
}
?>
<HTML>
<? require "_header.php"; ?>
<center>
<H1>:: นักศึกษาที่ลงทะเบียนเข้ามา ::</H1></center><br><br>
[ <a href="main.php">Back Main</a> &gt; <a href="mstudent.php">manage student</a> &gt;<a href="showstudent.php">Show Student/detail</a>&gt;นักศึกษาที่ลงทะเบียนผ่านเว็บ<br>
<br><br>

<table border="1">
<tr bgcolor="#D3D3D3">
<td>No.</td>
<td><center>Student ID</center></td>
<td><center>Name</center></td>
<td><center>section</center></td>
<td><center>year</center></td>
<td><center>Accept</center></td>
<td><center>Dismiss</center></td>
</tr>
<?
$count=0;
include "../connect.php";
$sql="select * from student where permission='0'";
$result=mysql_db_query($dbname,$sql);
while($record=mysql_fetch_array($result)) {
$count++;
echo "
<tr>
<td>$count</td>
<td>$record[code_st]</td>
<td>$record[name]</td>
<td>$record[section]</td>
<td>$record[year]</td>
<td><center><a href=\"register_student2.php?id=$record[student_id]&permission=1\"><img src=\"/Clab/images/b_usrcheck.png\"></a></center></td>
<td><center><a href=\"register_student2.php?id2=$record[student_id]\" onclick=\"return confirm(' ต้องการลบ $record[name] ออกจากระบบจริงหรือไม่')\"><img src=\"../images/b_usrdrop.png\"></a></center></td>
</tr>";
}
mysql_close();
?>
</table>
<? require "_footer.php"; ?>
</HTML>


