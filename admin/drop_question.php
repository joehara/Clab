<?
include "../chksession.php";

if ($sess_table<>admin) {
        header( "Location: ../index.html");     exit();
}
?>
<html>
<? require "_header.php"; ?>

<?
$id=$_GET[question_id];
include "../connect.php";
$sql="delete from proposition where question_id='$id' ";
$result=mysql_db_query($dbname,$sql);
if ($result) {
	echo "<h3>Delete successful</h3>";
	echo "<meta http-equiv=\"Refresh\" content=\"2; URL=proposition.php\">";
} else {
	echo "<h3>ERROR Delete unsucessful</h3>";
}
mysql_close();
?>

<? require "_footer.php"; ?>
</html>
