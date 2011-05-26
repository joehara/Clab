<?
 include "../chksession.php";
 include "../function.php";
if ($sess_table<>admin) {
	header( "Location: ../index.html"); 	exit();
}

$section=$_GET[section];
$question_id=$_GET[question_id];
$student_id=$_GET[id];

?>

<HTML>
<? require "_header.php"; ?>

<?
	include "../connect.php";
	$sql="select student.name,student.code_st,student.section,sendanswer.answer_id,proposition.proposition,sendanswer.code,check_answer.check_id,check_answer.code_comment,check_answer.result,check_answer.teacher_check,check_answer.check_date,student.student_id,proposition.ref_lesson from check_answer,sendanswer,proposition,student,  where (check_answer.ref_answer=sendanswer.answer_id and sendanswer.ref_question=proposition.question_id and sendanswer.ref_student=student.student_id) and sendanswer.ref_student='$student_id' and proposition.question_id='$question_id' ";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);

$check_id=$record[check_id];
$ans_id=$record[ans_id];
$name=$record[name];
$code_st=$record[code_st];
$section=$record[section];
$question=$record[proposition];
$code=$record[code];
$comment=$record[code_comment];
$result=$record[result];
$student_id=$record[student_id];
$lesson=$record[ref_lesson];
$teacher_check=$record[teacher_check];
$check_date=$record[check_date];
?>
    &nbsp;<br />
<a href="main.php">Home</a> &gt; <a href="m_scroll.php"> จัดการคะแนน</a>&nbsp;&gt;<a href="m_scroll_name.php?section=<?=$section?>"> รายชื่อที่ส่งงานเข้ามา</a>&gt;<a href="m_scroll_lesson.php?section=<?=$section?>&amp;id=<?=$student_id?>"> บทต่างๆที่ส่งเข้ามา</a>&gt;<a href="m_scroll_question.php?section=<?=$section?>&amp;id=<?=$student_id?>&amp;lesson=<?=$lesson?>"> ข้อต่างๆที่ส่งเข้ามา</a>&gt; ผลคะแนน</p><br>
<form id="form1" name="form1" method="post" action="m_scroll_result2.php">
  <table width="100%" border="0">
    <tr>
      <td width="10%">ชื่อผู้ส่ง :  </td>
      <td width="90%"><?=$name?>
      <input name="check_id" type="hidden" id="check_id" value="<?=$check_id?>" />
      <input name="ans_id" type="hidden" id="ans_id" value="<?=$ans_id?>" /></td>
    </tr>
    <tr>
      <td>รหัสนักศึกษา :</td>
      <td><?=$code_st?></td>
    </tr>
    <tr>
      <td>section:</td>
      <td><?=$section?></td>
    </tr>
    <tr>
      <td>วันที่ทำส่ง:</td>
      <td><?=$time_start?></td>
    </tr>
    <tr>
      <td>โจทย์:</td>
      <td><?=$question?></td>
    </tr>
    <tr>
      <td>Code ที่ส่ง:</td>
      <td><label>
        <textarea name="code" id="code" cols="70" rows="20" readonly="readonly"><?=$code?>
        </textarea><br>
      <span class="style2">ตัว code ไม่สามารถแก้ไขได้ครับ        </span></label></td>
    </tr>
    <tr>
      <td>Comment:
      <label> </label></td>
      <td><?=$comment?>
        <input name="comment1" type="hidden" id="comment1" value="<?=$comment?>" />
        <label>
        <input type="text" name="comment2" id="comment2" />
      <span class="style2">ใส่ comment ทุกครั้งที่มีการแก้ไขคะแนน        </span></label></td>
    </tr>
    <tr>
      <td>คะแนน</td>
      <td><label>
        <input name="result" type="text" id="result" value="<?=$result?>" size="5" />
      </label></td>
    </tr>
    <tr>
      <td>ผู้ตรวจ</td>
      <td><?=$teacher_check?></td>
    </tr>
    <tr>
      <td>วันที่ตรวจ</td>
      <td><?=displaydate($check_date)?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="button" id="button" value="แก้ไข" />
      </label></td>
    </tr>
  </table>
</form>

<? require "_footer.php"; ?>
</html>
