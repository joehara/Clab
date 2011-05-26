<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: /Clab/index.html"); 	exit();
}
$id_edit=$_GET[id_edit];
include "../connect.php";
$sql="select * from headlesson where id='$id_edit' ";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);
$lesson=$record[lesson];
$detail=$record[detail];
$hard=$record[hard];
$easy=$record[easy];
$time=$record[time];
?>
<HTML>
<? require "_header.php"; ?>

<center><h1>:: Edit Lesson::</h1></center><br><br>
  <a href="main.php">&nbsp;Back Main</a>&gt;<a href="showlesson.php">Manage Lesson</a>&gt;Edit Lesson<br><br>
  
  <form method="post" action="editlesson2.php?id_edit=<?=$id_edit;?>">
  <table border="0" cellpadding="2" cellspacing="2">
    <tbody>
      <tr>
        <td><span class="Apple-style-span" style="border-collapse: separate; color: rgb(0, 0, 0); font-family: 'Times New Roman'; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; font-size: medium;"><span class="Apple-style-span" style="">บทเรียนบทที่</span></span> </td>
        <td><?=$lesson?>
          <INPUT NAME="lesson" TYPE=HIDDEN id="lesson" value="<?=$lesson?>"></td>
      </tr>
      <tr>
        <td><table border="0" cellpadding="2" cellspacing="2">
          <tbody>
            <tr>
              <td><span class="Apple-style-span" style="border-collapse: separate; color: rgb(0, 0, 0); font-family: 'Times New Roman'; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; font-size: medium;">หัวข้อของบทเรียน<br>
              </span></td>
            </tr>
          </tbody>
        </table>
            <br class="Apple-interchange-newline">
        </td>
        <td><input name="h_lesson" id="h_lesson" value="<?=$detail?>"></td>
      </tr>
      <tr>
        <td class="style3"><strong>ให้นักศึกษาทำจากการสุ่ม</strong></td>
        <td class="style3">&nbsp;</td>
      </tr>
      <tr>
        <td class="style3">สุ่มข้อยาก จำนวน</td>
        <td><select name="hard" id="hard">
        <?
for($x=1;$x<=20;$x++) {
?>
<option value=<?=$x;?> <? if($x==$hard){echo "selected";} ?>><?=$x?></option>
<? } ?>
</select>

        
        &nbsp;&nbsp;<span class="style3">ข้อ </span></td>
      </tr>
      <tr>
        <td class="style3">สุ่มข้อง่าย จำนวน</td>
        <td><select name="easy" id="easy">
       <?
for($x=1;$x<=20;$x++) {
?>
<option value=<?=$x;?> <? if($x==$easy){echo "selected";} ?>><?=$x?></option>
<? } ?>
</select>
          &nbsp;<span class="style3">&nbsp;ข้อ</span></td>
      </tr>
      <tr>
        <td class="style3">เวลาในการทำ <? list($HH, $MM,$SS) = explode(':', $time);
		
		?> </td>
        <td>
          <select name="HH" id="HH">
                   <?
for($x=0;$x<=23;$x++) {
?>
<option value=<? echo"$x";?> <? if($x==$HH){echo "selected";} ?>><?  if($x<10){echo"0$x";}else{echo"$x";}?></option>
<? } ?>
</select>
          :
          <select name="MM" id="MM">
           <?
for($x=0;$x<=59;$x++) {
?>
<option value=<? echo"$x";?> <? if($x==$MM){echo "selected";} ?>><?  if($x<10){echo"0$x";}else{echo"$x";}?></option>
<? } ?>
</select> 
          <span class="style3">&nbsp;ชั่วโมง </span></td>
      </tr>
      <tr>
        <td><br>
        </td>
        <td><INPUT TYPE="Submit" VALUE="UPDATE">
            </button>
          <br>
        </td>
      </tr>
    </tbody>
  </table>
  </form>
<?
mysql_close();
?>

<? require "_footer.php"; ?>
</HTML>
