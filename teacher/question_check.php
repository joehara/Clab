<?
include "../chksession.php";
if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}
$ans_id=$_GET[ans_id];
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



 <?
	
   	include "../connect.php";
	$sql="select * from SendAnswer,Proposition,HeadLesson,student where SendAnswer.ref_question=Proposition.question_id and SendAnswer.ref_student=student.student_id and Proposition.ref_lesson=HeadLesson.lesson and  SendAnswer.answer_id='$ans_id'";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);

$student_id=$record[student_id];
$name=$record[name];
$code_st=$record[code_st];
$section=$record[section];
$time_answer=$record[time_answer];
$question=$record[proposition];
$head=$record[detail];
$lesson=$record[ref_lesson];
$code=$record[code];
$year=$record[year];
$answer_code=$record[answer_code];

$sql="select * from teacher where username='$sess_username'";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);
$teacher_name=$record[name];
?><br>
[<a href="main.php">Main</a> &gt; <a href="mstudent.php">manage student</a> &gt; <a href="report.php"> Section ที่ส่งงานเข้ามา</a> &gt; <a href="report2.php?lesson=<?=$lesson?>&amp;section=<?=$section?>">บทที่ส่งงานเข้ามา</a> &gt;<a href="question_report.php?lesson=<?=$lesson?>&amp;section=<?=$section?>">ผู้ส่งข้อสอบ</a>&gt;<a href="question_report2.php?id=<?=$student_id?>&amp;lesson=<?=$lesson?>&amp;section=<?=$section?>">โจทย์ที่ทำส่ง</a>&gt;รายละเอียด</p></center>
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<form id="form1" name="form1" method="post" action="question_check2.php">
<br>
  <table width="63%" border="0">
    <tr>
      <td width="18%">ชื่อผู้ส่ง :  </td>
      <td width="82%"><?=$name?>
        <input name="ans_id" type="hidden" id="ans_id" value="<?=$ans_id?>" />
      <input name="teacher_name" type="hidden" id="teacher_name" value="<?=$teacher_name?>" /></td>
    </tr>
    <tr>
      <td>รหัสนักศึกษา :</td>
      <td><?=$code_st?></td>
    </tr>
    <tr>
      <td>section:</td>
      <td><?=$section?>
      <input name="section" type="hidden" id="section" value="<?=$section?>" />
      ปีการศึกษา 
      <?=$year?></td>
    </tr>
    <tr>
      <td>วันที่ทำส่ง:</td>
      <td><?=$time_answer?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>บทเรียน</td>
      <td>บทที่ <?=$lesson?> เรื่อง <?=$head?> </td>
    </tr>
    <tr>
      <td>โจทย์:</td>
      <td><?=$question?></td>
    </tr>
    <tr>
      <td>Code ที่ส่ง:</td>
      <td><label>
        <textarea name="code_comment" id="code_comment" cols="70" rows="20" class="ckeditor"><?=$code?>
        </textarea>
      </label></td>
    </tr>
      <tr>
      <td>คะแนน</td>
      <td><label>
        <input type="text" name="point" id="point" />
      <span class="style3">Ex. 9/10        </span></label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="button" id="button" /></td>
    </tr>
  </table>
  
</form>

</body>


</html>
