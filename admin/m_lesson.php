<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: ../index.html"); 	exit();
}
?>
<HTML>
<HEAD><TITLE>Manage Lesson</TITLE></HEAD>
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
        
    	<div id="templatemo_middle_column"><center>
<h1>:: Lesson Management ::</h1></center><br><br>
<a href="main.php">Back Main</a>&gt; Lesson Management<br><br>

<table border="0">
<tr>
<td><center><a href="addlesson.php"><img src="/Clab/images/comment_add2.png" alt="Add Lesson" /><br> Add Lesson </a></center></td>
</tr>
</table>
  
  <table border="1">
    <tr bgcolor="#D3D3D3">
	<td><center><b>Lesson</b></center></td>
	<td><center><b>Detail Lesson</b></center></td>
        <td><center><b>Edit</b></center></td>
        <td><center><b>จำนวนข้อง่าย</b></center></td>
	<td><center><b>จำนวนข้อยาก</b></center></td>
    </tr>
    <?
	$count=0;
	include "../connect.php";
	$sql="select * from headlesson  ORDER BY lesson ";
	$result=mysql_db_query($dbname,$sql);  
	while($record=mysql_fetch_array($result)) {
		
		$sql2="select count(level) as level from proposition where ref_lesson=$record[lesson] and level=0" ;
		$result2=mysql_db_query($dbname,$sql2);
		$record2=mysql_fetch_array($result2);
		$easy=$record2[level];
		
		$sql3="select count(level) as level from proposition where ref_lesson=$record[lesson] and level=1" ;
		$result3=mysql_db_query($dbname,$sql3);
		$record3=mysql_fetch_array($result3);
		$hard=$record3[level];
		echo "
		<tr> 
			
			<td>$record[lesson]</td>
			<td><a href=\"proposition.php?id_edit=$record[id]&lesson=$record[lesson]\">$record[detail]</a></td>
			<td><center><a href=\"editlesson.php?id_edit=$record[id]\"><img src=\"../images/icon-edit.gif\"></a></center></td>
			<td><center>$easy</center></td>
			<td><center>$hard</center></td>
		</tr>";
	}
	mysql_close();
?>
  </table>
</div>
</div>
</body>
</html>
