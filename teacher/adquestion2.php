<HTML>
<HEAD><TITLE>Add Question</TITLE></HEAD>
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
        <!-- end of left column -->
        
        <!-- start of middle column -->
<div id="templatemo_middle_column">
<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}

$lesson=$_GET[lesson];
$question=$_POST[question];
$help=$_POST[help];

$level=$_POST[level];
$help2 = htmlspecialchars($help, ENT_QUOTES);

if ($question=="" ) {
	echo "<h3>ERROR : Don't have Question<h3>"; exit();
}


include "../connect.php";

$sql="select * from teacher where username='$sess_username'";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);
$name=$record[name];

$sql2="select * from proposition where proposition='$question' ";
$result2=mysql_db_query($dbname,$sql2);
$num2=mysql_num_rows($result2);
if($num2>0) {
	echo "<h3>ERROR : Question duplicate in Database</h3>";	 exit();
}

$sql3="insert into proposition values('','$question','$help2','$name','$level','$lesson')";
$result3=mysql_db_query($dbname,$sql3);
if ($result3) {
	echo "<h3>Insert question successful</h3>";
	echo "<A HREF='proposition.php?id_edit=$id&lesson=$lesson'>Back Management</A><BR><BR>";
} else {
	echo "<h3>Error Can't insert to database</h3>";

}
mysql_close();
?>
</div>
</div>
</body>
</html>
