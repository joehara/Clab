<?
include "../chksession.php";
if ($sess_table<>student) {
	header( "Location: /Clab/index.html"); 	exit();}
?>
<HTML>
<? require "_header.php"; ?>

<center><h1>แบบฝึกหัด</h1></center><br>
<a href="main.php">Home</a> > แบบฝึกหัด
<center><br>
<table border="1">
  <tr bgcolor="#D3D3D3"> 
    
    <td><b><center>บทที่</center></b></td>
    <td><b><center>หัวข้อ</center></b></td>
    <td><b><center>วันกำหนดส่ง</center></b></td>
    <td><b><center>คะแนน</center></b></td>
  </tr>
  <?
	$count=0;
	include "../connect.php";
	
	  $sql_name="select * from student where code_st='$sess_username' ";
$result_name=mysql_db_query($dbname,$sql_name);
$record_name=mysql_fetch_array($result_name);
$student_id=$record_name[student_id];
	
	$sql="select * from headlesson  ORDER BY lesson asc";
	$result=mysql_db_query($dbname,$sql);
	while($record=mysql_fetch_array($result)) {
	
		$sql_result="select  sum(check_answer.result) as sum_result,time_fix.time_finish from check_answer,sendanswer,proposition,student where check_answer.ref_answer=sendanswer.answer_id and sendanswer.ref_question=proposition.question_id and sendanswer.ref_student=student.student_id and proposition.ref_lesson='$record[lesson]' and student.code_st='$sess_username' " ;
		$result_re=mysql_db_query($dbname,$sql_result);
		$record_re=mysql_fetch_array($result_re);
		$time_finsh=$record[time_finsh];
		$sum_result=$record_re[sum_result];
		if($sum_result==0){
		$sum_result='-';
		$url="main_lesson.php?id_edit=$record[id]&lesson=$record[lesson]";
		}else{
		$url="result_question.php?lesson=$record[lesson]";
		}
		echo "
		<tr> 
			
			<td><center>$record[lesson]</center></td>
			<td><a href='$url'>$record[detail]</a></td>
			<td><center>$time_finsh</td>
			<td><center>$sum_result</center></td>
		</tr>";
	}
	mysql_close();
?>
</table>
</center>
<? require "_footer.php"; ?>
</html>

