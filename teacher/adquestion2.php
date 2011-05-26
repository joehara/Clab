<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: /Clab/index.html"); 	exit();
}
?>
<HTML>
<HEAD><TITLE>Add Question</TITLE></HEAD>
<link href="/Clab/templatemo_style.css" rel="stylesheet" type="text/css" />
<meta content="text/html; charset=UTF-8" http-equiv="content-type">
<meta http-equiv="Refresh" content="5; URL=/Clab/teacher/showlesson.php">
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
	Welcome, <a href="showprofile.php" style="color:#000000"><b><?=$sess_username?></b></a>&nbsp;&nbsp;<a href="/Clab/logout.php"><img src="/Clab/images/logout.gif" alt="Logout" /></a>
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
