<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}

$id_edit=$_GET[id_edit];
include "../function.php";

include "../connect.php";
$sql="select * from student where student_id='$id_edit' ";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);

$code=$record[code_st];
$name=$record[name];
$section=$record[section];
$email=$record[email];
$phone=$record[phone];
$address=$record[address];
$reg_date=$record[st_reg];
?>
<HTML>
<? require "_header.php"; ?>

<center>
<H1>:: Edit Student :::</H1></center><br><br>

<FORM METHOD="POST" ACTION="editstudent2.php?id_edit=<?=$id_edit;?>">
  <TABLE CELLSPACING="2">
    <TR> 
    <TR> 
<TD><B>Student ID : </B></TD>
<TD><?=$code?>   [ <a href="resetpw.php?id_edit=<?=$id_edit;?>&code_st=<?=$code?>">reset password</a> ]</TD>
	</TR>
    <TR> 
      <TD><B>Name : </B></TD>
	<TD><INPUT NAME="name" TYPE="text" VALUE="<?=$name?>" SIZE="26"></TD>
    </TR>
    <TR> 
      <TD><B>Section : </B></TD>
	  <TD><select name="section" id="province">
        <? 
     $sql="select * from Section ";  
     $result=mysql_db_query($dbname,$sql);
     while($rs=mysql_fetch_array($result)){  
	 
	 if($section==$rs[section_name]){
	 $sel = "selected";
	 }else{
	 $sel = "";
	 }
	        echo" <option value=\"$rs[section_name]\" $sel>
          $rs[section_name]
          </option>";
         }
	 
	 
 ?>
 
 

      </select></TD>
    </TR>
    <TR> 
      <TD><B>Email : </B></TD>
      <TD><INPUT NAME="email" TYPE="text" VALUE="<?=$email?>" SIZE="26"> * </TD>
    </TR>
    <TR> 
      <TD><B>Telephone : </B></TD>
      <TD><INPUT NAME="phone" TYPE="text" VALUE="<?=$phone?>" SIZE="26"></TD>
    </TR>
    <TR> 
      <TD VALIGN="top"><B>Address :</B></TD>
      <TD><TEXTAREA NAME="address" COLS="35" ROWS="3"><?=$address?></TEXTAREA></TD>
    </TR>
    <TR>
      <TD><B>Register Date :</B></TD>
      <TD><?=displaydate($reg_date)?></TD>
    </TR>
    <TR> 
      <TD>&nbsp;</TD>
      <TD><INPUT TYPE="Submit" VALUE="Submit"> <INPUT TYPE="Reset" VALUE="Reset"></TD>
    </TR>
  </TABLE>
</FORM>
<BR>
[ <a href="main.php">Back Main</a> ] 
<? mysql_close(); ?>

<? require "_footer.php"; ?>
</HTML>
