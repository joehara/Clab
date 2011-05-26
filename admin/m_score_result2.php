<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: ../index.html"); 	exit();
}
  $code=$_POST[code];
  $comment2=$_POST[comment2];
  $result=$_POST[result];
  $check_id=$_POST[check_id];
  $ans_id=$_POST[ans_id];
?>
<HTML>
<? require "_header.php"; ?>

<?
if($comment2==""){
echo"กรุณาใส่ comment ทุกครั้ง"; exit();
}

include "../connect.php";
$sql="update sendanswer set  code_comment='$comment2' ,result='$result' where answer_id='$check_id' ";
echo $sql;
$result=mysql_db_query($dbname,$sql);

$sql2="select student.section,student.student_id,proposition.ref_lesson from sendanswer,proposition,student  where (sendanswer.ref_question=proposition.question_id and sendanswer.ref_student=student.student_id) and sendanswer.answer_id='$check_id' ";
$result2=mysql_db_query($dbname,$sql2);
$record=mysql_fetch_array($result2);

$section=$record[section];
$student_id=$record[student_id];
$ref_lesson=$record[ref_lesson];
if ($result ) {
	echo "<h3>Edit Score Successful </h3>";
	echo "[ <a href=m_score_question.php?section=$section&id=$student_id&lesson=$ref_lesson>Back ข้อต่างๆที่ส่งเข้ามา</a> ] ";
} else {
	echo "<h3>Edit Unsuccessful</h3>";
	echo "[ <a href=m_score_question.php?section=$section&id=$student_id&lesson=$ref_lesson>Back ข้อต่างๆที่ส่งเข้ามา</a> ] ";
}
mysql_close();
?>

<? require "_footer.php"; ?>
</html>
