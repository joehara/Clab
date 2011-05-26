<?
include "../chksession.php";

if ($sess_table<>admin) {
        header( "Location: ../index.html");     exit();
}
?>
<html>
<? require "_header.php"; ?>

<?
$id=$_GET[id];
include "../connect.php";
$sql2="delete from headlesson where id='$id' ";
$result2=mysql_db_query($dbname,$sql2);
if ($result2) {
	echo "<h3>Delete successful</h3>";
	echo "<meta http-equiv=\"Refresh\" content=\"2; URL=m_lesson.php\">";
} else {
	echo "<h3>ERROR Delete unsucessful</h3>";
}
mysql_close();
?>

<? require "_footer.php"; ?>
</html>
