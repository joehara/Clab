<?

include "../chksession.php";
if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();}


include "../function.php";
include "../connect.php";
$sql="select * from teacher where username='$sess_username' ";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);

$username=$record[username];
$name=$record[name];
$email=$record[email];
$phone=$record[phone];
$address=$record[address];
$reg_date=$record[reg_date];
mysql_close();

?>
<HTML>
<head>
<meta content="text/html; charset=UTF-8" http-equiv="content-type">
<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
<title>Show Profile</title>
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
 			<label><a href="mstudent.php" style="color:#FE9A2E"><b>[ Management Student ]</b></a></label><br><br>
			<label><a href="showlesson.php" style="color:#FE9A2E"><b>[ add/edit lesson ]</b></a></label><br><br>
			<label><a href="showprofile.php" style="color:#FE9A2E"><b>[ Show Profile ]</b></a></label><br><br>
		
               </div> 
            </div>            	            
        </div>
        </div>
        <!-- end of left column -->
        
        <!-- start of middle column -->
<div id="templatemo_middle_column"><center>
<h1>:: Show Profile ::</h1><br><br></center>
[ <a href="main.php">Back Main</a> ]<center><br>
  <table cellspacing="2">
    <tbody><tr> 
      <td><b>Username : </b></td><td><?=$username?></td>
    </tr>
    <tr> 
      <td><b>ชื่อ-สกุล : </b></td><td><?=$name?></td>
    </tr>
    <tr>
      <td><b>Email : </b></td><td><?=$email?></td>
    </tr>
    <tr> 
      <td><b>Telephone : </b></td><td><?=$phone?></td>
    </tr>
    <tr> 
      <td valign="top"><b>Address :</b></td><td><?=$address?></td>
    </tr>
    <tr>
      <td><b>Register Date :</b></td><td><?= displaydate($reg_date) ?></td>
    </tr>
	
	
    <tr> 
      <td>&nbsp;</td>
    </tr>
  </tbody></table>
</form>
<a href="changepw.php"><img src="../images/changePass.jpeg" alt="Change Password" /></a><br>
<a href="changepw.php">Change Password</a></center>
</div></div>
</body></html>
