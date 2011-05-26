<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: ../index.html"); 	exit();
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

?>
<HTML>
<? require "_header.php"; ?>

<center>
<h1>แก้ไขบทเรียน</h1></center><br><br>
  <a href="main.php">&nbsp;Home</a>&gt;<a href="m_lesson.php"> จัดการบทเรียน</a>&gt; แก้ไขบทเรียน<br>
  <br>
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
        <td class="style3">สุ่มข้อยาก</td>
        <td><select name="hard" id="hard">
        <option value="<?php echo $hard;?>"><?php echo $hard;?></option>
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
          &nbsp;&nbsp;<span class="style3">ข้อ </span></td>
      </tr>
      <tr>
        <td class="style3">สุ่มข้อง่าย</td>
        <td><select name="easy" id="easy">
        <option value="<?php echo $easy;?>"><?php echo $easy;?></option>
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
          &nbsp;<span class="style3">&nbsp;ข้อ</span></td>
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
