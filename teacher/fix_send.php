<?
include "../chksession.php";

if ($sess_table<>teacher) {
        header( "Location: ../index.html");     exit();
}

include "../connect.php";
?>
<html>
<? require "_header.php"; ?>
<h1>กำหนดระยะเวลาในการส่งงาน<br></h1>
<a href="mstudent.php">Back</a>
<form name="form1" method="post" action="fix_send2.php">
  <table width="45%" border="0.5">
    <tr>
      <td width="38%">บทเรียน</td>
      <td width="62%"><select name="headlesson" id="headlesson">
        <? 
     $sql="select * from headlesson order by lesson asc";  
     $result=mysql_db_query($dbname,$sql);
$count=1;
     while($rs=mysql_fetch_array($result)){  
 ?>
        <option value="<?=$rs[lesson]?>" selected><? echo "บทที่ $count $rs[detail]";?></option>
        <?php 
$count++;} ?>
      </select></td>
    </tr>
    <tr>
      <td> &nbsp;Section</td>
      <td><select name="section" id="section">
        <? 
     $sql="select * from section ";  
     $result=mysql_db_query($dbname,$sql);
     while($rs=mysql_fetch_array($result)){  
 ?>
        <option value="<?=$rs[section_name]?>" selected>
        <?=$rs[section_name]?>
        </option>
        <?php } ?>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;&nbsp;ปีการศึกษา</td>
      <td><select name="year" id="province">
        <? 
     $sql="select * from academic_year ";  
     $result=mysql_db_query($dbname,$sql);
     while($rs=mysql_fetch_array($result)){  
 ?>
        <option value="<?=$rs[Academic_detail]?>" selected>
        <?=$rs[Academic_detail]?>
        </option>
        <?php } ?>
      </select></td>
    </tr>
    <tr>
      <td>กำหนดวันส่งงาน</td>
      <td>
      <input   id="dateInput"  type="input" name="time" value=""> &nbsp;
     
 </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><INPUT TYPE="Submit" VALUE="Submit"/></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
<table id="mytable" width="50%" border="1">
  <tr>
    <td width="12%"><div align="center">Section</div></td>
    <td width="14%"><div align="center">Year</div></td>
    <td width="60%"><div align="center">บทเรียน</div></td>
    <td width="28%"><div align="center">กำหนดเวลาที่ต้องส่ง</div></td>
  </tr>

<?

$sql="select * from time_fix ";
$result=mysql_db_query($dbname,$sql);
$num=mysql_num_rows($result);
if($num<=0){
echo "<tr><td>ยังไม่ได้กำหนดเวลาส่งงานของทุก Section</td></tr> ";
exit();
}
while($record=mysql_fetch_array($result)){
$sql2="select * from proposition,headlesson where proposition.ref_lesson=headlesson.lesson and ref_lesson='$record[ref_lesson]' ";
$result2=mysql_db_query($dbname,$sql2);
$record2=mysql_fetch_array($result2);

echo"

<tr>
<td>$record[fix_sec]</td><td>$record[fix_year]</td><td>บทที่ $record[ref_lesson] $record2[detail]</td><td>$record[time_finish]</td>
</tr>";
}
?>
<p>&nbsp;</p>
</table>

<? require "_footer.php"; ?>
</html>
