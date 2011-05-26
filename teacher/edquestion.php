<? 
//include "../chksession.php";

//if ($sess_table<>teacher) {
//	header( "Location: ../index.html"); 	exit();
//}
$id=$_GET[id];
$lesson=$_GET[lesson];

include "../connect.php";
$sql="select * from proposition where question_id='$id' ";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);
$question=$record[proposition];
$help=$record[help];
$answer=$record[answer];
$level=$record[level];

if($level==1){
$check1="checked";
}else{
$check="checked";
}


mysql_close();
?>
<HTML>
<HEAD><TITLE>Edit Question</TITLE></HEAD>
<link href="../templatemo_style.css" rel="stylesheet" type="text/css" />
<meta content="text/html; charset=UTF-8" http-equiv="content-type">
<script language="Javascript" type="text/javascript" src="../editarea/edit_area/edit_area_full.js">
</script>
<script language="Javascript" type="text/javascript">
	editAreaLoader.init({
		id: "student_code",
		start_highlight: true,
		allow_resize: "both",
		allow_toggle : false,
		word_wrap: true,
		language: "en",
		syntax: "c",
		toolbar: "search, go_to_line, |, undo, redo"

	});	
</script>
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
[ <a href="proposition.php?id=<?=$id?>&lesson=<?=$lesson?>">Back Question</a> ][ <a href="main.php">Back Main</a> ]
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>

  
</head><body>
<br>

<form method="post" action="edquestion2.php?id=<?=$id?>&lesson=<?=$lesson?>"><br>

<br>
<table style="text-align: left; width: 652px; height: 738px;" border="0" cellpadding="2" cellspacing="2">
  <tbody>
    <tr>
      <td style="vertical-align: top;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br>      </td>
      <td style="vertical-align: top; text-align: center;">:: Edit
Question ::<br>
        <br>
&#3650;&#3592;&#3607;&#3618;&#3660;&#3588;&#3635;&#3606;&#3634;&#3617;&#3616;&#3634;&#3625;&#3634;&#3652;&#3607;&#3618;&#3649;&#3621;&#3632;&#3588;&#3635;&#3610;&#3619;&#3619;&#3603;&#3618;&#3634;&#3618;&#3607;&#3637;&#3656;&#3605;&#3657;&#3629;&#3591;&#3585;&#3634;&#3619;&#3651;&#3627;&#3657;&#3649;&#3626;&#3604;&#3591;&#3650;&#3594;&#3623;&#3660;<br>
        <br></td>
      <td style="vertical-align: top;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <br>      </td>
    </tr>
    <tr>
        <td style="vertical-align: top;"><br>        </td>
        <td style="vertical-align: top;"><textarea cols="80" rows="20" name="question" class="ckeditor"><?=$question?></textarea></td>
        <td style="vertical-align: top;"><br>        </td>
      </tr>
<tr>
      <td style="vertical-align: top;"><br>      </td>
      <td style="vertical-align: top;"><br>
แสดงตารางใส่ Code ในตารางด้านล่างนี้
        <br>
        <textarea id="student_code" cols="80" rows="20" name="help" ><?=$help?></textarea>
        <br></td>
      <td style="vertical-align: top;"><br>      </td>
    </tr>
    <tr>
      <td style="vertical-align: top;">&nbsp;</td>
      <td style="vertical-align: top; text-align: center;"><div align="left"><span class="style3">ข้อนี้จัดอยู่ในกลุ่มที่ &nbsp;
            <label>
            <input type="radio" name="level" id="hard" value="1" <? echo"$check1";?>>
            </label>
HARD &nbsp;&nbsp;
<label>
<input name="level" type="radio" id="easy" value="easy" <? echo"$check"?> >
</label>
&nbsp;EASY</span></div></td>
      <td style="vertical-align: top;">&nbsp;</td>
    </tr>
    <tr>
      <td style="vertical-align: top;"><br>      </td>
      <td style="vertical-align: top; text-align: center;"><INPUT TYPE="Submit" VALUE="UP DATE"></button><br>      </td>
      <td style="vertical-align: top;"><br>      </td>
    </tr>
  </tbody>
</table>
</form>

<br>

<br>

</body></html>
