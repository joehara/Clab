<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: /Clab/index.html"); 	exit();
}
?>
<HTML>
<HEAD><TITLE>Import Student From File</TITLE></HEAD>
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
<h1>:: Import student from file ::</h1><br></center>
<p><a href="main.php">Back Main</a>&gt;<a href="mstudent.php"> Student Management</a>&gt; Import student from file</p><br><br>
<table border="0">
<tr>
<tr><td><center><b>วิธีการนำข้อมูลนักเรียนเข้า database</b></center></td></tr>
<tr><td>1.download file ต้นฉบับ นามสกุล CSV &nbsp;&nbsp;<a href="EXEM/Book1.csv">download here</a></td></tr>
<tr><td>2.เปิด file โดยใช้ โปรแกรม  OpenOffice Spreadsheet</td></tr>
<tr><td>3.พิมพ์ข้อมูลโดยพิมพ์เรียงลงมาทีละแถวดังตัวอย่าง ของไฟล์ต้นฉบับ โดยข้อมูลต้องเรียงตามลงมา</td></tr>
<tr><td>4. Save โดย Save ให้เป็น นามสกุล CSV ตามเดิม</td></tr>
<tr><td>5.Browse ข้อมูลจากปุ่มด้านล่าง แล้วเลือกไฟล์ที่ทำการ Save ไว้</center></td></tr>
<tr><td>
  <input name="fileCSV" type="file" id="fileCSV"><br>
  <input name="btnSubmit" type="submit" id="btnSubmit" value="Submit">

</td></tr>
<tr><td>6. ทำการกด submit จะขึ้นข้อความว่า import successful<br><br></td>
</tr></tr>
</table>
</form>
</div></div>
</body>
</html>
