<?
include"../function.php";
include "../connect.php";
include "../chksession.php";
$code=$_POST[help];
$output=$_POST[output];
$id_question=$_POST[id_question];
$time=date("Y-m-d");
?>

<HTML>
<? require "_header.php"; ?>
<?
$sql="select * from student where code_st='$sess_username'";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);
$ref_student=$record[student_id];

$sql="select * from proposition where question_id='$id_question'";

$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);
$ref_lesson=$record[ref_lesson];

$sql="select * from sendanswer where ref_question='$id_question' and ref_student='$ref_student'";
$result=mysql_db_query($dbname,$sql);
$num=mysql_num_rows($result);
if($num>0) {

$sql2="update sendanswer set  code='$code',answer_code='$output' where ref_question='$id_question' and ref_student='$ref_student'";
$result2=mysql_db_query($dbname,$sql2);
echo "<h3>Update Answer Successful</h3>";
echo "[ <a href=main_lesson.php?lesson=$ref_lesson>Back Question</a> ] ";
}else{
$sql="insert into sendanswer values('','$id_question','$ref_student','$code','$time')"; 
$result=mysql_db_query($dbname,$sql);
if ($result) {
	echo "<h3>Save Answer Successful</h3>";
	echo "[ <a href=main_lesson.php?lesson=$ref_lesson>Back Question</a> ] ";
} else {
	echo "<h3>Save Unsuccessful</h3>";

}
}
$sql4="update time_use set time_end='$time'";
$result4=mysql_db_query($dbname,$sql4);
mysql_close();
?>
<? require "_footer.php"; ?>
</html>
