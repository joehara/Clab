<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: ../index.html"); 	exit();
}
 $section=$_GET[section];
  $student_id=$_GET[id];
  $lesson=$_GET[lesson];
 
?>
<HTML>
<HEAD><TITLE>ข้อต่างๆที่ส่งเข้ามา</TITLE></HEAD>
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
<h1>:: ข้อต่างๆที่ส่งเข้ามา ::</h1></center><br><br>
<p>[ <a href="main.php">Back Main</a> &gt; <a href="m_scroll.php">Manage Score</a>&nbsp;&gt;
<a href="m_scroll_name.php?section=<?=$section?>">รายชื่อที่ส่งงานเข้ามา</a>&gt;
<a href="m_scroll_lesson.php?section=<?=$section?>&amp;id=<?=$student_id?>">บทต่างๆที่ส่งเข้ามา</a>&gt;ข้อต่างๆที่ส่งเข้ามา</p></br>
</br>
<table border="0">
  <tr bgcolor="#D3D3D3">
    <td><b><center>NO.</center></b></td>
    <td><b><center>โจทย์</center></b></td>
  </tr>
  <?
 
	include "../connect.php";
	$count=1;
	$sql="select proposition.proposition,proposition.question_id from check_answer,sendanswer,proposition,student where (check_answer.ref_answer=sendanswer.answer_id and sendanswer.ref_student=student.student_id and   									    sendanswer.ref_question=proposition.question_id ) and sendanswer.ref_student='$student_id'  and proposition.ref_lesson='$lesson' GROUP BY proposition.proposition ORDER BY proposition.question_id";
 		$result=mysql_db_query($dbname,$sql);
	while($record=mysql_fetch_array($result)) {
	

		echo "<tr> 
			<td>$count</td>
			<td><a href=\"m_scroll_result.php?section=$section&id=$student_id&question_id=$record[question_id]\">$record[proposition]</a></td>
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
