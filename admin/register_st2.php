<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: ../index.html"); 	exit();
}
$student_id=$_GET[id];
$permission=$_GET[permission];
?>

<HTML>
<HEAD><TITLE>register</TITLE></HEAD>
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
        
    	<div id="templatemo_middle_column">
<?

include "../connect.php";
if($student_id!=""){

$sql="update student set  permission='$permission' where student_id='$student_id' ";
$result=mysql_db_query($dbname,$sql);
if ($result) {
	echo "<h3>Edit Profile Successful</h3>";
	echo "<meta http-equiv=\"Refresh\" content=\"2; URL=register_st.php\">";
	
} else {
	echo "<h3>Edit Unsuccessful</h3>";
	echo "[ <a href=editstudent.php>Edit profile</a> ] ";
	echo "[ <a href=main.php>Back Main</a> ] ";
}
}else{

$id2=$_GET[id2];
$sql2="delete from student where student_id='$id2' ";
$result2=mysql_db_query($dbname,$sql2);
if ($result2) {
	echo "<h3>Delete successful</h3>";
	echo "<meta http-equiv=\"Refresh\" content=\"2; URL=showstudent.php\">";
} else {
	echo "<h3>ERROR Delete unsucessful</h3>";
}
}

mysql_close();
?>
</div>
</div>
</body>
</HTML>
