<? 
include "../chksession.php";

if ($sess_table<>student) {
	header( "Location: ../index.html"); 	exit();
}
$student_id=$_GET[student_id];
$lesson=$_GET[lesson];
?>
<HTML>
<head>
<meta content="text/html; charset=TIS-620" http-equiv="content-type">
<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
<title>Result Lesson</title>
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
<h1>:: �Ť�ṹ������ ::</h1> </center><br><br>
[ <a href="result_lesson.php">Back Lesson</a> ]<br><br>


<center>
<table border="1">
  <tr bgcolor="#D3D3D3"> 
    <td>No.</td>
    <td><center>Proposition</center></td>
    <td>��ṹ</td>
  </tr>
  <?
	$count=0;
	include "../connect.php";

$sqlx="select * from student where code_st='$sess_username'";
$resultx=mysql_db_query($dbname,$sqlx);
$recordx=mysql_fetch_array($resultx);

	$sql="select Proposition.proposition,Check_answer.result,Check_answer.check_id from Check_answer,SendAnswer,Proposition,student where Check_answer.ref_answer=SendAnswer.answer_id and SendAnswer.ref_question=Proposition.question_id and SendAnswer.ref_student=student.student_id and Proposition.ref_lesson='$lesson' and student.student_id='$recordx[student_id]'";

	$result=mysql_db_query($dbname,$sql);
	$num=mysql_num_rows($result);
	if($num>0){
	while($record=mysql_fetch_array($result)) {
		$count++;
		echo "
		<tr> 
			<td>$count</td>
			<td>$record[proposition]</td>
			<td><center><a href=\"result_question_detail.php?check_id=$record[check_id]\">$record[result]</a></center></td>
			
		</tr>";
	}
	}else{
	?>
    </table>
    <?
	echo"<h3>�س�ѧ������觢���ͺ</h3>";
	}
	mysql_close();
?>
</center></div>
</div>
</body>
</HTML>
