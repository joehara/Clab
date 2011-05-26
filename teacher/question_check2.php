<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}
  $ans_id=$_POST[ans_id];

$teacher_name=$_POST[teacher_name];
$result=$_POST[point];
$code_comment=$_POST[code_comment];
?>

<html>
<? require "_header.php"; ?>

<?
include "../connect.php";

$sql2="select  * from sendanswer,proposition,student  where (sendanswer.ref_question=proposition.question_id and sendanswer.ref_student=student.student_id) and sendanswer.answer_id='$ans_id' ";
$result2=mysql_db_query($dbname,$sql2);
$record=mysql_fetch_array($result2);

$section=$record[section];
$student_id=$record[student_id];
$ref_lesson=$record[ref_lesson];
$code_st=$record[code_st];

$sql="update sendanswer set teacher_check='$teacher_name', code_comment='$code_comment',result=$result, check_date=NOW(), status=1 where answer_id=$ans_id";
$result=mysql_db_query($dbname,$sql);
/*
$sql="insert into check_answer values('','$ans_id','$teacher_name','$code_comment','$result', NOW())";
$result=mysql_db_query($dbname,$sql);
*/

if ($result) {
	echo "<h3>ตรวจเรียบร้อย </h3>";
	echo "[ <a href=question_report2.php?id=$student_id&lesson=$ref_lesson&section=$section>Back โจทย์ที่ส่ง</a> ]";
} else {
	echo "<h3>ERROR ไม่สามารถตรวจได้</h3>";
}
mysql_close();
?>

<? require "_footer.php"; ?>
</html>
