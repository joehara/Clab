<?
include "../chksession.php";
include "../function.php";
include "../connect.php";
if ($sess_table<>admin) {
	header( "Location: ../index.html"); exit();
}
?>
<HTML>
<? require "_header.php"; ?>

<center>
<h1>:: Add Student ::</h1></center><br>
<p><a href="main.php">Back Main</a>&gt;<a href="mstudent.php"> Student Management</a>&gt; Add Student</p><br>

<FORM METHOD="POST" ACTION="addstudent2.php">
  <TABLE CELLSPACING="2">
    <TR> 
<TD><B>Student ID : </B></TD><TD><input name="codest" type="text"></TD>
	</TR>
<TR>
      <TD><B>Name : </B></TD>
	<TD><INPUT NAME="namest" TYPE="text"  SIZE="26"></TD>
    </TR>
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
    </TR>
    <TR>
      <TD><strong>ปีการศึกษา :</strong></TD>
      <TD><label>
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
    </TR>
    <TR>
      <TD><strong>อาจารย์ผู้สอน</strong></TD>
      <TD><label>
       <select name="teach" id="province"> 
 <? 
     $sql3="select * from teacher ";  
     $result3=mysql_db_query($dbname,$sql3);
     while($rs3=mysql_fetch_array($result3)){  
 ?>  
  <option value="<?=$rs3[name]?>" selected><?=$rs3[name]?></option>  
 <?php } ?>      
                            </select>
      </label></TD>
    </TR>
    <TR> 
      <TD><B>Email : </B></TD>
      <TD><INPUT NAME="email_st" TYPE="text"  SIZE="26"> * </TD>
    </TR>
    <TR> 
      <TD><B>Telephone : </B></TD>
      <TD><INPUT NAME="phone_st" TYPE="text"  SIZE="26"></TD>
    </TR>
    <TR> 
      <TD VALIGN="top"><B>Address :</B></TD>
      <TD><TEXTAREA NAME="address_st" COLS="35" ROWS="3"></TEXTAREA></TD>
    </TR>
    <TR>
      <TD></TD>
      <TD></TD>
    </TR>
    <TR> 
      <TD>&nbsp;</TD>
      <TD><INPUT TYPE="Submit" VALUE="Submit"> <INPUT TYPE="Reset" VALUE="Reset"></TD>
    </TR>
  </TABLE>
</FORM>

<? require "_footer.php"; ?>
</HTML>
