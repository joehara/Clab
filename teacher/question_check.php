<?
include "../chksession.php";
include "../function.php";
if ($sess_table<>teacher) {
	header( "Location: /Clab/index.html"); 	exit();
}
$ans_id=$_GET[ans_id];
?>
<HTML>
<? require "_header.php"; ?>

<center>
<?	
include "../connect.php";

$sql="select * from sendanswer,proposition,headlesson,student,time_use,time_fix where  sendanswer.ref_question=proposition.question_id and sendanswer.ref_student=student.student_id and proposition.ref_lesson=headlesson.lesson and sendanswer.answer_id='$ans_id'";
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
<br>
  <table width="63%" border="0">
    <tr>
      <td width="18%">ชื่อผู้ส่ง :  </td>
      <td width="82%"><?=$name?>
        <input name="ans_id" type="hidden" id="ans_id" value="<?=$ans_id?>" />
      <input name="teacher_name" type="hidden" id="teacher_name" value="<?=$teacher_name?>" /></td>
    </tr>
    <tr>
      <td>รหัสนักศึกษา :</td>
      <td><?=$code_st?></td>
    </tr>
    <tr>
      <td>section:</td>
      <td><?=$section?>
      <input name="section" type="hidden" id="section" value="<?=$section?>" />
      ปีการศึกษา
      <?=$year?></td>
    </tr>
    <tr>
      <td>วันที่ทำส่ง:</td>
      <td><?
	  $sql="select time_finish from time_fix where fix_sec='$section' and fix_year='$year' and ref_lesson='$lesson'";
	$result=mysql_db_query($dbname,$sql);
	if(mysql_num_rows($result) > 0) {
		$time_finish = mysql_result($result,0,0);
		if(DateTimeDiff($time_finish,$time_answer)<0){
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
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>บทเรียน</td>
      <td>บทที่ <?=$lesson?> เรื่อง <?=$head?> </td>
    </tr>
    <tr>
      <td>โจทย์:</td>
      <td><?=$question?></td>
    </tr>
    <tr>
      <td>Code ที่ส่ง:</td>
      <td><label>
        <textarea id="student_code" cols="80" rows="20" name="help" ><?=$code?>
        </textarea>
        </label></td>
    </tr>
      <tr>
      <td>คะแนน</td>
      <td><label>
        <input type="text" name="point" id="point" />
      <span class="style3">Ex. 9/10        </span></label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="button" id="button" /></td>
    </tr>
  </table>
  
</form>

<? require "_footer.php"; ?>
</html>
