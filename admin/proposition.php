<? 
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: ../index.html"); 	exit();
}
$id=$_GET[id_edit];
$lesson=$_GET[lesson];

?>
<HTML>
<HEAD><TITLE>Show Student</TITLE></HEAD>
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
<h1>:: QUESTION ::</h1></center><br><br>
<p>[<a href="main.php">Main</a>&gt;<a href="m_lesson.php">Manage Lesson</a>&gt;Question<br>
<br>
<?
include "../connect.php";
$sql="select * from headLesson where lesson='$lesson' ";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);
$name_lesson=$record[detail];
echo"$name_lesson";
?><br>
<table border="0">
<tr>
<td><center><a href="adquestion.php?id_edit=<?=$id?>&lesson=<?=$lesson?>"><img src="../images/comment_add2.png" alt="Add Proposition" /><br> Add Question </a></center></td>
</tr>
</table>

<table border="1">
  <tr bgcolor="#D3D3D3"> 
    <td><center><b>No.</center></b></td>
    <td><b><center>Question</center></b></td>
	<td><b><center>Edit</center></b></td>
	<td><b><center>Delete</center></b></td>
  </tr>
  <?
	$count=0;

	$sql="select * from proposition where ref_lesson='$lesson' ORDER BY question_id";
	$result=mysql_db_query($dbname,$sql);
	while($record=mysql_fetch_array($result)) {
		$count++;
		echo "
		<tr> 
			<td>$count</td>
			<td>$record[proposition]</td>
			<td><center><a href=\"edquestion.php?id=$record[question_id]&lesson=$lesson\"><img src=\"/Clab/images/icon-edit.gif\"></a></center></td>
			<td><center><a href=\"drop_question.php?id=$record[question_id]\" onclick=\"return confirm(' ต้องการลบ $record[proposition] ออกจากระบบจริงหรือไม่ ')\"><img src=\"/Clab/images/b_drop.png\"></a></center></td>
		</tr>";
	}
	mysql_close();
?>
</table>
</div>
</div>
</BODY>
</HTML>
