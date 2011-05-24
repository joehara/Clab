<?
include "../chksession.php";

if ($sess_table<>student) {
	header( "Location: /Clab/index.html"); 	exit();
}
?>
<HTML>
<head>
<meta content="text/html; charset=UTF-8" http-equiv="content-type">
<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
<title>Change Password</title>
<link href="../templatemo_style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Refresh" content="3; URL=main.php">
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

$oldpass=base64_encode($_POST[oldpass]);
$newpass=base64_encode($_POST[newpass]);
$newpass2=base64_encode($_POST[newpass2]);

if ($oldpass=="" or $newpass=="" or $newpass2=="" or $newpass<>$newpass2) {
	echo "<h3>ERROR : Don't have User or Password<h3>"; 	exit();
}
include "../connect.php";
$sql="select * from student where code_st='$sess_username' and password='$oldpass' ";
$result=mysql_db_query($dbname,$sql);
$num=mysql_num_rows($result);
if($num<1) {
	echo "<h3>ERROR : Don't have User on database </h3>"; 	exit();
}

$sql="update student set  password='$newpass' where code_st='$sess_username' ";
$result=mysql_db_query($dbname,$sql);
if ($result) {
	echo "<h3>Change password successful</h3>";
	echo "[ <a href=main.php>Back main</a> ] ";
} else {
	echo "<h3>Error Can't change password</h3>";
}
mysql_close();
?>
</div></div>
</BODY>
</HTML>
