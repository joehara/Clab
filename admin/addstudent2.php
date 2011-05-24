<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: ../index.html"); 	exit();
}
$code=$_POST[codest];
$userst=$_POST[userst];
$passst=$_POST[password];
$namest=$_POST[namest];
$secst=$_POST[section];
$email_st=$_POST[email_st];
$phone_st=$_POST[phone_st];
$address_st=$_POST[address_st];
$permission=$_POST[permission];
$date_reg=date("Y-m-d");
?>

<HTML>
<HEAD><TITLE>Add Student</TITLE></HEAD>
<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
<link href="../templatemo_style.css" rel="stylesheet" type="text/css" />
<meta content="text/html; charset=utf-8" http-equiv="content-type">
<meta http-equiv="Refresh" content="3; URL=addstudent.php">
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

if ($userst==""  or $namest=="" ) {
	echo "<h3>ERROR : Don't have user or pass in Textbox $passst<h3>"; exit();

}
include "../function.php";
if (!checkemail($email_st)) {
	echo "<h3>ERROR : email differant format</h3>"; exit();
}
include "../connect.php";
$sql="select * from student where username='$userst' ";
$result=mysql_db_query($dbname,$sql);
$num=mysql_num_rows($result);
if($num>0) {
	echo "<h3>ERROR : Username was duplicate in Database</h3>";	 exit();
}

/*$sql="select * from teacher where password='$password'";
$result=mysql_db_query($dbname,$sql);
$num=mysql_num_rows($result);
if($num>0){
	echo "<h3>ERROR : Password was duplicate in Database</h3>";exit();}*/


$sql3="insert into student values('','$code','$userst','$passst','$namest','$secst',
'$email_st','$phone_st','$address_st','$permission','$date_reg')";
$result2=mysql_db_query($dbname,$sql3);
if ($result2) {
	echo "<h3>Insert student successful</h3>";
echo"$permission";
	echo "<A HREF='main.php'>Back Management</A><BR><BR>";
} else {
	echo "<h3>Error Can't insert to database</h3>";
}
mysql_close();
?>

</table>
</div>
</div>
</BODY>
</HTML>
