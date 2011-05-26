<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}?>
<HTML>
<? require "_header.php"; ?>
<center>
<h1>:: Report Score ::</h1></center><br><br>
[ <a href="main.php"> Main</a> &gt; <a href="mstudent.php">manage student</a> &gt; Report Score<br>
<br>
<center>
<table border="1">
<tr bgcolor="#D3D3D3">
<td>ลำดับ</td><td>ปีการศึกษา</td><td><center>ห้อง</center></td><td>รายงานผล</td>
</tr>

<?
include "../connect.php";

$sqlx="select * from teacher where username='$sess_username'";
$resultx=mysql_db_query($dbname,$sqlx);
$record=mysql_fetch_array($resultx);

$sql="select distinct year,section from student where teach='$record[name]' order by year, section";


$result=mysql_db_query($dbname,$sql);
$count=1;
while($record=mysql_fetch_array($result)){
echo"<tr>
<td>$count</td>
<td><center>$record[year]</center></td>
<td>$record[section]</td>
<td><center><a href='report_score2.php?section=$record[section]&year=$record[year]'><img src=\"../images/report_magnify.png\"></a></center></td>
</tr>";
$count++;
}

?>
</table>
</center>

<? require "_footer.php"; ?>
</html>
