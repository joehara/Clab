<?
include "../chksession.php";
if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}
include "../connect.php";
$sql="select  max(lesson) as lesson from headlesson";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);

$code=$record[lesson];
$code++;


?>
<HTML>

<? require "_header.php"; ?>

<center><h1>:: Add Lesson::</h1></center><br><br>
[<a href="showlesson.php">Back Show lesson</a> ]<br><br>
<form method="post" action="addlesson2.php">
  <table border="0" cellpadding="2" cellspacing="2">
    <tbody>
      <tr>
        <td width="183"><span class="Apple-style-span" style="border-collapse: separate; color: rgb(0, 0, 0); font-family: 'Times New Roman'; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; font-size: medium;"><span class="Apple-style-span" style="">บทที่</span></span>        </td>
        <td width="155"><?=$code?>
        <input name="lesson" type="hidden" id="lesson" value="<?=$code?>"></td>
      </tr>
      <tr>
        <td><span class="Apple-style-span" style="border-collapse: separate; color: rgb(0, 0, 0); font-family: 'Times New Roman'; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; font-size: medium;"><table border="0" cellpadding="2" cellspacing="2"><tbody><tr><td>ชื่อบท<br></td></tr></tbody></table></span><br class="Apple-interchange-newline">        </td>
        <td><input name="h_lesson"></td>
      </tr>
      <tr>
        <td class="style2" colspan=2><strong>ให้นักศึกษาทำแบบฝึกหัดในบทนี้จาก : </strong></td>
      </tr>
      <tr>
        <td class="style3">สุ่มจากข้อยาก</td>
        <td><select name="hard" id="hard">
          <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
                </select> 
          &nbsp;&nbsp;<span class="style3">ข้อ</span></td>
      </tr>
      <tr>
        <td class="style3">สุ่มจากข้อง่าย</td>
        <td><select name="easy2" id="easy2">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
          </select>
          &nbsp;<span class="style3">ข้อ</span></td>
      </tr>
      <tr>
        <td></td>
        <td><br><INPUT TYPE="Submit" VALUE="Add"> </td>
      </tr>
    </tbody>
  </table>
</form>
<?
mysql_close();
?>

<? require "_footer.php"; ?>
</html>


