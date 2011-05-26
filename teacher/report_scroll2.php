<? include"../chksession.php";
if ($sess_table<>teacher) {
	header( "Location: /Clab/index.html"); 	exit();
}
?>
<html>
<? require "_header.php"; ?>

<font size="4"><b>รายงานผลคะแนนของนักศึกษา <?=$_GET[section];?> ปีการศึกษาที่ <?=$_GET[year];?></b></font>
<br><br>
<table id="mytable" border="0" cellspacing="0" cellpadding="0">

<tr >
<td>&nbsp; No.&nbsp; </td><td>&nbsp; รายชื่อนักศึกษา&nbsp; </td>

<?
$section=$_GET[section];
$year=$_GET[year];
include "../connect.php";
$sql="select * from headlesson";
$result=mysql_db_query($dbname,$sql);
$num=mysql_num_rows($result);


for ($i = 1; $i <= $num; $i++){
echo"<td>&nbsp; บทที่ $i&nbsp; </td>";
}
echo"<td>&nbsp; Total &nbsp; </td>";


$count=1;
$sql2="select student.name,student.student_id from check_answer,sendanswer,student,proposition where check_answer.ref_answer=sendanswer.answer_id and sendanswer.ref_student=student.student_id and sendanswer.ref_question=proposition.question_id and student.section='$section' and student.year='$year' group by student.name";
$result2=mysql_db_query($dbname,$sql2);
$numx=mysql_num_rows($result2);

while($record=mysql_fetch_array($result2)){



echo"<tr>";
echo"<td><center>$count</center></td><td><center>$record[name]</center></td>";

for ($i = 1; $i <= $num; $i++){

$sql3="select  sum(check_answer.result) as sum_result from check_answer,sendanswer,student,proposition where check_answer.ref_answer=sendanswer.answer_id and sendanswer.ref_student=student.student_id and sendanswer.ref_question=proposition.question_id and student.section='$section' and student.year='$year' and proposition.ref_lesson='$i' and student.student_id='$record[student_id]'";
$result3=mysql_db_query($dbname,$sql3);
$record3=mysql_fetch_array($result3);


if($record3[sum_result]==0){
echo"<td><center>-</center></td>";
}else{
echo"<td><center>$record3[sum_result] </center></td>";
}
$total_sum+=$record3[sum_result];
}
echo"<td><center>$total_sum</center></td>";
$total_sum=0;
$count++;

}


?>
</tr>
</table>
<input type="submit" value="Print" onClick="window.print()">

<? require "_footer.php"; ?>
</html>
