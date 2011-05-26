<?
include "../chksession.php";
include "../function.php";
if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}
$ans_id=$_GET[ans_id];
?>
<HTML>
<? require "_header.php"; ?>


<center>
<h1>ตรวจข้อสอบ</h1><br>
<?	
include "../connect.php";

$sql="select * from sendanswer,proposition,headlesson,student,time_fix where  sendanswer.ref_question=proposition.question_id and sendanswer.ref_student=student.student_id and proposition.ref_lesson=headlesson.lesson and sendanswer.answer_id='$ans_id'";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);

$student_id=$record[student_id];
$name=$record[name];
$code_st=$record[code_st];
$section=$record[section];
$time_answer=$record[time_answer];
$question=$record[proposition];
$head=$record[detail];
$lesson=$record[ref_lesson];
$code=$record[code];
$year=$record[year];
$answer_code=$record[answer_code];

$sql="select * from teacher where username='$sess_username'";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);
$teacher_name=$record[name];

?><br>
[<a href="main.php"> Back Main</a> &gt; <a href="mstudent.php">manage student</a> &gt; <a href="report.php"> Section ที่ส่งงานเข้ามา</a> &gt; <a href="report2.php?lesson=<?=$lesson?>&amp;section=<?=$section?>">บทที่ส่งงานเข้ามา</a> &gt;<a href="question_report.php?lesson=<?=$lesson?>&amp;section=<?=$section?>">ผู้ส่งข้อสอบ</a>&gt;<a href="question_report2.php?id=<?=$student_id?>&amp;lesson=<?=$lesson?>&amp;section=<?=$section?>">โจทย์ที่ทำส่ง</a>&gt;รายละเอียด</center>
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<form id="form1" name="form1" method="post" action="question_check2.php">
<input name="ans_id" type="hidden" id="ans_id" value="<?=$ans_id?>" />
<input name="teacher_name" type="hidden" id="teacher_name" value="<?=$teacher_name?>" />
<input name="section" type="hidden" id="section" value="<?=$section?>" />
<br>
  <table width="100%" border="0">

    <tr>
       <td><b>รหัสนักศึกษา:</b> <?=$code_st?></td>
       <td><b>ชื่อผู้ส่ง:</b> <?=$name?></td>    
    </tr>
    <tr>
      <td><b>ปีการศึกษา:</b> <?=$year?></td>
      <td><b>Section:</b> <?=$section?></td>
    </tr>
    <tr>
      <td colspan=2><b>บทที่ <?=$lesson?>:</b> <?=$head?> </td>
    </tr><tr>
      <td colspan=2><b>วันที่ทำส่ง:</b>
      <?
	  $sql="select time_finish from time_fix where fix_sec='$section' and fix_year='$year' and ref_lesson='$lesson'";
	$result=mysql_db_query($dbname,$sql);
	if(mysql_num_rows($result) > 0) {
		$time_finish = mysql_result($result,0,0);
		if(DateDiff($time_answer,$time_finish)<0){
			echo"<font color=red>$time_answer (ส่งช้า)</font>";
		} else {
			echo"$time_answer";
		}
	} else {
		echo "มีปัญหาขัดข้องกับระบบฐานข้อมูล";	
	}
       ?></td>
    </tr>
    <tr>
      <td colspan=2><BR><?=$question?></td>
    </tr>
    <tr>
      <td colspan=2><center>
        <textarea id="student_code" cols="80" rows="20" name="help" ><?= $code?>
        </textarea>
	</center>
        <BR>
      </td>
    </tr>
    <tr><td colspan=2>หมายเหตุ (อธิบายข้อผิดพลาดในโปรแกรม)</td></tr>
    <tr><td colspan=2><textarea cols="80" rows="10" name="code_comment" class="ckeditor"></textarea><BR></td></tr>



      <tr>
      <td><center>
        <b>คะแนน :</b> <input type="text" name="point" id="point" />
	</center>
      </td>
      <td><center><input type="submit" name="button" id="button" value="บันทึกคะแนน" /></center></td>
    </tr>
  </table>
  
</form>

<? require "_footer.php"; ?>
</html>
