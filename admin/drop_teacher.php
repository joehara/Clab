<?
include "../chksession.php";

if ($sess_table<>admin) {
        header( "Location: ../index.html");     exit();
}
?>
<HTML>
<? require "_header.php"; ?>


<?
$id=$_GET[id];
include "../connect.php";
$sql2="delete from teacher where teacher_id='$id' ";
$result2=mysql_db_query($dbname,$sql2);
if ($result2) {
	echo "<h3>Delete successful</h3>";
	echo "<meta http-equiv=\"Refresh\" content=\"2; URL=mteacher.php\">";
} else {
	echo "<h3>ERROR Delete unsucessful</h3>";
}
mysql_close();
?>

<? require "_footer.php"; ?>
</div>
</div>
</body>
</html>
