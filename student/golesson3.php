<?
include"../function.php";
include "../connect.php";
include "../chksession.php";
$code=$_POST[help];
$output=$_POST[output];
$id_question=$_POST[id_question];
$time=date("Y-m-d G:i:s");
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
		
			<label><a href="showprofile.php" style="color:#FE9A2E"><b>[ Show Profile ]</b></a></label><br><br>
		<a href="/Clab/logout.php"><img src="/Clab/images/logout.gif" alt="Logout" /></a>
                </div>            
            	</div>
            
		</div>
        </div>
        <!-- end of left column -->
        
        <!-- start of middle column -->
<div id="templatemo_middle_column">
<?
$sql="select * from student where code_st='$sess_username'";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);
$ref_student=$record[student_id];

$sql="select * from proposition where question_id='$id_question'";

$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);
$ref_lesson=$record[ref_lesson];


$sql="select * from sendanswer where ref_question='$id_question' and ref_student='$ref_student'";
$result=mysql_db_query($dbname,$sql);
$num=mysql_num_rows($result);
if($num>0) {

$sql2="update sendanswer set  code='$code',answer_code='$output' where ref_question='$id_question' and ref_student='$ref_student'";
$result2=mysql_db_query($dbname,$sql2);
echo "<h3>Update Answer Successful</h3>";
echo "[ <a href=main_lesson.php?lesson=$ref_lesson>Back Question</a> ] ";
}else{
$sql="insert into sendanswer values('','$id_question','$ref_student','$code','$time')"; 
$result=mysql_db_query($dbname,$sql);
if ($result) {
	echo "<h3>Save Answer Successful</h3>";
	echo "[ <a href=main_lesson.php?lesson=$ref_lesson>Back Question</a> ] ";
} else {
	echo "<h3>Save Unsuccessful</h3>";

}
}
$sql4="update time_use set time_end='$time'";
$result4=mysql_db_query($dbname,$sql4);
mysql_close();
?>
</div>
</div>
</body></html>
