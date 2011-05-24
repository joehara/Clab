<HTML>
<HEAD><TITLE>drop student</TITLE></HEAD>
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
$id=$_GET[id];
include "../connect.php";
$sql="delete from student where student_id='$id' ";
$result=mysql_db_query($dbname,$sql);
if ($result) {
	echo "<h3>Delete student successful</h3>";
	//echo "<meta http-equiv=\"Refresh\" content=\"2; URL=m_lesson.php\">";
} else {
	echo "<h3>ERROR Delete student unsucessful</h3>";
}
	
$sql2="select  check_answer.check_id,check_answer.ref_answer from check_answer,answer where (check_answer.ref_answer=answer.ans_id) and answer.ref_student='$id'";
$result2=mysql_db_query($dbname,$sql2);
$record2=mysql_fetch_array($result2);
		$num2=mysql_num_rows($result2);
		if($num2>0){
		$sql3="delete from check_answer where check_id='$record2[check_id]'";
		$result3=mysql_db_query($dbname,$sql3);
		if($result3){
		echo"<h3>Delete From DB ¤Ðá¹¹ successful</h3>";
		}else{
		echo"<h3>Error From DB ¤Ðá¹¹</h3>";
		}
		}
		
$sql4="select ans_id from answer where ref_student='$id'";
$result4=mysql_db_query($dbname,$sql4);
$record4=mysql_fetch_array($result4);
$num3=mysql_num_rows($result4);
if($num3>0){
		$sql3="delete from answer where ref_student='$id'";
		$result3=mysql_db_query($dbname,$sql3);
		if($result3){
		echo"<h3>Delete From DB ¤Ðá¹¹ successful</h3>";
		}else{
		echo"<h3>Error From DB ¤Ðá¹¹</h3>";
		}
		}
mysql_close();
?>
</div>
</div>
</body>
</html>
