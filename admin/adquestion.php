<? 
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: ../index.html"); 	exit();
}
$id=$_GET[id_edit];
$lesson=$_GET[lesson];


include "../connect.php";
$sql="select  count(*) as no from proposition where ref_lesson='$lesson'";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);

$code=$record[no];
$code++;

mysql_close();
?>
<HTML>
<HEAD><TITLE>show Student</TITLE></HEAD>
<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
<link href="../templatemo_style.css" rel="stylesheet" type="text/css" />
<meta content="text/html; charset=utf-8" http-equiv="content-type">
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
	Welcome, <a href="changepw.php" style="color:#000000"><b><?=$sess_username?></b></a>&nbsp;&nbsp;<a href="../logout.php"><img src="../images/logout.gif" alt="Logout" /></a>
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
 			<label><a href="mstudent.php" style="color:#FE9A2E"><b>[  Student Management ]</b></a></label><br><br>
			<label><a href="mteacher.php" style="color:#FE9A2E"><b>[  Teacher Management ]</b></a></label><br><br>
			<label><a href="m_lesson.php" style="color:#FE9A2E"><b>[  Lesson Management ]</b></a></label><br><br>
			<label><a href="m_scroll.php" style="color:#FE9A2E"><b>[  Score Management ]</b></a></label><br><br>
			<label><a href="changepw.php" style="color:#FE9A2E"><b>[ Change Password ]</b></a></label><br><br>

		
               </div> 
            </div>            	            
        </div>
        </div>
        <!-- end of left column -->
        
        <!-- start of middle column -->
        
    	<div id="templatemo_middle_column">
[ <a href="proposition.php?id=<?=$id?>&lesson=<?=$lesson?>">Back Question</a> ]

<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
  <title>Question </title>

  
</head><body>
<br>

<form method="post" action="adquestion2.php?id_edit=<?=$id?>&lesson=<?=$lesson?>"><br>

<br>
<table style="text-align: left; width: 652px; height: 738px;" border="0" cellpadding="2" cellspacing="2">
  <tbody>
    <tr>
      <td style="vertical-align: top;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br>      </td>
      <td style="vertical-align: top; text-align: center;"><b>:: Add
Question of <?=$code?><INPUT name="no" type="hidden" value="<?=$code?>">::</b><br>
        <br>
&#3650;&#3592;&#3607;&#3618;&#3660;&#3588;&#3635;&#3606;&#3634;&#3617;&#3616;&#3634;&#3625;&#3634;&#3652;&#3607;&#3618;&#3649;&#3621;&#3632;&#3588;&#3635;&#3610;&#3619;&#3619;&#3603;&#3618;&#3634;&#3618;&#3607;&#3637;&#3656;&#3605;&#3657;&#3629;&#3591;&#3585;&#3634;&#3619;&#3651;&#3627;&#3657;&#3649;&#3626;&#3604;&#3591;&#3650;&#3594;&#3623;&#3660;<br>
        <br></td>
      <td style="vertical-align: top;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <br>      </td>
    </tr>
    <tr>
        <td style="vertical-align: top;"><br>        </td>
        <td style="vertical-align: top;"><textarea cols="70" rows="20" name="question" class="ckeditor"></textarea></td>
        <td style="vertical-align: top;"><br>        </td>
      </tr>
<tr>
      <td style="vertical-align: top;"><br>      </td>
      <td style="vertical-align: top;">&#3650;&#3588;&#3619;&#3591;&#3626;&#3619;&#3657;&#3634;&#3591;&#3586;&#3629;&#3591;&#3650;&#3611;&#3619;&#3649;&#3585;&#3619;&#3617;&#3648;&#3610;&#3639;&#3657;&#3629;&#3591;&#3605;&#3657;&#3609;&#3592;&#3632;&#3607;&#3635;&#3651;&#3627;&#3657;&#3609;&#3633;&#3585;&#3624;&#3638;&#3585;&#3625;&#3634;&#3648;&#3586;&#3637;&#3618;&#3609;&#3650;&#3611;&#3619;&#3649;&#3585;&#3619;&#3617;&#3652;&#3604;&#3657;&#3591;&#3656;&#3634;&#3618;&#3586;&#3638;&#3657;&#3609;<br>
&#3649;&#3621;&#3632;&#3592;&#3632;&#3607;&#3635;&#3651;&#3627;&#3657;&#3605;&#3619;&#3591;&#3585;&#3633;&#3610; flow chart &#3607;&#3637;&#3656;&#3605;&#3657;&#3629;&#3591;&#3585;&#3634;&#3619; <a href="example.php" target="_blank">&#3605;&#3633;&#3623;&#3629;&#3618;&#3656;&#3634;&#3591;</a><br>
        <br>
        <textarea cols="70" rows="20" name="help" class="ckeditor"></textarea><br></td>
      <td style="vertical-align: top;"><br>      </td>
    </tr>
    <tr>
      <td style="vertical-align: top;">&nbsp;</td>
      <td style="vertical-align: top; text-align: center;"><div align="left" class="style3">ข้อนี้จัดอยู่ในกลุ่มที่ &nbsp;
        <label>
        <input type="radio" name="level" id="hard" value="1">
        </label>
      HARD &nbsp;&nbsp;
      <label>
      <input name="level" type="radio" id="easy" value="easy" checked>
      </label>
      &nbsp;EASY</div></td>
      <td style="vertical-align: top;">&nbsp;</td>
    </tr>
    <tr>
      <td style="vertical-align: top;"><br>      </td>
      <td style="vertical-align: top; text-align: center;"><INPUT TYPE="Submit" VALUE="ADD"></button><br>      </td>
      <td style="vertical-align: top;"><br>      </td>
    </tr>
  </tbody>
</table>
</form>
</div>
</div>
</body></html>
