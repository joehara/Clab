<?

header("Content-Type content=text/html; charset=TIS-620");
$id=$_GET[id];
$lesson=$_GET[lesson];
$plus=$_GET[plus];
include "../connect.php";
include "../chksession.php";
$time=date("Y-m-d G:i:s");

if ($sess_table<>student) {
	header( "Location: ../index.html"); 	exit();
}
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
<h1>:: Question ::	</h1> </center><br><br>

[ <a href="lesson.php">Back Lesson</a> ]
<br><br><center>
<table border="1">
<tr bgcolor="#D3D3D3"> 
    
    <td>No</td>
    <td><center>Detail Lesson</center></td>
    <td><center>Status</center></td>

</tr>


<?
$sql="select * from student where code_st='$sess_username'";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);
$ref_student=$record[student_id];
$teach=$record[teach];

$sql="select * from HeadLesson where lesson='$lesson'";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);
$id_lesson=$record[id];
$hard=$record[hard];
$easy=$record[easy];

$sql="select Proposition.question_id,Proposition.proposition,Random.ref_question,Random.ref_student from Proposition,Random where 
Proposition.question_id=Random.ref_question and Proposition.ref_lesson='$lesson' and Random.ref_student='$ref_student' order by Random.ref_question asc";
$result5=mysql_db_query($dbname,$sql);
$num=mysql_num_rows($result5);

if($num>0){

$count=1;


while($record=mysql_fetch_array($result5)) {

$sql6="select Proposition.question_id,Proposition.proposition,SendAnswer.ref_question,SendAnswer.ref_student from Proposition,SendAnswer where Proposition.question_id=SendAnswer.ref_question and SendAnswer.ref_student='$ref_student'  and Proposition.question_id='$record[question_id]' order by SendAnswer.ref_question asc";
$result6=mysql_db_query($dbname,$sql6);
$num6=mysql_num_rows($result6);

		echo "
		<tr> 
			
			<td>$count</td>
			<td><a href=\"golesson.php?id_question=$record[question_id]&ref_student=$ref_student\">$record[proposition]</a></td>";
			if($num6<=0){
			echo"<td>ยังไม่ได้ส่งคำตอบ </td>";
			}else{
			echo"<td>ส่งคำตอบแล้ว </td>";
			$success++;

			if($success==($hard+$easy)){
														$sql8="update  Time_use set time_end='$time' where ref_lesson='$lesson' and ref_student='$ref_student'";
$result8=mysql_db_query($dbname,$sql8);
			}
			}
			
			echo "</tr>";
			$count++;
								
			}
			
			
													
}else{

$count=1;

$sql="select * from Proposition,teacher_random,teacher where teacher_random.question_id=Proposition.question_id and teacher_random.teacher_id=teacher.teacher_id and Proposition.ref_lesson='$lesson' and Proposition.level=1 and teacher.name='$teach' ORDER BY rand()LIMIT $hard";
	$result=mysql_db_query($dbname,$sql);
	while($record=mysql_fetch_array($result)) {
		
		echo "
		<tr> 
			
			<td>$count</td>
			<td><a href=\"golesson.php?id_question=$record[question_id]&ref_student=$ref_student\">$record[proposition]</a></td>
			<td>ยังไม่ได้ส่งคำตอบ</td>
			</tr>";
			$count++;
			$sql3="insert into Random values('','$record[question_id]','$ref_student','$time')";
			$result3=mysql_db_query($dbname,$sql3);
			
	}


$sql="select * from Proposition,teacher_random,teacher where teacher_random.question_id=Proposition.question_id and teacher_random.teacher_id=teacher.teacher_id and Proposition.ref_lesson='$lesson' and Proposition.level=0 and teacher.name='$teach' ORDER BY rand()LIMIT $easy";
	$result=mysql_db_query($dbname,$sql);
	while($record=mysql_fetch_array($result)) {
		
		echo "
		<tr> 
			
			<td>$count</td>
			<td><a href=\"golesson.php?id_question=$record[question_id]&ref_student=$ref_student\">$record[proposition]</a></td>
			<td>ยังไม่ได้ส่งคำตอบ</td>
			</tr>";
			$count++;
			$sql4="insert into Random values('','$record[question_id]','$ref_student','$time')";
			$result4=mysql_db_query($dbname,$sql4);
		
	}
echo"</table>";
	$sql9="select * from Proposition where ref_lesson='$lesson'";
	$result9=mysql_db_query($dbname,$sql9);
	$num9=mysql_num_rows($result9);
	if($num9>0){
	$sql7="insert into Time_use values('','$lesson','$ref_student','$time','')";
	$result7=mysql_db_query($dbname,$sql7);
	}else{
		



	echo"<h3>ไม่มีโจทย์</h3><br>";
	}

	}
	 

mysql_close();
?>
</table></center></div>
<!-- end of middle column -->

</div>
</body>
</HTML>
