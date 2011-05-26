<? 
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}
$id=$_GET[id];
$lesson=$_GET[lesson];

include "../connect.php";
$sql="select * from proposition where question_id='$id' ";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);
$question=$record[proposition];
$help=$record[help];
$answer=$record[answer];
$level=$record[level];

if($level==1){
$check1="checked";
}else{
$check="checked";
}
mysql_close();
?>
<HTML>
<? require "_header.php"; ?>

[ <a href="proposition.php?id=<?=$id?>&lesson=<?=$lesson?>">Back Question</a> ][ <a href="main.php">Back Main</a> ]
  
<br>

<form method="post" action="edquestion2.php?id=<?=$id?>&lesson=<?=$lesson?>"><br>

<br>
<table style="text-align: left; width: 652px; height: 738px;" border="0" cellpadding="2" cellspacing="2">
  <tbody>
    <tr>
      <td style="vertical-align: top;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br>      </td>
      <td style="vertical-align: top; text-align: center;">:: Edit
Question ::<br>
        <br>
&#3650;&#3592;&#3607;&#3618;&#3660;&#3588;&#3635;&#3606;&#3634;&#3617;&#3616;&#3634;&#3625;&#3634;&#3652;&#3607;&#3618;&#3649;&#3621;&#3632;&#3588;&#3635;&#3610;&#3619;&#3619;&#3603;&#3618;&#3634;&#3618;&#3607;&#3637;&#3656;&#3605;&#3657;&#3629;&#3591;&#3585;&#3634;&#3619;&#3651;&#3627;&#3657;&#3649;&#3626;&#3604;&#3591;&#3650;&#3594;&#3623;&#3660;<br>
        <br></td>
      <td style="vertical-align: top;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <br>      </td>
    </tr>
    <tr>
        <td style="vertical-align: top;"><br>        </td>
        <td style="vertical-align: top;"><textarea cols="80" rows="20" name="question" class="ckeditor"><?=$question?></textarea></td>
        <td style="vertical-align: top;"><br>        </td>
      </tr>
<tr>
      <td style="vertical-align: top;"><br>      </td>
      <td style="vertical-align: top;"><br>
แสดงตารางใส่ Code ในตารางด้านล่างนี้
        <br>
        <textarea id="student_code" cols="80" rows="20" name="help" ><?=$help?></textarea>
        <br></td>
      <td style="vertical-align: top;"><br>      </td>
    </tr>
    <tr>
      <td style="vertical-align: top;">&nbsp;</td>
      <td style="vertical-align: top; text-align: center;"><div align="left"><span class="style3">ข้อนี้จัดอยู่ในกลุ่มที่ &nbsp;
            <label>
            <input type="radio" name="level" id="hard" value="1" <? echo"$check1";?>>
            </label>
HARD &nbsp;&nbsp;
<label>
<input name="level" type="radio" id="easy" value="easy" <? echo"$check"?> >
</label>
&nbsp;EASY</span></div></td>
      <td style="vertical-align: top;">&nbsp;</td>
    </tr>
    <tr>
      <td style="vertical-align: top;"><br>      </td>
      <td style="vertical-align: top; text-align: center;"><INPUT TYPE="Submit" VALUE="UP DATE"></button><br>      </td>
      <td style="vertical-align: top;"><br>      </td>
    </tr>
  </tbody>
</table>
</form>

<? require "_footer.php"; ?>
</html>
