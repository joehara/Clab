<?
include "../chksession.php";

if ($sess_table<>teacher) {
        header( "Location: /Clab/index.html");     exit();
}
?>
<HTML>
<? require "_header.php"; ?>

<?
$id_edit=$_GET[id_edit];
$lesson=$_POST[lesson];
$detail=$_POST[h_lesson];
$hard=$_POST[hard];
$easy=$_POST[easy];

include "../connect.php";
$sql="update headlesson set  lesson='$lesson',detail='$detail' ,hard='$hard',easy='$easy' where id='$id_edit' ";
$result=mysql_db_query($dbname,$sql);
if ($result) {
	echo "<h3>Edit Lesson Successful</h3>";
	echo "[ <a href=showlesson.php>Back Show Lesson</a> ] ";
} else {
	echo "<h3>Edit Unsuccessful</h3>";
	echo "[ <a href=editstudent.php>Edit profile</a> ] ";
	echo "[ <a href=main.php>Back Main</a> ] ";
}
mysql_close();
?>

<? require "_footer.php"; ?>
</html>
