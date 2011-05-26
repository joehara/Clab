<?
include "../chksession.php";

if ($sess_table<>admin) {
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
$year=$record[year];
$teach=$record[teach];
$email=$record[email];
$phone=$record[phone];
$address=$record[address];
$permission=$record[permission];
$reg_date=$record[st_reg];
?>
<HTML>
<? require "_header.php"; ?>

<center>
<h1>:: Edit Student ::</h1></center><br><br>
<p><a href="main.php">Back Main</a>&gt;<a href="mstudent.php"> Student Management</a>&gt; Edit Student</p><br>

<FORM METHOD="POST" ACTION="editstudent2.php?id_edit=<?=$id_edit;?>">
  <TABLE CELLSPACING="2">
    <TR> 
<TD><B>code student : </B></TD>
<TD><?=$code?>   [ <a href="resetpwst.php?id_edit=<?=$id_edit;?>&code_st=<?=$code?>">reset password</a> ]</TD>
	</TR>
    <TR> 
      <TD><B>name-sername : </B></TD>
	<TD><INPUT NAME="name" TYPE="text" VALUE="<?=$name?>" SIZE="26"></TD>
    </TR>
    <TR> 
      <TD><B>section : </B></TD>
	<TD><select name="section" id="province">
      <? 
     $sql="select * from section ";  
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
      <TD><strong>ปีการศึกษา :</strong></TD>
      <TD><select name="year" id="year">
        <? 
     $sql2="select * from academic_year ";  
     $result2=mysql_db_query($dbname,$sql2);
     while($rs2=mysql_fetch_array($result2)){  
 if($year==$rs2[Academic_detail]){
	 $sel = "selected";
	 }else{
	 $sel = "";
	 }
	        echo" <option value=\"$rs2[Academic_detail]\" $sel>
          $rs2[Academic_detail]
          </option>";
		  }
		  ?>
      </select></TD>
    </TR>
    <TR>
      <TD><strong>อาจารย์ผู้สอน</strong></TD>
      <TD><select name="teach" id="teach">
        <? 
     $sql3="select * from teacher ";  
     $result3=mysql_db_query($dbname,$sql3);
     while($rs3=mysql_fetch_array($result3)){  
 if($tech==$rs3[name]){
	 $sel = "selected";
	 }else{
	 $sel = "";
	 }
	        echo" <option value=\"$rs3[name]\" $sel>
          $rs3[name]
          </option>";
		  } ?>
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
      <TD VALIGN="top"><strong>Address :</strong></TD>
      <TD><TEXTAREA NAME="address" COLS="35" ROWS="3"><?=$address?></TEXTAREA></TD>
    </TR>
    <TR>
      <TD><strong>Register โดย</strong></TD>
      <TD><? 
	  if ($permission==1)
	  echo"<span class=\"style3\">สมัครผ่านหน้าเว็บ</span>";
	  else if($permission==2)
	  echo"<span class=\"style2\">admin บันทึกข้อมูล</span>";
	  ?>&nbsp;</TD>
    </TR>
    <TR>
      <TD><B>Register Date :</B></TD>
      <TD><? if($reg_date==0){
	  echo"บันทึกข้อมูลจากการ upload file";
	  }else{ echo displaydate($reg_date) ; }?></TD>
    </TR>
    <TR> 
      <TD>&nbsp;</TD>
      <TD><INPUT TYPE="Submit" VALUE="Submit"> <INPUT TYPE="Reset" VALUE="Reset"></TD>
    </TR>
  </TABLE>
</FORM>
<? mysql_close(); ?>
<? require "_footbar.php"; ?>
</HTML>
