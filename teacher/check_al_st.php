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
$check_date=$record[check_date];
$sendtime=$record[time_answer];
$year=$record[year];

if ($comment == '') {
        $comment = 'ไม่มี';
}
?>
    &nbsp;<br />


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
      <td colspan=2><b>คะแนน:</b> <?=$result?></td>
    </tr>
    <tr><td colspan=2><?=$question?></td></tr>
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
