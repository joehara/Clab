

<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: ../index.html"); 	exit();
}
?>
<HTML>
<HEAD><TITLE>รายชื่อที่ส่งงานเข้ามา</TITLE></HEAD>
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
        
    	<div id="templatemo_middle_column">
<center>
<h1>:: รายชื่อที่ส่งงานเข้ามา ::</h1></center><br><br>
<p>[ <a href="main.php">Back Main</a> &gt; <a href="m_scroll.php">Manage Score</a>&nbsp;&gt;รายชื่อที่ส่งงานเข้ามา</p><br>

<table border="0">
  <tr bgcolor="#D3D3D3"> 
    
    <td><b><center>NO.</center></b></td>
    <td><b><center>Student ID</center></b></td>
    <td><b><center>Name</center></b></td>
  </tr>
  <?
  $section=$_GET[section];
	$count=1;
	include "../connect.php";
	$sql="select student.student_id,student.code_st,student.name from check_answer,sendanswer,student  where (check_answer.ref_answer=sendanswer.answer_id and sendanswer.ref_student=student.student_id and student.section='$section') GROUP BY student.name";
	$result=mysql_db_query($dbname,$sql);
	while($record=mysql_fetch_array($result)) {
		
		echo "<tr> 
			<td>$count</td>
			<td><a href=\"m_scroll_lesson.php?section=$section&id=$record[student_id]\">$record[code_st]</td>
			<td>$record[name]</td>
		</tr>";
			
			$count++;

			
			
	}
	mysql_close();
?>
</table>
</div>
</div>
</body>
</html>
