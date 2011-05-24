<?
include "../chksession.php";
?>
<HTML>
<HEAD><TITLE>Add&Edit Lesson</TITLE></HEAD>
<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
<link href="../templatemo_style.css" rel="stylesheet" type="text/css" />
<meta content="text/html; charset=TIS-620" http-equiv="content-type">
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
<center><h1>:: Show Lesson ::</h1></center><br><br>
[ <a href="main.php">Back Main</a> ] <br><br>
<table border="0">
<tr>
<td><center><a href="addlesson.php"><img src="../images/comment_add2.png" alt="Add Lesson" /><br> add lesson </a></center></td>
</tr>
</table>

<table border="1">
  <tr bgcolor="#D3D3D3"> 
    
    <td>Lesson</td>
    <td><center>Detail Lesson</center></td>
    <td>แก้ไข</td>
    <td>ข้อง่าย/สุ่ม</td>
    <td>ข้อยาก/สุ่ม</td>
  </tr>
  <?
	$count=0;
	include "../connect.php";

$sqlx="select * from teacher where username='$sess_username'";
$resultx=mysql_db_query($dbname,$sqlx);
$recordx=mysql_fetch_array($resultx);

	$sql="select * from HeadLesson  ORDER BY lesson asc";
	$result=mysql_db_query($dbname,$sql);  
	while($record=mysql_fetch_array($result)) {
		
		$sql2="select count(level) as level from Proposition where ref_lesson=$record[lesson] and level=0 " ;
		$result2=mysql_db_query($dbname,$sql2);
		$record2=mysql_fetch_array($result2);
		$easy=$record2[level];
		
		$sql3="select count(level) as level from Proposition where ref_lesson=$record[lesson] and level=1" ;
		$result3=mysql_db_query($dbname,$sql3);
		$record3=mysql_fetch_array($result3);
		$hard=$record3[level];

		$sql4="select * from teacher_random,Proposition,teacher where (teacher_random.question_id=Proposition.question_id and teacher_random.teacher_id=teacher.teacher_id ) and Proposition.ref_lesson='$record[lesson]' and Proposition.level='0' and teacher.name='$recordx[name]'";
		$result4=mysql_db_query($dbname,$sql4);
		$num4=mysql_num_rows($result4);
	
		

		$sql5="select * from teacher_random,Proposition,teacher where teacher_random.question_id=Proposition.question_id and teacher_random.teacher_id=teacher.teacher_id and Proposition.ref_lesson='$record[lesson]' and Proposition.level='1' and teacher.name='$recordx[name]'";
		$result5=mysql_db_query($dbname,$sql5);
		$num5=mysql_num_rows($result5);
		echo "
		<tr> 
			
			<td>$record[lesson]</td>
			<td><a href=\"proposition.php?id_edit=$record[id]&lesson=$record[lesson]\">$record[detail]</a></td>
			<td><center><a href=\"editlesson.php?id_edit=$record[id]\"><img src=\"../images/icon-edit.gif\"></a></center></td>
			<td><center>$easy/$num4</center></td>
			<td><center>$hard/$num5</center></td>
		</tr>";
	
	}
	mysql_close();
?>
</table>
</div>
</div>
</BODY>
</HTML>






