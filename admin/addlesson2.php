<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: ../index.html"); 	exit();
}
$lesson=$_POST[lesson];
$h_lesson=$_POST[h_lesson];
$hard=$_POST[hard];
$easy=$_POST[easy];
$HH=$_POST[HH];
$MM=$_POST[MM];

?>

<HTML>
<HEAD><TITLE>Edit Lesson</TITLE></HEAD>
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
if ($lesson=="" or $h_lesson=="") {
	echo "<h3>ERROR : Don't have Key anything<h3>"; exit();
}
include "../connect.php";
$sql="select * from headlesson where lesson='$lesson' ";
$result=mysql_db_query($dbname,$sql);
$num=mysql_num_rows($result);
if($num>0) {
	echo "<h3>ERROR : บทนี้มีอยู่ในระบบแล้ว</h3>";	 exit();
}
$sql="insert into headlesson values('','$lesson','$h_lesson','$hard','$easy','$HH:$MM')";
$result=mysql_db_query($dbname,$sql);
if ($result) {
	echo "<h3>Insert Lesson successful</h3>";
	echo "<A HREF='addlesson.php'>Back Management</A><BR><BR>";
} else {
	echo "<h3>Error Can't insert to database</h3>";
}
mysql_close();
?>
   </tbody>
  </table>
  </form>
</div>
</div>
</body>
</HTML>
