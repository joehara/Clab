<?
include "../chksession.php";
include "../function.php";
include "../connect.php";
if ($sess_table<>admin) {
	header( "Location: ../index.html"); exit();
}

?>
<HTML>
<HEAD><TITLE>Add Student</TITLE></HEAD>
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
 			<label><a href="mstudent.php" style="color:#FE9A2E"><b>[  Student Management ]</b></a></label><br><br>
			<label><a href="mteacher.php" style="color:#FE9A2E"><b>[  Teacher Management ]</b></a></label><br><br>
			<label><a href="m_lesson.php" style="color:#FE9A2E"><b>[  Lesson Management ]</b></a></label><br><br>
			<label><a href="m_scroll.php" style="color:#FE9A2E"><b>[  Score Management ]</b></a></label><br><br>
			<label><a href="changepw.php" style="color:#FE9A2E"><b>[ Change Password ]</b></a></label><br><br>

		
               </div> 
            </div>            	            
        </div>
        </div>
        <!-- end of left column -->
        
        <!-- start of middle column -->
        
    	<div id="templatemo_middle_column"><center>
<p><h1>:: Add Student ::</h1></center><br>
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
</div>
</div>
</BODY>
</HTML>
