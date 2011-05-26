<? 
include "../chksession.php";
if ($sess_table<>teacher) {
	header( "Location: /Clab/index.html"); 	exit();
}
$id=$_GET[id_edit];
$lesson=$_GET[lesson];

include "../connect.php";
$sql="select  count(*) as no from proposition where ref_lesson='$lesson'";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);

$code=$record[no];
$code++;

mysql_close();
?>

<HTML>
<? require "_header.php"; ?>

[ <a href="proposition.php?id=<?=$id?>&lesson=<?=$lesson?>">Back Question</a> ][ <a href="main.php">Back Main</a> ]
<br>

<form method="post" action="adquestion2.php?id_edit=<?=$id?>&lesson=<?=$lesson?>"><br>

<br>
<table style="text-align: left; width: 652px; height: 738px;" border="0" cellpadding="2" cellspacing="2">
  <tbody>
    <tr>
      <td style="vertical-align: top;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br>      </td>
      <td style="vertical-align: top; text-align: center;">:: Add
Question <?=$code?><INPUT name="no" type="hidden" value="<?=$code?>">::<br>
        <br>
โจทย์คำถามภาษาไทยและคำบรรณยายที่ต้องการให้แสดงโชว์<br>
        <br></td>
      <td style="vertical-align: top;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <br>      </td>
    </tr>
    <tr>
        <td style="vertical-align: top;"><br>        </td>
        <td style="vertical-align: top;"><textarea cols="80" rows="20" name="question" class="ckeditor"></textarea></td>
        <td style="vertical-align: top;"><br>        </td>
      </tr>
<tr>
      <td style="vertical-align: top;"><br>      </td>
      <td style="vertical-align: top;"><br>
แสดงตารางใส่ Code ในตารางด้านล่างนี้
        <br>
        <textarea id="student_code" cols="80" rows="20" name="help" >

#include&lt;stdio.h&gt;
int main(){

//type your code here
return 0;
}
        </textarea>
        <br></td>
      <td style="vertical-align: top;"><br>      </td>
    </tr>
    <tr>
      <td style="vertical-align: top;">&nbsp;</td>
      <td style="vertical-align: top; text-align: center;"><div align="left" class="style2">ข้อนี้จัดอยู่ในกลุ่มที่ &nbsp;
        <label>
        <input type="radio" name="level" id="hard" value="1">
        </label>
      HARD &nbsp;&nbsp;
      <label>
      <input name="level" type="radio" id="easy" value="easy" checked>
      </label>
      &nbsp;EASY</div></td>
      <td style="vertical-align: top;">&nbsp;</td>
    </tr>
    <tr>
      <td style="vertical-align: top;"><br>      </td>
      <td style="vertical-align: top; text-align: center;"><INPUT TYPE="Submit" VALUE="ADD"></button><br>      </td>
      <td style="vertical-align: top;"><br>      </td>
    </tr>
  </tbody>
</table>
</form>

<? require "_footer.php"; ?>
</html>
