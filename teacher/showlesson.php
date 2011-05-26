<?
include "../chksession.php";
?>
<HTML>
<? require "_header.php"; ?>
<center><h1>จัดการบทเรียน</h1></center><br><br>
<a href="main.php">Home</a>&gt; จัดการบทเรียน <br><br><br>
<table border="0">
<tr>
<td><center><a href="addlesson.php"><img src="/Clab/images/comment_add2.png" alt="Add Lesson" /><br> เพิ่มบทเรียน </a></center></td>
</tr>
</table>

<table border="1">
  <tr bgcolor="#D3D3D3"> 
    
    <td>บทที่</td>
    <td><center>หัวข้อ</center></td>
<td>แก้ไข</td>
<td>ข้อง่าย/สุ่ม</td>
<td>ข้อยาก/สุ่ม</td>
</tr>
<?
$count=0;
include "../connect.php";

$sqlx="select * from teacher where username='$sess_username'";
$resultx=mysql_db_query($dbname,$sqlx);
$recordx=mysql_fetch_array($resultx);

$sql="select * from headlesson ORDER BY lesson asc";
$result=mysql_db_query($dbname,$sql);
while($record=mysql_fetch_array($result)) {

$sql2="select count(level) as level from proposition where ref_lesson=$record[lesson] and level=0 " ;
$result2=mysql_db_query($dbname,$sql2);
$record2=mysql_fetch_array($result2);
$easy=$record2[level];

$sql3="select count(level) as level from proposition where ref_lesson=$record[lesson] and level=1" ;
$result3=mysql_db_query($dbname,$sql3);
$record3=mysql_fetch_array($result3);
$hard=$record3[level];

$sql4="select * from teacher_random,proposition,teacher where (teacher_random.question_id=Proposition.question_id and teacher_random.teacher_id=teacher.teacher_id ) and proposition.ref_lesson='$record[lesson]' and proposition.level='0' and teacher.name='$recordx[name]'";
$result4=mysql_db_query($dbname,$sql4);
$num4=mysql_num_rows($result4);

$sql5="select * from teacher_random,proposition,teacher where teacher_random.question_id=proposition.question_id and teacher_random.teacher_id=teacher.teacher_id and proposition.ref_lesson='$record[lesson]' and proposition.level='1' and teacher.name='$recordx[name]'";
$result5=mysql_db_query($dbname,$sql5);
$num5=mysql_num_rows($result5);
echo "
<tr>
<td>$record[lesson]</td>
<td><a href=\"proposition.php?id_edit=$record[id]&lesson=$record[lesson]\">$record[detail]</a></td>
<td><center><a href=\"editlesson.php?id_edit=$record[id]\"><img src=\"../images/icon-edit.gif\"></a></center></td>
<td><center>$easy/$num4</center></td>
<td><center>$hard/$num5</center></td>
</tr>";

}
mysql_close();
?>
</table>

<? require "_footer.php"; ?>
</HTML>

