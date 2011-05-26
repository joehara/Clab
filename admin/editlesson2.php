<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: ../index.html"); 	exit();
}
$id_edit=$_GET[id_edit];
$lesson=$_POST[lesson];
$detail=$_POST[h_lesson];
$hard=$_POST[hard];
$easy=$_POST[easy];
$HH=$_POST[HH];
$MM=$_POST[MM];
?>
<HTML>
<? require "_header.php"; ?>

<?

include "../connect.php";
$sql="update headlesson set  lesson='$lesson',detail='$detail' ,hard='$hard',easy='$easy',time='$HH:$MM' where id='$id_edit' ";
$result=mysql_db_query($dbname,$sql);
if ($result) {
	echo "<h3>Edit Lesson Successful</h3>";
	echo "[ <a href=m_lesson.php>Back Show student</a> ] ";
} else {
	echo "<h3>Edit Unsuccessful</h3>";
	echo "[ <a href=editstudent.php>Edit profile</a> ] ";
	echo "[ <a href=main.php>Back Main</a> ] ";
}
mysql_close();
?>

<? require "_footer.php"; ?>
</HTML>
