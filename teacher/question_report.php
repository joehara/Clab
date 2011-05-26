<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}

  $lesson=$_GET[lesson];
  $section=$_GET[section];
  $student_id=$_GET[student];
  $year=$_GET[year];
?>
<HTML>
<HEAD><title>ผู้ส่งข้อสอบ</title></HEAD>
<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
<link href="../templatemo_style.css" rel="stylesheet" type="text/css" />
<meta content="text/html; charset=UTF-8" http-equiv="content-type">
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
<h1>:: บทที่ส่งเข้ามา ::</h1></center><br><br>
[<a href="main.php"> Back Main</a> &gt; <a href="mstudent.php">manage student</a>
&gt; <a href="report.php"> Section ที่ส่งงานเข้ามา</a> &gt; <a href="report2.php?id=<?$student_id?>&lesson=<?=$lesson?>&section=<?=$section?>&year=<?=$year?>">นักศึกษาที่ส่งงานเข้ามา</a> &gt; บทที่ส่งเข้ามา<br><br><br>
<table border="0">
<tr bgcolor="#D3D3D3">
<td>NO.</td>
<td>บทที่ส่งเข้ามา</td>
<td>จำนวนข้อยาก</td>
<td>จำนวนข้อง่าย</td>

</tr>
<?

$count=1;
include "../connect.php";
$sql="select * from sendanswer,proposition,student,headlesson where (sendanswer.ref_question=proposition.question_id and sendanswer.ref_student=student.student_id and proposition.ref_lesson=headlesson.lesson) and student.student_id='$student_id' GROUP BY proposition.ref_lesson order by proposition.ref_lesson";
$result=mysql_db_query($dbname,$sql);
while($record=mysql_fetch_array($result)) {

echo "
<tr>
<td>$count</td>
<td><a href=\"question_report2.php?id=$student_id&lesson=$record[ref_lesson]&section=$record[section]&year=$record[year]\">lesson $record[lesson] $record[detail]</a></td>
<td><center>$record[hard]</center></td>
<td><center>$record[easy]</center></td>

</tr>";
$count++;

}

mysql_close();
?>
</table>
</div></div>
</body>
</html>
