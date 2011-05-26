<?
include "../chksession.php";
include "../function.php";
include "../connect.php";
if ($sess_table<>admin) {
	header( "Location: ../index.html"); exit();
}
?>

<html>
<? require "_header.php"; ?>
<center><h1>เพิ่มห้องเรียน</h1></center><br><br>
<a href="main.php">Home</a>&gt; <a href="mclass.php"> จัดการห้องเรียน</a>&gt; เพิ่มห้องเรียน<br><br><br>
<form id="form1" name="form1" method="post" action="add_section2.php">
<TR> 
      <TD><B>Section : </B></TD>
	<TD><select name="section" id="province"> 
 <? 
     $sql="select * from section ";  
     $result=mysql_db_query($dbname,$sql);
     while($rs=mysql_fetch_array($result)){  
 ?>  
  <option value="<?=$rs[section_name]?>" selected><?=$rs[section_name]?></option>  
 <?php } ?>      
                            </select>&nbsp;</TD>
    <td>
  <label>เพิ่มห้องเรียน
  <input type="text" name="add_section" id="add_section" />
  </label>
  <label>
  <input type="submit" name="button" id="button" value="Submit" />
  </label></td>
</TR>
</form>

<? require "_footer.php"; ?>
</html>
