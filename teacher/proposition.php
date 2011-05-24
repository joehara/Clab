<? 
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}
$id=$_GET[id_edit];
$lesson=$_GET[lesson];
?>
<HTML>
<HEAD><TITLE>Proposition</TITLE></HEAD>
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
<div id="templatemo_middle_column"><center>
<h1>:: Question of Lesson <?=$lesson?> ::</h1></center><br><br>
[ <a href="showlesson.php">Back Lesson</a> ]<br><br><br>

<table border="0">
<tr>
<td><center><a href="adquestion.php?id_edit=<?=$id?>&lesson=<?=$lesson?>"><img src="../images/comment_add2.png" alt="Add Proposition" /><br> Add Proposition </a></center></td>
</tr>
</table>


<script language="JavaScript">
	function ClickCheckAll(vol)
	{
	
		var i=1;                          
		for(i=1;i<=document.frmMain.hdnCount.value;i++)
		{
			if(vol.checked == true)
			{
		
				eval("document.frmMain.chkDel"+i+".checked=true");
			}
			else
			{
				eval("document.frmMain.chkDel"+i+".checked=false");
			}
		}
	}
	
	function Submit_OnClick()
{	

	for(i = 0;i < 10;i++)
	{		
		if(document.getElementById("chkDel"+i).checked)
		{
			document.getElementById("random"+i).value = 1

		}
		else
		{
			alert('Hello ThaiCreate.Com');
			document.getElementById("random"+i).value = 0
		}
	}
}

</script>
<form name="frmMain" action="proposition_rd.php" method="post" OnSubmit="return onDelete();"> 

<?
include"../connect.php";
$sql = "SELECT * FROM proposition where ref_lesson='$lesson'";
$result=mysql_db_query($dbname,$sql);
?>
<table width="770" border="1">
  <tr bgcolor="#D3D3D3">
    <th width="56"> <div align="center">No</div></th>
    <th width="488"> <div align="center">Question</div></th>
    <th width="120"> <div align="center">ผู้ออกโจทย์</div></th>
    <th width="55"> <div align="center">ระดับ</div></th>
    <th width="38"> <div align="center">
      <input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
    </div></th>
  </tr>
<?
$i = 0;


$sqlx="select * from teacher where username='$sess_username'";
$resultx=mysql_db_query($dbname,$sqlx);
$record=mysql_fetch_array($resultx);

while($objResult = mysql_fetch_array($result))
{
$sql2="select * from teacher_random,teacher where teacher_random.question_id='$objResult[question_id]' and teacher_random.teacher_id=teacher.teacher_id and teacher.name='$record[name]'";
$result2=mysql_db_query($dbname,$sql2);
$num=mysql_num_rows($result2);

		if($objResult[level]==1){
		$level='ข้อยาก';
		}else{
		$level='ข้อง่าย';
		}
$i++;
?>
  <tr>
    <td><div align='center'><?=$i;?></div></td>
    <td><? 
if($objResult[create_by]==$record[name]){
echo"<a href='edquestion.php?id=$objResult[question_id]'>";
echo"$objResult[proposition]";
}else{
echo "$objResult[proposition]";
}?></td>
    <td><?=$objResult[create_by];?></td>
    <td><div align='center'><?=$level;?></div></td>
    <td align='center'><input type='checkbox' name="chkDel[]" id="chkDel<?=$i;?>" value="<?=$objResult[question_id];?>" <?


if($num>0){
echo"checked";
}else{
echo"";
}
?>
></td>
  </tr>
<?
}
 ?>
 
</table>
<br />
<?

	$sql3="select * from proposition where ref_lesson='$lesson'";
	$result3=mysql_db_query($dbname,$sql3);
	$num=mysql_num_rows($result3);
	if($num==0){
	echo "<h3>ยังไม่มีโจทย์</h3>";
	}
mysql_close( );
?>
<input type="submit" name="btnDelete" value="UPDATE" onclick="Submit_OnClick()">
<input type="hidden" name="hdnCount" value="<?=$i;?>">

<input name="lesson" type="hidden" id="lesson" value="<?=$lesson;?>" />
</form>
</div>
</div>
</body>
</html>
