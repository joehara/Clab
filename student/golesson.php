
<? 
include "../chksession.php";
header("Content-Type content=text/html; charset=TIS-620");
if ($sess_table<>student) {
	header( "Location: ../index.html"); 	exit();
}

$id_question=$_GET[id_question];
$ref_student=$_GET[ref_student];
include "../connect.php";


$sql="select * from Proposition where question_id='$id_question'";

$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);

$question=$record[proposition];
$help=$record[help];
$ref_lesson=$record[ref_lesson];


$sql="select * from SendAnswer where ref_question='$id_question' and ref_student='$ref_student'";

$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);
$code=$record[code];

if($code!=""){
$help=$code;
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
<div id="templatemo_middle_column">
  [ <a href="main_lesson.php?lesson=<?=$ref_lesson?>">Back Question</a> ][ <a href="main.php">Back Main</a> ]

<br>
<form method="post" action="golesson3.php">
  <table width="100%" border="0">
  <tr>
    <td width="25%">&nbsp;</td>
    <td width="50%"><div align="center"><span style="vertical-align: top; text-align: center;"><br>:: <span class="style3">Question</span>

      ::</span></div></td>
    <td width="25%">&nbsp;</td>
  </tr>
  <tr>
    <td height="40">&nbsp;</td>
    <td> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;โจทย์::
     
      <?=$question?><input type="hidden" name="id_question" value="<?=$id_question?>">
      <input name="ref_student" type="hidden" id="ref_student" value="<?=$ref_student?>"></td>
    <td>เวลาที่เริ่มทำ 
	<? 
$sql2="select * from Random where ref_question='$id_question' and ref_student='$ref_student'";
$result2=mysql_db_query($dbname,$sql2);
$record=mysql_fetch_array($result2);
$time_random=$record[time_random];
if($time_random==0){
$time_random=date("y-m-d h:i:s");
$sql3="update  Random set time_random='$time_random' where ref_question='$id_question' and ref_student='$ref_student'";
$result3=mysql_db_query($dbname,$sql3);

}else{
echo"$time_random<br>";


}
?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><p align="center" style="vertical-align: top;">Help<br>
          <textarea name="help" id="help" cols="70" rows="20"><?=$help;?>
          </textarea>
    </p>
      <p style="vertical-align: top;">&nbsp;</p></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="center"><span style="vertical-align: top; text-align: center;">
      <input type="submit" name="button" id="button" value="SAVE">
    </span></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>
  <label></label>
</p>
<p>&nbsp;</p>
</form>
<?
mysql_close();
?>
</div>

</div>
</body></html>
