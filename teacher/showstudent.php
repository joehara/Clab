<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}
?>
<HTML>
<? require "_header.php"; ?>
<center>
<H1>:: Show Student ::</H1></center><br><br>
[ <a href="main.php">Back Main</a>&gt; <a href="mstudent.php">manage studen</a>t &gt; show student/detail<br><br>

<table border="0">
<tr>
<td><center><a href="import.php"><img src="../images/import_document.png" alt="Import file" /><br> Import file </a></center></td>
<td><center><a href="register_student.php"><img src="../images/user_expert.png" alt="นักศึกษาที่ลงทะเบียนผ่านเว็บ" /><br> นักศึกษาที่ลงทะเบียนผ่านเว็บ </a></center></td>
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
    </tr>
  </table>
</form>
<table width="512" border="1" >
  
<tr bgcolor="#D3D3D3">
		<th width="91"> <div align="center">No.</div></th>
		<th width="98"> <div align="center">Student ID</div></th>
		<th width="198"> <div align="center">Name</div></th>
		<th width="97"> <div align="center">Section</div></th>
		<th width="97"> <div align="center">Year</div></th>
		<th width="97"> <div align="center">Edit</div></th>        	
		<th width="97"> <div align="center">Delete</div></th>
	  </tr>
<?
	include"../connect.php";
$sql="select * from teacher where username='$sess_username'";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);
$name=$record[name];

if($_GET["Keyword"] != "")
	{
	
	// Search By Name or Email

	$sql = "SELECT * FROM student WHERE (name LIKE '%".$_GET["Keyword"]."%' or section LIKE '%".$_GET["Keyword"]."%') and permission>0 and teach='$name'  ";
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
		<td><?=$objResult["year"];?></td>
        <td><a href="editstudent.php?id_edit=<?=$objResult["student_id"]?>"><img src="/Clab/images/icon-edit.gif"></a></td>
			<td><a href="drop_student.php?id=<?=$objResult["student_id"]?>" onclick=\"return confirm(' ต้องการลบ $record[name] ออกจากระบบจริงหรือไม่ ')\"><img src="/Clab/images/b_drop.png"></a>
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
	$sql3="select * from student where permission=1 and teach='$name' ";
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
			<td><center>$record3[section]</center></td>
			<td><center>$record3[year]</center></td>
			<td><center><a href=\"editstudent.php?id_edit=$record3[student_id]\"><img src=\"/Clab/images/icon-edit.gif\"></a></center></td>
			<td><center><a href=\"drop_student.php?id=$record3[student_id]\" onclick=\"return confirm(' ต้องการลบ $record[name] ออกจากระบบจริงหรือไม่ ')\"><img src=\"/Clab/images/b_drop.png\"></a></center>
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
<? require "_footer.php"; ?>
</html>
