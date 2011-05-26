<?
 include "../chksession.php";
if ($sess_table<>student) {
	header( "Location: /Clab/index.html"); 	exit();
}
?>
<HTML>
<? require "_header.php"; ?>
 <?

  $check_id=$_GET[check_id];


	include "../connect.php";
	$sql="select * from check_answer,sendanswer,proposition,student,time_use  where check_answer.ref_answer=sendanswer.answer_id and sendanswer.ref_question=proposition.question_id and sendanswer.ref_student=student.student_id and time_use.ref_student=student.student_id and check_answer.check_id='$check_id'";
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
?>
    &nbsp;<br />
[ <a href="result_question.php?student_id=<?=$student_id?>&lesson=<?=$lesson?>">Back Question Detail</a> ]</p>
<form id="form1" name="form1" method="post" action="question_check2.php">
  <table width="100%" border="0">
    <tr>
      <td width="10%">Name :  </td>
      <td width="90%"><?=$name?>
      <input name="ref_answer" type="hidden" id="ref_answer" value="<?=$ans_id?>" />
      <input name="teacher_name" type="hidden" id="teacher_name" value="<?=$teacher_name?>" /></td>
    </tr>
    <tr>
      <td>Student ID :</td>
      <td><?=$code_st?></td>
    </tr>
    <tr>
      <td>Section:</td>
      <td><?=$section?></td>
    </tr>
     <tr>
      <td>เวลาที่ส่ง :</td>
      <td><?=$time_start?></td>
    </tr>
    <tr>
      <td>คำถาม :</td>
      <td><?=$question?></td>
    </tr>
    <tr>
      <td>Code ที่ส่ง :</td>
      <td><label>
        <textarea name="textarea2" id="textarea2" cols="45" rows="5"><?=$code?>
        </textarea>
      </label></td>
    </tr>
    <tr>
      <td>Comment:
      <label> </label></td>
      <td><?=$comment?></td>
    </tr>
    <tr>
      <td>Score :</td>
      <td><label>
        <?=$result?></label></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
<p>&nbsp;</p>
<br>

<? require "_footer.php"; ?>
</html>
