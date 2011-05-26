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
<HEAD><TITLE>Edit Student</TITLE></HEAD>
<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
<link href="../templatemo_style.css" rel="stylesheet" type="text/css" />
<meta content="text/html; charset=utf-8" http-equiv="content-type">
<style type="text/css">
<!--
.style1 {font-size: 36px}
-->

</style>
</head>

<body>

<div id="templatemo_container">
   
    <div id="templatemo_header" >
   	  <div id="logosection"></div>
    	<div id="header">
        	<div class="title">
        	  <p class="style1">&nbsp;</p>
        	  <p>&nbsp;</p>
        	</div>

        </div>
	</div>
    
	<div id="templatemo_menu">
    	<div id="search">
	Welcome, <a href="changepw.php" style="color:#000000"><b><?=$sess_username?></b></a>&nbsp;&nbsp;<a href="../logout.php"><img src="../images/logout.gif" alt="Logout" /></a>
    	</div>
        <div id="menu">
            <ul>
                <li></li>
                <li><a href="about_us.php">About Us</a></li>
                <li><a href="contact_us.php">Contact Us</a></li>
            </ul>
        </div>
	</div>
    
    <!-- start of content -->
    
	<div id="templatemo_content">
    
    	<!-- start of left column -->
    
    	<div id="templatemo_left_column">        	

            <div id="leftcolumn_box01">
                <div class="leftcolumn_box01_top">
                    <h2>Menu</h2>
                </div>
                <div class="leftcolumn_box01_bottom">
                        <div class="form_row">
                        <label><a href="main.php" style="color:#FE9A2E"><b>[ Main ]</b></a></label><br><br>
 			<label><a href="mstudent.php" style="color:#FE9A2E"><b>[ Management Student ]</b></a></label><br><br>
			<label><a href="mteacher.php" style="color:#FE9A2E"><b>[ Management Teacher ]</b></a></label><br><br>
			<label><a href="m_lesson.php" style="color:#FE9A2E"><b>[ Management Lesson ]</b></a></label><br><br>
			<label><a href="m_scroll.php" style="color:#FE9A2E"><b>[ Management Score ]</b></a></label><br><br>
			<label><a href="changepw.php" style="color:#FE9A2E"><b>[ Change Password ]</b></a></label><br><br>

		
               </div> 
            </div>            	            
        </div>
        </div>
        <!-- end of left column -->
        
        <!-- start of middle column -->
        
    	<div id="templatemo_middle_column"><center>
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
</div>
</div>
</BODY>
</HTML>
