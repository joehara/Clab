<?php
header("Content-Type content=text/html; charset=TIS-620");
include"../function.php";
include "../connect.php";
include "../chksession.php";
$id_question=$_POST[id_question];
$ref_student=$_POST[ref_student];

$help=$_POST[help]; 


$code = randomToken(5);
$handle = fopen("$code.c", 'w');
if($handle){

    if(!fwrite($handle,$help))  die("couldn't write to file."); 
shell_exec("gcc  $code.c -o $code");
$output = shell_exec("./$code");


}
unlink("$code.c");
unlink($code);




$help2 = htmlspecialchars($help, ENT_QUOTES);

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
	<? $today=date("r");
echo "$today"; ?>
    	</div>
        <div id="menu">
            <ul>
                <li><a href="../index.html" class="current">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div>
	</div>
    
    <!-- start of content -->
    
	<div id="templatemo_content">
    
    	<!-- start of left column -->
    
    	<div id="templatemo_left_column">        	

            <div id="leftcolumn_box01">
                <div class="leftcolumn_box01_top">
                    <h2>Logined In System </h2>
                </div>
                <div class="leftcolumn_box01_bottom">
                        <div class="form_row">
                        <label>Welcome</label><a href="showprofile.php" style="color:#FFFFFF"><b><?=$sess_username?></b></a></p>
                        <p>Log in the systems</p>
                        <a href="../logout.php"><p style="color:#FE9A2E"><b>[ logout ]</b></p></a> 
		
                </div>            
            	</div>
            
		<div id="leftcolumn_box02">
            	<h2>Menu</h2>
                <ul>
<p> <a href="main.php">[ Main ]</a> </p>
<p> <a href="lesson.php">[ lesson ]</a> </p>
<p><a href="result_lesson.php">[ Result Lesson ]</a></p>
<p><a href="showprofile.php">[ Show Profile ]</a></p>
</div>
                <div id="leftcolumn_box02">
<h2>Link</h2>
                <a href="http://lms.kmutnb.ac.th/"><img src="../images/banner_LMS.gif" alt="Elearning" /></a>                
		<a href="http://wasana.kmutnb.ac.th//"><img src="../images/wireless.gif" alt="wireless" /></a>
                <a href="http://k-radio.kmutnb.ac.th/"><img src="../images/banner-K_radio.gif" alt="K_radio" /></a>

		</ul>
            </div>            	            
        </div>
        </div>
        <!-- end of left column -->
        
        <!-- start of middle column -->
<div id="templatemo_middle_column">
<h1>:: Result Compile::</h1> <br><br><br>
[ <a href="golesson.php?id_question=<?=$id_question?>&amp;ref_student=<?=$ref_student?>">Edit Answer</a> ][ <a href="main_lesson.php?lesson=<?=$ref_lesson?>">Back Question</a>]<br />
<form method="post" action="golesson3.php">
  <table width="100%" border="0">
    <tr>
      <td width="25%" height="77">&nbsp;</td>
      <td width="50%"><? 

if($output==""){
$output='Compile ERROR';
echo"<h>Compile ERROR</h>";

}else{
echo "$output";
}
?>
        <span class="style1">
        <input name="help" type="hidden" id="help" value="<?=$help2?>" />
      </span>
      <input name="output" type="hidden" id="output" value="<?=$output?>" />
      <input name="id_question" type="hidden" id="id_question" value="<?=$id_question?>" /></td>
      <td width="25%">&nbsp;</td>
    </tr>
    <tr>
      <td height="81">&nbsp;</td>
      <td>
        <span class="style1">
         
         <label>
         <input type="submit" name="button" id="button" value="SAVE" />
         </label>
        </span></td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <label></label>
</form>
<?
mysql_close();
?>
</div>
<br>
</body></html>
