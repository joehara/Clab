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

<a href="main.php">Home</a>&gt;<a href="lesson.php"> แบบฝึกหัด</a>&gt;<a href="main_lesson.php?lesson=<?=$ref_lesson?>"> คำถามบททที่ <?=$lesson?></a>&gt; ตอบคำถาม
<br>
<form method="post" action="golesson3.php">
  <table width="100%" border="0">
  <tr>
    <td width="25%">&nbsp;</td>
    <td><center><h1>ตอบคำถาม<h1></center></td>
    <td width="25%">&nbsp;</td>
  </tr>
  <tr>
    <td height="40">&nbsp;</td>
    <td> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;โจทย์ ::
     
      <?=$question?><input type="hidden" name="id_question" value="<?=$id_question?>">
      <input name="ref_student" type="hidden" id="ref_student" value="<?=$ref_student?>"></td>
    <td>เวลาที่เริ่มทำ
	<? 
$sql2="select * from random where ref_question='$id_question' and ref_student='$ref_student'";
$result2=mysql_db_query($dbname,$sql2);
$record=mysql_fetch_array($result2);
$time_random=$record[time_random];
if($time_random==0){
$time_random=date("y-m-d h:i:s");
$sql3="update  random set time_random='$time_random' where ref_question='$id_question' and ref_student='$ref_student'";
$result3=mysql_db_query($dbname,$sql3);

}else{
echo"$time_random<br>";

}
?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><p align="center" style="vertical-align: top;">Help<br>
          <textarea name="help" id="help" cols="70" rows="20"><?=$help;?>
          </textarea>
    </p>
      <p style="vertical-align: top;">&nbsp;</p></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="center"><span style="vertical-align: top; text-align: center;">
      <input type="submit" name="button" id="button" value="SAVE">
    </span></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>
  <label></label>
</p>
<p>&nbsp;</p>
</form>
<?
mysql_close();
?>
<? require "_footer.php"; ?>
</html>
