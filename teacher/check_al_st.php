<?
include "../chksession.php";
 include"../function.php";
if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}
?>

<HTML>
<HEAD><TITLE>Check</TITLE></HEAD>
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
 <?
 
  $check_id=$_GET[check_id] ;
  $page=$_GET[page];

	include "../connect.php";
	$sql="select student.name,student.student_id,student.section,proposition.proposition,sendanswer.code,check_answer.code_comment,check_answer.result,check_answer.check_date,student.code_st,proposition.ref_lesson,time_use.time_start from check_answer,sendanswer,proposition,student,time_use  where check_answer.ref_answer=sendanswer.answer_id and sendanswer.ref_question=proposition.question_id and sendanswer.ref_student=student.student_id and time_use.ref_student=student.student_id and  check_answer.check_id='$check_id'";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);

$name=$record[name];
$code_st=$record[code_st];
$section=$record[section];
$time_start=$record[time_start];
$question=$record[proposition];
$code=$record[code];
$comment=$record[code_comment];
$result=$record[result];
$student_id=$record[student_id];
$lesson=$record[ref_lesson];
$check_date=$record[check_date];
?>
    &nbsp;<br />
 <?
if($page<>""){
	echo"[<a href=\"main.php\">Main</a> &gt; <a href=\"mstudent.php\">manage student</a> &gt; <a href=\"report.php\"> Section อะไรหว่า</a> &gt; <a href=\"report2.php?lesson=$lesson&section=$section\">อะไร2</a> &gt;<a href=\"question_report.php?lesson=$lesson&section=$section\">อะไร3</a>&gt;<a href=\"question_report2.php?id=$student_id&lesson=$lesson&section=$section\">อะไร4</a>&gt; อะไร5</p>";
}else{
 echo"
[<a href=\"main.php\">Main</a> &gt; <a href=\"mstudent.php\">manage student</a>�&gt; <a href=\"check_al.php\"> Section อะไร6</a> &gt; <a href=\"check_al2.php?lesson=$lesson&section=$section\">อะไร7</a> &gt;<a href=\"check_al3.php?lesson=$lesson&amp;section=$section\">อะไร8</a>&gt;<a href=\"check_al4.php?id=$student_id&lesson=$lesson&section=$section\">อะไร9</a>&gt;อะไร10</p>";
}
?>
<form id="form1" name="form1" method="post" action="question_check2.php">
<br> <br>
<table width="98%" border="0">
<tr>
<td width="11%">อะไร 11 : </td>
<td width="47%"><?=$name?>
<input name="ref_answer" type="hidden" id="ref_answer" value="<?=$ans_id?>" />
<input name="teacher_name" type="hidden" id="teacher_name" value="<?=$teacher_name?>" /></td>
<td width="42%">&nbsp;</td>
</tr>
<tr>
<td>อะไร 12 :</td>
<td><?=$code_st?></td>
<td>&nbsp;</td>
</tr>
<tr>
<td>section:</td>
<td><?=$section?></td>
<td>&nbsp;</td>
</tr>
<tr>
<td>อะไร 13</td>
<td><?=$time_start?></td>
<td>&nbsp;</td>
</tr>
<tr>
<td>อะไร 14</td>
<td><?=$question?></td>
<td>&nbsp;</td>
</tr>
<tr>
<td height="326">Code อะไร15:</td>
<td><textarea name="textarea2" id="textarea2" cols="70" rows="20" readonly="readonly"><?=$code?>
</textarea></td>
<td><label></label></td>
</tr>
<tr>
<td>Comment:
<label> </label></td>
<td><?=$comment?></td>
<td>&nbsp;</td>
</tr>
<tr>
<td>อะไร16</td>
<td><?=$result?></td>
<td>&nbsp;</td>
</tr>
<tr>
<td>อะไร17</td>
<td><?=displaydate($check_date)?></td>
<td><label></label></td>
</tr>
</table>
<p>&nbsp;</p>
</form>
</div>
</div>
</body>
</html>
