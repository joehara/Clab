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
	$sql="select * from sendanswer,proposition,student  where (sendanswer.ref_question=proposition.question_id and sendanswer.ref_student=student.student_id) and sendanswer.ref_student='$student_id' and proposition.question_id='$question_id' ";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);

$check_id=$record[answer_id];
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
$year=$record[year];
$sendtime=$record[time_answer];
?>
    &nbsp;<br />
<a href="main.php">Home</a> &gt; <a href="m_scroll.php"> จัดการคะแนน</a>&nbsp;&gt;<a href="m_scroll_name.php?section=<?=$section?>"> รายชื่อที่ส่งงานเข้ามา</a>&gt;<a href="m_scroll_lesson.php?section=<?=$section?>&amp;id=<?=$student_id?>"> บทต่างๆที่ส่งเข้ามา</a>&gt;<a href="m_scroll_question.php?section=<?=$section?>&amp;id=<?=$student_id?>&amp;lesson=<?=$lesson?>"> ข้อต่างๆที่ส่งเข้ามา</a>&gt; ผลคะแนน</p><br>


<form id="form1" name="form1" method="post" action="m_score_result2.php">
  <input name="check_id" type="hidden" id="check_id" value="<?=$check_id?>" />
  <input name="ans_id" type="hidden" id="ans_id" value="<?=$ans_id?>" /></td>

<table width="100%" border="0">
    <tr>
      <td><b>รหัสนักศึกษา:</b> <?= $code_st ?></td>
      <td><b>ชื่อ:</b> <?= $name ?></td>
    </tr>
    <tr>
      <td><b>Section:</b> <?= $section ?></td>
      <td><b>ปีการศึกษา:</b> <?= $year ?></td>
    </tr>
    <tr>
      <td><b>วันที่ส่ง:</b> <?= $sendtime ?></td>
      <td><b>วันที่ตรวจ:</b> <?= $check_date ?></td>
    </tr>
    <tr>
      <td colspan=2><b>ผู้ตรวจ: </b><?=$teacher_check?></td>
    </tr>
    <tr><td colspan=2><?=$question?></td></tr>
    <tr>
      <td colspan=2><center>
        <textarea name="textarea2" id="student_code" cols="80" rows="20"><?= $code ?></textarea>
        </center>
      </td>
    </tr>
    <tr><td colspan=2>หมายเหตุ (อธิบายข้อผิดพลาดในโปรแกรม)</td></tr>
    <tr><td colspan=2><textarea cols="80" rows="10" name="comment2" class="ckeditor"><?= $comment ?></textarea><BR></td></tr>
      <tr>
      <td colspan=2><b>คะแนน: </b><input name="result" type="text" id="result" value="<?=$result?>" size="5" /></td>
      </tr>
    <tr>
      <td colspan=2><center><input type="submit" name="button" id="button" value="แก้ไข" /></center></td>
    </tr>
  </table>
</form>

<? require "_footer.php"; ?>
</html>
