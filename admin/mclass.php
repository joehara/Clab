<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: /Clab/index.html"); 	exit();
}
?>
<html>
<head>
<title>Class Management</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
<link href="/Clab/templatemo_style.css" rel="stylesheet" type="text/css" />
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
			<label><a href="mclass.php" style="color:#FE9A2E"><b>[  Class Management ]</b></a></label><br><br>
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
        
    	<div id="templatemo_middle_column">
   <br>
<center><h1><u>Class Management</u></h1></center>
<br><br> 
<p><a href="main.php">Back Main</a>&gt; <a href="mclass.php">Class Management</a></p><br><br><br>
<center><table border="0">
<tr>
<td><center><a href="add_section.php"><img src="/Clab/images/network_add.png" alt="Add Section" /><br>Add Section</a></center></td>
<td><center><a href="add_academic_year.php"><img src="/Clab/images/x_office_calendar.png" alt="Add Year" /><br>Add Year</a></center></td>

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
                      <p align="center">Copyright ยฉ 2010-2011<br>
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
