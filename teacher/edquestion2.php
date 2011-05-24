<HTML>
<meta content="text/html; charset=UTF-8" http-equiv="content-type">
<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}
$id=$_GET[id];
$lesson=$_GET[lesson];
$question=$_POST[question];
$help=$_POST[help];
$answer=$_POST[answer];
$level=$_POST[level];
$new = htmlspecialchars($help, ENT_QUOTES);
$answer2 = htmlspecialchars($answer, ENT_QUOTES);

include "../connect.php";
$sql="update proposition set  proposition='$question',help='$new',answer='$answer2',level='$level' where question_id='$id' ";
$result=mysql_db_query($dbname,$sql);
if ($result) {
	echo "<h3>Edit Question Successful</h3>";
	echo "[ <a href=proposition.php?id=$id&lesson=$lesson>Back Show Question</a> ] ";
} else {
	echo "<h3>Edit Unsuccessful</h3>";
	echo "[ <a href=edquestion.php?id=$id&lesson=$lesson>Edit Question</a> ] ";
	echo "[ <a href=main.php>Back Main</a> ] ";
}
mysql_close();
?>
</HTML>

