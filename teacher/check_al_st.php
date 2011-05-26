<?
include "../chksession.php";
 include"../function.php";
if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}
?>

<HTML>
<? require "_header.php"; ?>

<?
 
  $check_id=$_GET[check_id] ;
  $page=$_GET[page];

	include "../connect.php";
	$sql="select student.name,student.student_id,student.section,proposition.proposition,sendanswer.code,check_answer.code_comment,check_answer.result,check_answer.check_date,student.code_st,proposition.ref_lesson,time_use.time_start from check_answer,sendanswer,proposition,student,time_use  where check_answer.ref_answer=sendanswer.answer_id and sendanswer.ref_question=proposition.question_id and sendanswer.ref_student=student.student_id and time_use.ref_student=student.student_id and  check_answer.check_id='$check_id'";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);

$name=$record[name];
$code_st=$record[code_st];
$section=$record[section];
$time_start=$record[time_start];
$question=$record[proposition];
$code=$record[code];
$comment=$record[code_comment];
$result=$record[result];
$student_id=$record[student_id];
$lesson=$record[ref_lesson];
$check_date=$record[check_date];
?>
    &nbsp;<br />
 <?
if($page<>""){
	echo"[<a href=\"main.php\">Main</a> &gt; <a href=\"mstudent.php\">manage student</a> &gt; <a href=\"report.php\"> Section ที่ส่งงานเข้ามา</a> &gt; <a href=\"report2.php?lesson=$lesson&section=$section\">บทที่ส่งงานเข้ามา</a> &gt;<a href=\"question_report.php?lesson=$lesson&section=$section\">ผู้ส่งข้อสอบ</a>&gt;<a href=\"question_report2.php?id=$student_id&lesson=$lesson&section=$section\">โจทย์ที่ทำส่ง</a>&gt;รายละเอียด</p>";
}else{
 echo"
[<a href=\"main.php\">Main</a> &gt; <a href=\"mstudent.php\">manage student</a> &gt; <a href=\"check_al.php\"> Section ที่ตรวจแล้ว</a> &gt; <a href=\"check_al2.php?lesson=$lesson&section=$section\">บทที่ ตรวจแล้ว</a> &gt;<a href=\"check_al3.php?lesson=$lesson&amp;section=$section\">ผู้ทำส่งข้อสอบ</a>&gt;<a href=\"check_al4.php?id=$student_id&lesson=$lesson&section=$section\">โจทย์ที่ทำส่ง</a>&gt;ผลคะแนน</p>";
}
?>
<form id="form1" name="form1" method="post" action="question_check2.php">
<br> <br>
<table width="98%" border="0">
<tr>
<td width="11%">ชื่อผู้ส่ง: </td>
<td width="47%"><?=$name?>
<input name="ref_answer" type="hidden" id="ref_answer" value="<?=$ans_id?>" />
<input name="teacher_name" type="hidden" id="teacher_name" value="<?=$teacher_name?>" /></td>
<td width="42%">&nbsp;</td>
</tr>
<tr>
<td>รหัสนักศึกษา:</td>
<td><?=$code_st?></td>
<td>&nbsp;</td>
</tr>
<tr>
<td>section:</td>
<td><?=$section?></td>
<td>&nbsp;</td>
</tr>
<tr>
<td>วันที่ทำส่ง:</td>
<td><?=$time_start?></td>
<td>&nbsp;</td>
</tr>
<tr>
<td>โจทย์:</td>
<td><?=$question?></td>
<td>&nbsp;</td>
</tr>
<tr>
<td height="326">Code ที่ส่ง:</td>
<td><textarea name="textarea2" id="textarea2" cols="70" rows="20" readonly="readonly"><?=$code?>
</textarea></td>
<td><label></label></td>
</tr>
<tr>
<td>Comment:
<label> </label></td>
<td><?=$comment?></td>
<td>&nbsp;</td>
</tr>
<tr>
<td>คะแนน</td>
<td><?=$result?></td>
<td>&nbsp;</td>
</tr>
<tr>
<td>วันที่ตรวจ</td>
<td><?=displaydate($check_date)?></td>
<td><label></label></td>
</tr>
</table>
<p>&nbsp;</p>
</form>

<? require "_footer.php"; ?>
</html>
