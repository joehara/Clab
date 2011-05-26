<? 
include "../chksession.php";

if ($sess_table<>student) {
	header( "Location: /Clab/index.html"); 	exit();
}
$student_id=$_GET[student_id];
$lesson=$_GET[lesson];
?>
<HTML>
<? require "_header.php"; ?>
<center>
<h1>:: QUESTION DETAIL ::</h1> </center><br><br>
[ <a href="lesson.php">Back Lesson</a> ]<br><br>
<center>
<table border="1">
  <tr bgcolor="#D3D3D3"> 
    <td><b><center>No.</center></b></td>
    <td><b><center>Question</center></b></td>
    <td><b><center>Score</center></b></td>
  </tr>
  <?
	$count=0;
	include "../connect.php";

$sqlx="select * from student where code_st='$sess_username'";
$resultx=mysql_db_query($dbname,$sqlx);
$recordx=mysql_fetch_array($resultx);

	$sql="select proposition.proposition,check_answer.result,check_answer.check_id from check_answer,sendanswer,proposition,student where check_answer.ref_answer=sendanswer.answer_id and sendanswer.ref_question=proposition.question_id and sendanswer.ref_student=student.student_id and proposition.ref_lesson='$lesson' and student.student_id='$recordx[student_id]'";

	$result=mysql_db_query($dbname,$sql);
	$num=mysql_num_rows($result);
	if($num>0){
	while($record=mysql_fetch_array($result)) {
		$count++;
		echo "
		<tr> 
			<td>$count</td>
			<td>$record[proposition]</td>
			<td><center><a href=\"result_question_detail.php?check_id=$record[check_id]\">$record[result]</a></center></td>
			
		</tr>";
	}
	}else{
	?>
    </table>
    <?
	echo"<h3>คุณยังไม่ได้ส่งข้อสอบ</h3>";
	}
	mysql_close();
?>
</center>
<? require "_footer.php"; ?>
</HTML>
