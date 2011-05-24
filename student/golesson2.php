<?php
header("Content-Type content=text/html; charset=UTF-8");
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
<div id="templatemo_middle_column">
<h1>:: Result Compile ::</h1> <br><br><br>
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
</div>
</body></html>
