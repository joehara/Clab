<?
include "../chksession.php";

if ($sess_table<teacher) {
	header( "Location: /Clab/index.html"); 	exit();
}
?>

<HTML>
<? require "_header.php"; ?>

<?


$lesson=$_POST[lesson];
$h_lesson=$_POST[h_lesson];
$hard=$_POST[hard];
$easy=$_POST[easy];
$HH=$_POST[HH];
$MM=$_POST[MM];

if ($lesson=="" or $h_lesson=="") {
	echo "<h3>ERROR : Don't have Key anything<h3>"; exit();
}
include "../connect.php";
$sql="select * from headlesson where lesson='$lesson' ";
$result=mysql_db_query($dbname,$sql);
$num=mysql_num_rows($result);
if($num>0) {
	echo "<h3>ERROR : duplicate lesson number</h3>";	 exit();
}
$sql="insert into headlesson values('','$lesson','$h_lesson','$hard','$easy','$HH:$MM')";
$result=mysql_db_query($dbname,$sql);
if ($result) {
	echo "<h3>Insert Lesson successful</h3>";
	echo "<A HREF='addlesson.php'>Back Management</A><BR><BR>";
} else {
	echo "<h3>Error Can't insert to database</h3>";
}
mysql_close();
?>

<? require "_footer.php"; ?>
</html>
