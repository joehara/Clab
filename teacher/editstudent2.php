<HTML>
<HEAD><TITLE>Edit Student</TITLE></HEAD>
<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
<link href="../templatemo_style.css" rel="stylesheet" type="text/css" />
<meta content="text/html; charset=UTF-8" http-equiv="content-type">
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
<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}
$id_edit=$_GET[id_edit];
$name=$_POST[name];
$section=$_POST[section];
$email=$_POST[email];
$phone=$_POST[phone];
$address=$_POST[address];

include "../function.php";
if (!checkemail($email)) {
	echo "<h3>ERROR :Email differant format </h3>"; exit();
}
include "../connect.php";
$sql="update student set name='$name',section='$section',email='$email', phone='$phone' ,address='$address' where student_id='$id_edit' ";
$result=mysql_db_query($dbname,$sql);
if ($result) {
	echo "<h3>Edit Profile Successful</h3>";
	echo "[ <a href=showstudent.php>Back Show student</a> ] ";
} else {
	echo "<h3>Edit Unsuccessful</h3>";
	echo "[ <a href=editstudent.php>Edit profile</a> ] ";
	echo "[ <a href=main.php>Back Main</a> ] ";
}
mysql_close();
?>
</div>
</div>
</body>
</HTML>
