<? 
include "../chksession.php";
header("Content-Type content=text/html; charset=UTF-8");
if ($sess_table<>student) {
	header( "Location: /Clab/index.html"); 	exit();
}
$lesson=$_GET[lesson];
$id_question=$_GET[id_question];
$ref_student=$_GET[ref_student];
include "../connect.php";

$sql="select * from proposition where question_id='$id_question'";

$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);

$question=$record[proposition];
$help=$record[help];
$ref_lesson=$record[ref_lesson];

$sql="select * from sendanswer where ref_question='$id_question' and ref_student='$ref_student'";

$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);
$code=$record[code];

if($code!=""){
$help=$code;
}

?>
<HTML>
<? require "_header.php"; ?>
<center><h1>ตอบคำถาม</h1></center><br><br>
<a href="main.php">Home</a>&gt;<a href="lesson.php"> แบบฝึกหัด</a>&gt;<a href="main_lesson.php?lesson=<?=$ref_lesson?>"> คำถามบททที่ <?=$lesson?></a>&gt; ตอบคำถาม
<br><br><br>
<form method="post" action="golesson3.php">
  <table width="100%" border="0">
  <tr>
    <td><?=$question?><input type="hidden" name="id_question" value="<?=$id_question?>">
      <input name="ref_student" type="hidden" id="ref_student" value="<?=$ref_student?>">
    </td>
  </tr>
  <tr>
    <td><center>
         <textarea name="help" id="student_code" cols="80" rows="40"><?=$help;?></textarea>
        </center>
    </td>
  </tr>
  <tr>
    <td>
       <div align="center">
          <span style="vertical-align: top; text-align: center;">
             <input type="submit" name="button" id="button" value="ส่งคำตอบ">
          </span>
       </div>
   </td>
  </tr>
</table>
</form>
</center>
<?
mysql_close();
?>


<? require "_footer.php"; ?>
</html>
