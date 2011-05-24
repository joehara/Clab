<HTML>
<HEAD><TITLE>Add Lesson</TITLE></HEAD>
<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
<link href="../templatemo_style.css" rel="stylesheet" type="text/css" />
<meta content="text/html; charset=utf-8" http-equiv="content-type">
<meta http-equiv="Refresh" content="3; URL=addlesson.php">
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
        <!-- end of left column -->
        
        <!-- start of middle column -->
        
    	<div id="templatemo_middle_column">
<?
$add_section=$_POST[add_section];
include "../connect.php";
$sql="select * from student where section_name='$add_section' ";
$result=mysql_db_query($dbname,$sql);
$num=mysql_num_rows($result);
if($num>0) {
	echo "<h3>ERROR : Section name was duplicate in Database</h3>";	 exit();
}
$sql="insert into section values('','$add_section')";
$result=mysql_db_query($dbname,$sql);
if ($result) {
	echo "<h3>Insert section name successful</h3>";
echo"<meta http-equiv=\"Refresh\" content=\"5; URL=addstudent.php\">";
} else {
	echo "<h3>Error Can't insert to database</h3>";
}
mysql_close();
?>
</div>
</div>
</body>
</html>
