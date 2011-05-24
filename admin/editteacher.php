<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: ../index.html"); 	exit();
}

$id_edit=$_GET[id_edit];
include "../function.php";

include "../connect.php";
$sql="select * from teacher where teacher_id='$id_edit' ";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);

$code=$record[code];
$username=$record[username];
$password=$record[password];
$name=$record[name];
$email=$record[email];
$phone=$record[phone];
$address=$record[address];
$reg_date=$record[reg_date];

mysql_close();
?>
<HTML>
<HEAD><TITLE>Edit Teacher</TITLE></HEAD>
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
 			<label><a href="mstudent.php" style="color:#FE9A2E"><b>[ Management Student ]</b></a></label><br><br>
			<label><a href="mteacher.php" style="color:#FE9A2E"><b>[ Management Teacher ]</b></a></label><br><br>
			<label><a href="m_lesson.php" style="color:#FE9A2E"><b>[ Management Lesson ]</b></a></label><br><br>
			<label><a href="m_scroll.php" style="color:#FE9A2E"><b>[ Management Score ]</b></a></label><br><br>
			<label><a href="changepw.php" style="color:#FE9A2E"><b>[ Change Password ]</b></a></label><br><br>

		
               </div> 
            </div>            	            
        </div>
        </div>
        <!-- end of left column -->
        
        <!-- start of middle column -->
        
    	<div id="templatemo_middle_column"><center>
<h1>:: Edit Teacher ::</h1></center><br><br>
<a href="main.php">Back Main</a>&gt;<a href="mteacher.php">Manage Teacher</a>&gt;Edit Teacher<br>
<br>
<form METHOD="POST" action="editteacher2.php?id=<?=$id_edit?>" name="teacher">
  <table  border="0" cellpadding="2" cellspacing="2">
    <tbody>
      <tr>
        <td>username<br></td><td><input name="username" value="<?=$username?>">
          <a href="resetpw.php?id_edit=<?=$id_edit;?>&username=<?=$username?>">[reset password]</a><br></td>
      </tr>
        <td style="vertical-align: top;">&#3594;&#3639;&#3656;&#3629;-&#3609;&#3634;&#3626;&#3585;&#3640;&#3621;<br>        </td>
        <td style="vertical-align: top;"><input name="name" value="<?=$name?>"><br>        </td>
      </tr>
      <tr>
        <td style="vertical-align: top;">Email<br>        </td>
        <td style="vertical-align: top;"><input name="email" value="<?=$email?>"><br>        </td>
      </tr>
      <tr>
        <td style="vertical-align: top;">Phone<br>        </td>
        <td style="vertical-align: top;"><input name="phone" value="<?=$phone?>"><br>        </td>
      </tr>
      <tr>
        <td style="vertical-align: top;">Address<br>        </td>
        <td style="vertical-align: top;"><TEXTAREA NAME="address" COLS="35" ROWS="4"><?=$address?>
        </TEXTAREA>
          <br>        </td>
      </tr>
      <tr>
        <td style="vertical-align: top;">Register<br>        </td>
	<td><?=displaydate($reg_date)?><br></td>
	</tr>
	<tr>
        <td style="vertical-align: top;"><INPUT TYPE="Submit" VALUE="UPDATE"></button><br>        </td>
      </tr>
    </tbody>
  </table>
  <br>
  <br>
</form>
</div>
</div>
</body></html>
