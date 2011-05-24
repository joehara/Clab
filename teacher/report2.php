<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}
?>
<HTML>
<HEAD><TITLE>report</TITLE></HEAD>
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
<div id="templatemo_middle_column">
<center>
<h1>:: นักศึกษาที่ส่งงานเข้ามา::</h1></center><br><br>
[ <a href="main.php">Back Main</a> &gt; <a href="mstudent.php">Back manage student</a>&nbsp;&gt; <a href="report.php">Section ที่ส่งงานเข้ามา</a> &gt; นักศึกษาที่ส่งงานเข้ามา</p><br>
<table border="0">
  <tr bgcolor="#D3D3D3"> 
    
    <td>NO.</td>
    <td>นักศึกษาที่ส่งงานเข้ามา</td>
  </tr>
  <?
include "../connect.php";
$sqlx="select * from teacher where username='$sess_username'";
$resultx=mysql_db_query($dbname,$sqlx);
$record=mysql_fetch_array($resultx);

  $section=$_GET[section];
  $year=$_GET[year];
  $lesson=$_GET[lesson];
  $student_id=$_GET[student];
	$count=1;
	
	$sql="select student.student_id,student.name,HeadLesson.lesson,student.section,student.year from SendAnswer,Proposition,student,HeadLesson  where (SendAnswer.ref_question=Proposition.question_id and SendAnswer.ref_student=student.student_id and Proposition.ref_lesson=HeadLesson.lesson )and student.section='$section' and student.teach='$record[name]'  and student.year='$year' GROUP BY student.name";
	$result=mysql_db_query($dbname,$sql);
	while($record=mysql_fetch_array($result)) {
		

		echo "<tr> 
			<td>$count</td>
			<td><a href=\"question_report.php?lesson=$record[lesson]&section=$record[section]&student=$record[student_id]&year=$record[year]\">$record[name]</a></td>
			
		</tr>";
	
			$count++;
			
		
	}
	mysql_close();
?>
</table>
</div></div>
</body>
</html>
