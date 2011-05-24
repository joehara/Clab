<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: ../index.html"); 	exit();
}
?>
<HTML>
<HEAD><TITLE>Manage Student</TITLE></HEAD>
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
 <H1>:: Manage Student ::</H1></center><br><br>
<table border="0">
<tr>
<td><center><a href="addstudent.php"><img src="../images/userblue_add.png" alt="Add Student" /><br> Add Student </a></center></td>
<td><center><a href="import.php"><img src="../images/import_document.png" alt="Import file" /><br> Import file </a></center></td>
<td><center><a href="register_st.php"><img src="../images/user_expert.png" alt="นักศึกษาที่ลงทะเบียนผ่านเว็บ" /><br> นักศึกษาที่ลงทะเบียนผ่านเว็บ </a></center></td>
</tr>
</table>

<form name="frmSearch" method="get" action="<?=$_SERVER['SCRIPT_NAME'];?>">
    
  <table width="599" border="1">
    <tr>
      <th>
        Keyword
      <input name="Keyword" type="text" id="txtKeyword" value="<?=$_GET["Keyword"];?>">
      <input type="submit" value="Search">
      <span class="style5">search จาก ชื่อและสาขา</span></th>
    </tr><br>
  </table>
</form><br>
<table width="512" border="1" >
  
<tr bgcolor="#D3D3D3">
		<th width="91"> <div align="center">No. </div></th>
		<th width="198"> <div align="center">Student ID </div></th>
		<th width="250"> <div align="center">Name</div></th>
		<th width="97"> <div align="center">Section </div></th>
		<th width="97"> <div align="center">Edit </div></th>
		<th width="97"> <div align="center">Delete </div></th>
        </div>
        </div>
	  </tr>
<?
	include"../connect.php";
if($_GET["Keyword"] != "")
	{
	
	// Search By Name or Email

	$sql = "SELECT * FROM student WHERE (name LIKE '%".$_GET["Keyword"]."%' or section LIKE '%".$_GET["Keyword"]."%') and permission>0  ";
		$result2=mysql_db_query($dbname,$sql);
	$Num_Rows = mysql_num_rows($result2);

	$Per_Page = 20;   // Per Page

	$Page = $_GET["Page"];
	if(!$_GET["Page"])
	{
		$Page=1;
	}

	$Prev_Page = $Page-1;
	$Next_Page = $Page+1;

	$Page_Start = (($Per_Page*$Page)-$Per_Page);
	if($Num_Rows<=$Per_Page)
	{
		$Num_Pages =1;
	}
	else if(($Num_Rows % $Per_Page)==0)
	{
		$Num_Pages =($Num_Rows/$Per_Page) ;
	}
	else
	{
		$Num_Pages =($Num_Rows/$Per_Page)+1;
		$Num_Pages = (int)$Num_Pages;
	}


	$sql .=" order  by student_id ASC LIMIT $Page_Start , $Per_Page";
	$result=mysql_db_query($dbname,$sql);

	?>
	
<?
	$count=1;
	while($objResult = mysql_fetch_array($result))
	{
	?>
	  <tr>
		<td><div align="center"><?=$count;?></div></td>
		<td><?=$objResult["code_st"];?></td>
		<td><?=$objResult["name"];?></td>
		<td><div align="center"><?=$objResult["section"];?></div></td>
        <td><a href="editstudent.php?id_edit=<?=$objResult["student_id"]?>">edit</a></td>
			<td><a href="drop_student.php?id=<?=$objResult["student_id"]?>" onclick=\"return confirm(' ต้องการลบ $record[name] ออกจากระบบจริงหรือไม่ ')\">ลบ</a>
	  </tr>
	<?
	$count++;
	}
	?>
	</table>
	<p>Total 
	  <?= $Num_Rows;?> 
	  &nbsp;Record : 
	  <?=$Num_Pages;?>
	  &nbsp; 
	  Page :
	  <?
	if($Prev_Page)
	{
		echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page&Keyword=$_GET[Keyword]'><< Back</a> ";
	}

	for($i=1; $i<=$Num_Pages; $i++){
		if($i != $Page)
		{
			echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i&Keyword=$_GET[Keyword]'>$i</a> ]";
		}
		else
		{
			echo "<b> $i </b>";
		}
	}
	if($Page!=$Num_Pages)
	{
		echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page&Keyword=$_GET[Keyword]'>Next>></a> ";
	}
	
	}else{
	
 
	$count=0;
	$sql3="select * from student where permission=1 ";
	$result3=mysql_db_query($dbname,$sql3);
		$Num_Rows = mysql_num_rows($result3);

	$Per_Page = 10;   // Per Page

	$Page = $_GET["Page"];
	if(!$_GET["Page"])
	{
		$Page=1;
	}

	$Prev_Page = $Page-1;
	$Next_Page = $Page+1;

	$Page_Start = (($Per_Page*$Page)-$Per_Page);
	if($Num_Rows<=$Per_Page)
	{
		$Num_Pages =1;
	}
	else if(($Num_Rows % $Per_Page)==0)
	{
		$Num_Pages =($Num_Rows/$Per_Page) ;
	}
	else
	{
		$Num_Pages =($Num_Rows/$Per_Page)+1;
		$Num_Pages = (int)$Num_Pages;
	}
$sql3 .=" order  by student_id ASC LIMIT $Page_Start , $Per_Page";	
$result3=mysql_db_query($dbname,$sql3);
while($record3=mysql_fetch_array($result3)) {
		$count++;
		echo "
		<tr> 
			<td>$count</td>
			<td>$record3[code_st]</td>
			<td>$record3[name]</td>
			<td>$record3[section]</td>
			<td><a href=\"editstudent.php?id_edit=$record3[student_id]\"><img src=\"../images/icon-edit.gif\"></a></td>
			<td><a href=\"drop_student.php?id=$record3[student_id]\" onclick=\"return confirm(' ต้องการลบ $record[name] ออกจากระบบจริงหรือไม่ ')\"><img src=\"../images/b_drop.png\"></a>
		</tr>";
	}
?>
	</table>
	<p> Total
      <?= $Num_Rows;?>
&nbsp;Record :
<?=$Num_Pages;?>
&nbsp;Page :
<?
	if($Prev_Page)
	{
		echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page&Keyword=$_GET[Keyword]'><< Back</a> ";
	}

	for($i=1; $i<=$Num_Pages; $i++){
		if($i != $Page)
		{
			echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i&Keyword=$_GET[Keyword]'>$i</a> ]";
		}
		else
		{
			echo "<b> $i </b>";
		}
	}
	if($Page!=$Num_Pages)
	{
		echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page&Keyword=$_GET[Keyword]'>Next>></a> ";
	}
	
	}
		mysql_close( );
	?>
</p>
<p>&nbsp;    </p>
</div>
</div>
</body>
</html>
