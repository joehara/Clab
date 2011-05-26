<?php
header("Content-Type content=text/html; charset=UTF-8");
include"../function.php";
include "../connect.php";
include "../chksession.php";
$id_question=$_POST[id_question];
$ref_student=$_POST[ref_student];

$help=$_POST[help]; 

$code = randomToken(5);
$handle = fopen("$code.c", 'w');
if($handle){

    if(!fwrite($handle,$help))  die("couldn't write to file."); 
shell_exec("gcc  $code.c -o $code");
$output = shell_exec("./$code");

}
unlink("$code.c");
unlink($code);

$help2 = htmlspecialchars($help, ENT_QUOTES);

?>
<html>
<? require "_header.php"; ?>
<h1>:: Result Compile ::</h1> <br><br><br>
[ <a href="golesson.php?id_question=<?=$id_question?>&amp;ref_student=<?=$ref_student?>">Edit Answer</a> ][ <a href="main_lesson.php?lesson=<?=$ref_lesson?>">Back Question</a>]<br />
<form method="post" action="golesson3.php">
  <table width="100%" border="0">
    <tr>
      <td width="25%" height="77">&nbsp;</td>
      <td width="50%"><? 

if($output==""){
$output='Compile ERROR';
echo"<h>Compile ERROR</h>";

}else{
echo "$output";
}
?>
        <span class="style1">
        <input name="help" type="hidden" id="help" value="<?=$help2?>" />
      </span>
      <input name="output" type="hidden" id="output" value="<?=$output?>" />
      <input name="id_question" type="hidden" id="id_question" value="<?=$id_question?>" /></td>
      <td width="25%">&nbsp;</td>
    </tr>
    <tr>
      <td height="81">&nbsp;</td>
      <td>
        <span class="style1">
         
         <label>
         <input type="submit" name="button" id="button" value="SAVE" />
         </label>
        </span></td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <label></label>
</form>
<?
mysql_close();
?>
<? require "_footer.php"; ?>
</html>
