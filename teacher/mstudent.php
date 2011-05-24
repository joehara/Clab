<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}
?>
<HTML>
<HEAD><TITLE>Management Student</TITLE></HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
<link href="../templatemo_style.css" rel="stylesheet" type="text/css" />
<meta content="text/html; charset=TIS-620" http-equiv="content-type">
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
	Welcome, <a href="showprofile.php" style="color:#000000"><b><?=$sess_username?></b></a>&nbsp;&nbsp;<a href="../logout.php"><img src="../images/logout.gif" alt="Logout" /></a>
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
			<label><a href="showlesson.php" style="color:#FE9A2E"><b>[ add/edit lesson ]</b></a></label><br><br>
			<label><a href="showprofile.php" style="color:#FE9A2E"><b>[ Show Profile ]</b></a></label><br><br>
		
               </div> 
            </div>            	            
        </div>
        </div>
        <!-- end of left column -->
        
        <!-- start of middle column -->
        
    	<div id="templatemo_middle_column"><center>
<H1>:: Manage Student ::</H1><br><br></center>
<p>[ <a href="main.php"> Main</a> &gt;  manage student<br>
</p>
<br>

<br><br>      
<center><table border="0">
<tr>
<td><center><a href="showstudent.php"><img src="../images/user_group_01.png" alt="show student/detail" /><br>show student/detail</a></center></td>
<td><center><a href="report.php"><img src="../images/check.png" alt="ตรวจข้อสอบที่มีการส่งเข้ามา" /><br>ตรวจข้อสอบที่มีการส่งเข้ามา</a></center></td>
<td><center><a href="check_al.php"><img src="../images/check_mark.png" alt="ข้อสอบที่ทำการตรวจแล้ว" /><br>ข้อสอบที่ทำการตรวจแล้ว</a></center></td>
<td><center><a href="fix_send.php"><img src="../images/clock4.png" alt="กำหนดเวลาในการส่งงาน" /><br>กำหนดเวลาในการส่งงาน</a></td>
<td><center><a href="report_scroll.php"><img src="../images/gtk_print_report.png" alt="รายงานผลคะแนน" /><br>รายงานผลคะแนน</a></center></td>
</tr>
</table>
</center>

<p>&nbsp;</p>
</div></div>
</BODY>
</HTML>
