<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}
?>
<HTML>
<HEAD><TITLE>Import student from file</TITLE></HEAD>
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
		<form action="phpCSVMySQLUpload.php" method="post" enctype="multipart/form-data" name="form1">
     	            
        </div>
        </div>
        <!-- end of left column -->
        
        <!-- start of middle column -->
<div id="templatemo_middle_column"><center>
<h1>:: Import student from file ::</h1><br><br>

<span class="style8"><b>วิธีการนำข้อมูลนักเรียนเข้า database</b></span><br>
  1.download file ต้นฉบับ นาสกุล CSV &nbsp;&nbsp;<a href="EXEM/Book1.csv">download here</a><br>
2.เปิด file โดยใช้ โปรแกรม microsoft excel หรือ  OpenOffice Spreadsheet<br>
  3.พิมพ์ข้อมูลโดยพิมพ์เรียงลงมาทีละแถวดังตัวอย่าง ของไฟล์ต้นฉบับ โดยข้อมูลต้องเรียงตามลงมา<br>
  4. Save โดย Save ให้เป็น นาสกุล CSV ตามเดิม <br>
  5.Browse ข้อมูลจากปุ่มด้านล่าง แล้วเลือกไฟล์ที่ทำการ Save ไว้<br>
</p>
  <div id="left"><input name="fileCSV" type="file" id="fileCSV">
  <input name="btnSubmit" type="submit" id="btnSubmit" value="Submit">
</div>
<br>
6. ทำการกด sumit จะขึ้นข้อความว่า import sucessful </center><br><br>
</div></div>

</form>
</body>
</html>
