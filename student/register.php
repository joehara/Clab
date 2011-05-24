<?

include "../function.php";

$codepw =1234; 
?>
<HTML>
<HEAD><TITLE>Registration</TITLE>
<link href="/Clab/templatemo_style2.css" rel="stylesheet" type="text/css" />
<meta content="text/html; charset=UTF-8" http-equiv="content-type">
</HEAD>
<body>
<FORM METHOD="POST" ACTION="register2.php"> 

<center>
<img src="/Clab/images/templatemo_heading_background.jpg" width="690" height="146"></center><br><br><br>
<center><h1>Registration Student</h1></center><br>


  <center><TABLE CELLSPACING="2" style="background-color:#FFE4C4;">
    <TR> 
<TD>code student : </TD><TD><input name="codest" type="text"></TD>
	</TR>
<TR>
      <TD>name-sername : </TD>
	<TD><INPUT NAME="namest" TYPE="text"  SIZE="26"></TD>
    </TR>
    <TR> 
      <TD>section : </TD>
	<TD><select name="section" id="province">
      <? 
	  include "../connect.php";
     $sql="select * from Section ";  
     $result=mysql_db_query($dbname,$sql);
     while($rs=mysql_fetch_array($result)){  
 ?>
       <option value="<?=$rs[section_name]?>" selected><?=$rs[section_name]?></option>  
 <?php } ?>      
                            </select></TD>
     </TR>
    <TR>
      <TD>ปีการศึกษา :</TD>
      <TD><select name="year" id="year">
        <? 
     $sql2="select * from Academic_year ";  
     $result2=mysql_db_query($dbname,$sql2);
     while($rs2=mysql_fetch_array($result2)){  
 ?>
         <option value="<?=$rs2[Academic_detail]?>" selected><?=$rs2[Academic_detail]?></option>  
 <?php } ?>      
                            </select>
      </label></TD>
    </TR>
    <TR>
      <TD>อาจารย์ผู้สอน : </TD>
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
      <TD>Email : </TD>
      <TD><INPUT NAME="email_st" TYPE="text"  SIZE="26"> * </TD>
    </TR>
    <TR> 
      <TD>Telephone : </TD>
      <TD><INPUT NAME="phone_st" TYPE="text"  SIZE="26"></TD>
    </TR>
    <TR> 
      <TD VALIGN="top">Address : </TD>
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
  </TABLE></center>
</FORM>
<center>
<br>
<a href="main.php"><img src="/Clab/images/exit2.png"/><br>Quit</a>
</center>
<br><br>
<center><div id="templatemo_footer"><br>
copyright  20010-2011 College of Industrial Technology || King Mongkut's University of Technology North Bangkok
</div></center>
</div>
</div>
</BODY>
</HTML>
