<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: ../index.html"); 	exit();
}
?>
<html>
<head>
<title>Welcome</title>
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
        
    	<div id="templatemo_middle_column">
   <br>
<center><h1><u>Main Menu</u></h1></center>
<br><br>      
<center><table border="0">
<tr>
<td><center><a href="mstudent.php"><img src="../images/personal.png" alt="Management Student" /><br>Management Student</a></center></td>
<td><center><a href="mteacher.php"><img src="../images/user.png" alt="Management Teacher" /><br>Management Teacher</a></center></td>
<td><center><a href="m_lesson.php"><img src="../images/file_manager.png" alt="Management Lesson" /><br>Management Lesson</a></center></td>
</tr>
<tr>
<td><center><a href="m_scroll.php"><img src="../images/old_openofficeorg_calc.png" alt="Management Scroll" /><br>Management Scroll</a></center></td>
<td><center><a href="changepw.php"><img src="../images/password.png" alt="change password" /><br>Change Password</a></center></td>
<td><center><a href="../logout.php"><img src="../images/application_exit.png" alt="Logout" /><br>Logout</a></center></td>
</tr>
</table>
</center>  


   	  </div>
    	<!-- end of middle column -->
        
        <!-- start of right column -->

        <!-- end of right column -->

    </div>
	

	<!-- end of content -->
	<div id="templatemo_footer">
        <blockquote>
          <blockquote>
            <blockquote>
              <blockquote>
                <blockquote>
                  <blockquote>
                    <blockquote>
                      <p align="center">Copyright © 2010-2011<br>
                        <a href="http://www.kmutnb.ac.th">King Mongkut's University of Technology North Bangkok</p></a>
                    </blockquote>
                  </blockquote>
                </blockquote>
              </blockquote>
            </blockquote>
          </blockquote>
        </blockquote>
	</div>
    <div id="templatemo_footer_bottom"></div>

</div>
</div>
</body>
</html>
