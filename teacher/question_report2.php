<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}

  $lesson=$_GET[lesson];
  $section=$_GET[section];
  $student_id=$_GET[id];
  $year=$_GET[year];
?>
<HTML>
<HEAD><title>ผู้ส่งข้อสอบ</title></HEAD>
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
<h1>:: โจทย์ที่ส่ง ::</h1></center><br><br>
<p>[<a href="main.php">Main</a> &gt; <a href="mstudent.php">manage student</a> &gt; <a href="report.php"> Section ที่ส่งงานเข้ามา</a> &gt; <a href="report2.php?id=<?$student_id?>&lesson=<?=$lesson?>&amp;section=<?=$section?>&year=<?=$year?>">บทที่ส่งงานเข้ามา</a> &gt;<a href="question_report.php?student=<?=$student_id?>&lesson=<?=$lesson?>&section=<?=$section?>&year=<?=$year?>">ผู้ส่งข้อสอบ</a>&gt;โจทย์ที่ทำส่ง</p>
<br><br>
<table border="0">
  <tr bgcolor="#D3D3D3">
    <td>NO.</td>
    <td>โจทย์ที่ส่ง</td>
  </tr>
  <?

	$count=1;
	include "../connect.php";
	$sql="select Proposition.proposition,student.name,student.student_id,SendAnswer.answer_id from SendAnswer,Proposition,student  where (SendAnswer.ref_question=Proposition.question_id and SendAnswer.ref_student=student.student_id)  and Proposition.ref_lesson='$lesson' and  student.section='$section'  and student.student_id='$student_id'";
	$result=mysql_db_query($dbname,$sql);
	while($record=mysql_fetch_array($result)) {
	
$sql2="select * from Check_answer where ref_answer='$record[answer_id]'";
		$result2=mysql_db_query($dbname,$sql2);
		$record2=mysql_fetch_array($result2);
		$num2=mysql_num_rows($result2);
		if($num2<=0) {
		echo "<tr> 
			<td>$count</td>
			<td>$record[proposition]</td>
			<td><a href=\"question_check.php?ans_id=$record[answer_id]\">ตรวจ</a></td>
		</tr>";
	}else{

		echo "<tr> 
			<td>$count</td>
			<td>$record[proposition]</td>
			<td><a href=\"check_al_st.php?check_id=$record2[check_id]&page=2\">ตรวจแล้ว</a></td>
		</tr>";
		}
			
		$count++;
		}
	
	mysql_close();
?>
</table>
</div></div>
</body>
</html>
