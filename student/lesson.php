<?
include "../chksession.php";
if ($sess_table<>student) {
	header( "Location: ../index.html"); 	exit();}
?>
<HTML>
<head>
<meta content="text/html; charset=TIS-620" http-equiv="content-type">
<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
<title>Lesson</title>
<link href="../templatemo_style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {font-size: 36px}
-->
</style>
</head>
<BODY>
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
 			<label><a href="lesson.php" style="color:#FE9A2E"><b>[ Lesson ]</b></a></label><br><br>
			<label><a href="result_lesson.php" style="color:#FE9A2E"><b>[ Result Lesson ]</b></a></label><br><br>
			<label><a href="showprofile.php" style="color:#FE9A2E"><b>[ Show Profile ]</b></a></label><br><br>
		
                </div>            
            	</div>
            
		</div>
        </div>
        <!-- end of left column -->
        
        <!-- start of middle column -->
<div id="templatemo_middle_column"><center>
<h1>:: Lesson ::</h1></center><br><br>
[ <a href="main.php">Back Main</a> ]<center><br>
<table border="1">
  <tr bgcolor="#D3D3D3"> 
    
    <td>Lesson</td>
    <td><center>Detail Lesson</center></td>
    <td>Time Limit</td>
    <td>score</td>
  </tr>
  <?
	$count=0;
	include "../connect.php";
	
	  $sql_name="select * from student where code_st='$sess_username' ";
$result_name=mysql_db_query($dbname,$sql_name);
$record_name=mysql_fetch_array($result_name);
$student_id=$record_name[student_id];
	
	$sql="select * from HeadLesson  ORDER BY lesson asc";
	$result=mysql_db_query($dbname,$sql);
	while($record=mysql_fetch_array($result)) {
	
		$sql_result="select  sum(Check_answer.result) as sum_result from Check_answer,SendAnswer,Proposition,student where Check_answer.ref_answer=SendAnswer.answer_id and SendAnswer.ref_question=Proposition.question_id and SendAnswer.ref_student=student.student_id and Proposition.ref_lesson='$record[lesson]' and student.code_st='$sess_username' " ;
		$result_re=mysql_db_query($dbname,$sql_result);
		$record_re=mysql_fetch_array($result_re);
		$sum_result=$record_re[sum_result];
		if($sum_result==0){
		$sum_result='-';
		$url="main_lesson.php?id_edit=$record[id]&lesson=$record[lesson]";
		}else{
		$url="result_question.php?lesson=$record[lesson]";
		}
		echo "
		<tr> 
			
			<td><center>$record[lesson]</center></td>
			<td><a href='$url'>$record[detail]</a></td>
			<td></td>
			<td><center>$sum_result</center></td>
		</tr>";
	}
	mysql_close();
?>
</table></center></div>
<!-- end of middle column -->

</div>
</body>
</html>

