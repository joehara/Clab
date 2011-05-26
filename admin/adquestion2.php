<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: ../index.html"); 	exit();
}

?>
<HTML>
<HEAD><TITLE>add question</TITLE></HEAD>
<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
<link href="../templatemo_style.css" rel="stylesheet" type="text/css" />
<meta content="text/html; charset=utf-8" http-equiv="content-type">
<style type="text/css">
<!--
.style1 {font-size: 36px}
-->

</style>
<script language="Javascript" type="text/javascript" src="../editarea/edit_area/edit_area_full.js">
</script>
<script language="Javascript" type="text/javascript">
	editAreaLoader.init({
		id: "student_code",
		start_highlight: true,
		allow_resize: "both",
		allow_toggle : false,
		word_wrap: true,
		language: "en",
		syntax: "c",
		toolbar: "search, go_to_line, |, undo, redo"

	});	
</script>
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


$sql2="select * from proposition where proposition='$question' ";
$result2=mysql_db_query($dbname,$sql2);
$num2=mysql_num_rows($result2);
if($num2>0) {
	echo "<h3>ERROR : Question duplicate in Database</h3>";	 exit();
}

$sql3="insert into proposition values('','$question','$help2','','$level','$lesson')";
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
