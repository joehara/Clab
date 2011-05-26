<?
include "../chksession.php";
include "../function.php";
include "../connect.php";
if ($sess_table<>admin) {
	header( "Location: ../index.html"); exit();
}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<p><a href="main.php">Back Main</a>&gt; <a href="mclass.php">Class Management</a>&gt; Add Year</p><br><br><br>
<form id="form1" name="form1" method="post" action="add_academic_year2.php">
<TD><label>
<TD><B>ปีการศึกษา : </B></TD>
        <select name="year" id="province"> 
 <? 
     $sql2="select * from academic_year ";  
     $result2=mysql_db_query($dbname,$sql2);
     while($rs2=mysql_fetch_array($result2)){  
 ?>  
  <option value="<?=$rs2[Academic_detail]?>" selected><?=$rs2[Academic_detail]?></option>  
 <?php } ?>      
                            </select>
        
      </label></TD>
<td>
  <label>ADD ปีการศึกษา
  <input type="text" name="add_year" />
  </label>
  <label>
  <input type="submit" name="button" id="button" value="Submit" />
  </label></td>
</form>
</body>
</html>
