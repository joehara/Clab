<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: ../index.html"); 	exit();
}
?>
<HTML>
<HEAD><TITLE>Change Password</TITLE></HEAD>
<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
<link href="../templatemo_style.css" rel="stylesheet" type="text/css" />
<meta content="text/html; charset=utf-8" http-equiv="content-type">
<style type="text/css">
<!--
.style1 {font-size: 36px}
-->
<form method="post" action="editlesson2.php?id_edit=<?=$id_edit;?>">
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
<h1>:: Change Password ::</h1></center><br><br>
<FORM METHOD=POST ACTION="changepw2.php">
  <TABLE cellspacing="2">
    <TR> 
      <TD>Username : </TD> <TD><?=$sess_username?></TD>
    </TR>
    <TR> 
      <TD>Old password : </TD><TD><INPUT name="oldpass" type="password"> * </TD>
    </TR>
    <TR> 
      <TD>New password: </TD><TD><INPUT name="newpass" type="password"> * </TD>
    </TR>
    <TR> 
      <TD>Comfirm password : </TD><TD><INPUT name="newpass2" type="password"> * </TD>
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
