<?
 include "../chksession.php";
if ($sess_table<>student) {
	header( "Location: ../index.html"); 	exit();
}
?>
<HTML>
<? require "_header.php"; ?>

<?

$check_id=$_GET[check_id];
$id=$_GET[id];


include "../connect.php";
$sql="select * from sendanswer,proposition,student  where sendanswer.ref_question=proposition.question_id and sendanswer.ref_student=student.student_id  and sendanswer.ref_question='$check_id' and student.student_id=$id";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);

$name=$record[name];
$code_st=$record[code_st];
$section=$record[section];
$question=$record[proposition];
$code=$record[code];
$comment=$record[code_comment];
$result=$record[result];
$student_id=$record[student_id];
$lesson=$record[ref_lesson];
$sendtime=$record[time_answer];
if ($comment == '') {
	$comment = 'ไม่มี';
}
?>
    &nbsp;<br />
[ <a href="result_question.php?student_id=<?=$student_id?>&lesson=<?=$lesson?>">Back Question Detail</a> ]</p>


  <table width="100%" border="0">
    <tr>
      <td><b>เวลาที่ส่ง:</b> <?= $sendtime ?></td>
      <td><b>คะแนน:</b> <?=$result?></td>
    </tr>
    <tr><td colspan=2><b>คำถาม:</b> <?=$question?></td></tr>
    <tr>
      <td colspan=2><center>
        <textarea name="textarea2" id="student_code" cols="80" rows="20"><?= $code ?></textarea>
	</center>
      </td>
    </tr>
    <tr>
      <td colspan=2><BR><B>หมายเหตุ:</B><BR><center><table width=85% bgcolor=#5555CC><tr><td><?=$comment?></td></tr></table></center></td>
    </tr>
  </table>

<? require "_footer.php"; ?>
</html>
