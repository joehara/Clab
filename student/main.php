<?
include "../chksession.php";
if ($sess_table<>student) {
	header( "Location: /Clab/index.html"); 	exit();
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome</title>
<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
<link href="/Clab/templatemo_style.css" rel="stylesheet" type="text/css" />
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
	Welcome, <a href="showprofile.php" style="color:#000000"><b><?=$sess_username?></b></a>&nbsp;&nbsp;
    	</div>
        <div id="menu">
            <ul>
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
 			<label><a href="lesson.php" style="color:#FE9A2E"><b>[ Lesson ]</b></a></label><br><br>
			<label><a href="showprofile.php" style="color:#FE9A2E"><b>[ Show Profile ]</b></a></label><br><br>
		<a href="/Clab/logout.php"><img src="/Clab/images/logout.gif" alt="Logout" /></a>
                </div>            
            	</div>            
		</div>
        </div>
        <!-- end of left column -->
        
        <!-- start of middle column -->
        
    	<div id="templatemo_middle_column">
<? include"../connect.php";
		$sql="select * from student where code_st='$sess_username'";
		$result=mysql_db_query($dbname,$sql);
		$record=mysql_fetch_array($result);
		$password=base64_decode($record[password]);

		if($password=='1234'){
		echo"<span style=\"color: rgb(255, 0, 0);\">password ของคุณยังเป็นค่าเดิมครับ กรุณาเปลี่ยน  password</span>";}?>
<br><br><br><br>
<center><h1><u>Main Menu</u></h1></center>
<br><br>      
<center><table border="0">
<tr>
<td><center><a href="lesson.php"><img src="/Clab/images/report_check.png" alt="Lesson" /><br><b>Lesson</b></a></center></td>
<td><center><a href="showprofile.php"><img src="/Clab/images/summer_user.png" alt="Show Profile" /><br><b>Show Profile</b></a></center></td>
<td><center><a href="../logout.php"><img src="/Clab/images/application_exit.png" alt="Logout" /><br><b>Logout</b></a></center></td>
</tr>
</table>
</center>            	
        	
        	
   	  </div></div>
    	<!-- end of middle column -->
        
        <!-- start of right column -->

        <!-- end of right column --> 
	
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
