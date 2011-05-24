
<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}
$id_del=$_GET[id_del];

include "../connect.php";
$sql="delete from student where id='$id_del' ";
$result=mysql_db_query($dbname,$sql);
if ($result) {
	echo "<h3>Delete successful</h3>";
	echo "[ <a href=showstudent.php>Back Show student</a> ] ";
} else {
	echo "<h3>ERROR Delete unsucessful</h3>";
}
mysql_close();
?>

</body>
</html>
