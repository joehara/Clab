<?
header("Content-Type content=text/html; charset=UTF-8");
$id=$_GET[id];
$lesson=$_GET[lesson];
$plus=$_GET[plus];
include "../connect.php";
include "../chksession.php";
$time=date("Y-m-d G:i:s");

if ($sess_table<>student) {
	header( "Location: /Clab/index.html"); 	exit();
}
?>
<HTML>
<head>
<meta content="text/html; charset=UTF-8" http-equiv="content-type">
<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
<title>Lesson</title>
<link href="/Clab/templatemo_style.css" rel="stylesheet" type="text/css" />
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
	Welcome, <a href="showprofile.php" style="color:#000000"><b><?=$sess_username?></b></a>&nbsp;&nbsp;
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
			<label><a href="showprofile.php" style="color:#FE9A2E"><b>[ Show Profile ]</b></a></label><br><br>
		<a href="/Clab/logout.php"><img src="/Clab/images/logout.gif" alt="Logout" /></a>
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

$sql="select * from headlesson where lesson='$lesson'";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);
$id_lesson=$record[id];
$hard=$record[hard];
$easy=$record[easy];

$sql="select proposition.question_id,proposition.proposition,random.ref_question,random.ref_student from proposition,random where 
proposition.question_id=random.ref_question and proposition.ref_lesson='$lesson' and random.ref_student='$ref_student' order by random.ref_question asc";
$result5=mysql_db_query($dbname,$sql);
$num=mysql_num_rows($result5);

if($num>0){

$count=1;


while($record=mysql_fetch_array($result5)) {

$sql6="select proposition.question_id,proposition.proposition,sendanswer.ref_question,sendanswer.ref_student from proposition,sendanswer where proposition.question_id=sendanswer.ref_question and sendanswer.ref_student='$ref_student'  and proposition.question_id='$record[question_id]' order by sendanswer.ref_question asc";
$result6=mysql_db_query($dbname,$sql6);
$num6=mysql_num_rows($result6);

		echo "
		<tr> 
			
			<td>$count</td>
			<td><a href=\"golesson.php?id_question=$record[question_id]&ref_student=$ref_student\">$record[proposition]</a></td>";
			if($num6<=0){
			echo"<td>ÂÑ§äÁèäŽéÊè§€ÓµÍº </td>";
			}else{
			echo"<td>Êè§€ÓµÍºáÅéÇ </td>";
			$success++;

			if($success==($hard+$easy)){
														$sql8="update  time_use set time_end='$time' where ref_lesson='$lesson' and ref_student='$ref_student'";
$result8=mysql_db_query($dbname,$sql8);
			}
			}
			
			echo "</tr>";
			$count++;
								
			}
			
			
													
}else{

$count=1;

$sql="select * from proposition,teacher_random,teacher where teacher_random.question_id=proposition.question_id and teacher_random.teacher_id=teacher.teacher_id and proposition.ref_lesson='$lesson' and proposition.level=1 and teacher.name='$teach' ORDER BY rand()LIMIT $hard";
	$result=mysql_db_query($dbname,$sql);
	while($record=mysql_fetch_array($result)) {
		
		echo "
		<tr> 
			
			<td>$count</td>
			<td><a href=\"golesson.php?id_question=$record[question_id]&ref_student=$ref_student\">$record[proposition]</a></td>
			<td>ÂÑ§äÁèäŽéÊè§€ÓµÍº</td>
			</tr>";
			$count++;
			$sql3="insert into random values('','$record[question_id]','$ref_student','$time')";
			$result3=mysql_db_query($dbname,$sql3);
			
	}


$sql="select * from proposition,teacher_random,teacher where teacher_random.question_id=proposition.question_id and teacher_random.teacher_id=teacher.teacher_id and proposition.ref_lesson='$lesson' and proposition.level=0 and teacher.name='$teach' ORDER BY rand()LIMIT $easy";
	$result=mysql_db_query($dbname,$sql);
	while($record=mysql_fetch_array($result)) {
		
		echo "
		<tr> 
			
			<td>$count</td>
			<td><a href=\"golesson.php?id_question=$record[question_id]&ref_student=$ref_student\">$record[proposition]</a></td>
			<td>ÂÑ§äÁèäŽéÊè§€ÓµÍº</td>
			</tr>";
			$count++;
			$sql4="insert into Random values('','$record[question_id]','$ref_student','$time')";
			$result4=mysql_db_query($dbname,$sql4);
		
	}
echo"</table>";
	$sql9="select * from proposition where ref_lesson='$lesson'";
	$result9=mysql_db_query($dbname,$sql9);
	$num9=mysql_num_rows($result9);
	if($num9>0){
	$sql7="insert into time_use values('','$lesson','$ref_student','$time','')";
	$result7=mysql_db_query($dbname,$sql7);
	}else{
		



	echo"<h3>äÁèÁÕâš·Âì</h3><br>";
	}

	}
	 

mysql_close();
?>
</table></center></div>
<!-- end of middle column -->

</div>
</body>
</HTML>
