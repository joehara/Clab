<?
include "../chksession.php";

if ($sess_table<>teacher) {
header( "Location: /Clab/index.html"); exit();
}
?>
<HTML>
<HEAD><TITLE>Register</TITLE></HEAD>
<link href="/Clab/templatemo_style.css" rel="stylesheet" type="text/css" />
<meta content="text/html; charset=UTF-8" http-equiv="content-type">
<style type="text/css">
<!--
.style1 {font-size: 36px}
-->
<form method="post" action="editlesson2.php?id_edit=<?=$id_edit;?>">
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
<div id="templatemo_middle_column"><center>
<H1>:: นักศึกษาที่ลงทะเบียนเข้ามา ::</H1></center><br><br>
[ <a href="main.php">Back Main</a> &gt; <a href="mstudent.php">manage student</a> &gt;<a href="showstudent.php">Show Student/detail</a>&gt;นักศึกษาที่ลงทะเบียนผ่านเว็บ<br>
<br><br>

<table border="1">
<tr bgcolor="#D3D3D3">
<td>No.</td>
<td><center>Student ID</center></td>
<td><center>Name</center></td>
<td><center>section</center></td>
<td><center>year</center></td>
<td><center>Accept</center></td>
<td><center>Dismiss</center></td>
</tr>
<?
$count=0;
include "../connect.php";
$sql="select * from student where permission='0'";
$result=mysql_db_query($dbname,$sql);
while($record=mysql_fetch_array($result)) {
$count++;
echo "
<tr>
<td>$count</td>
<td>$record[code_st]</td>
<td>$record[name]</td>
<td>$record[section]</td>
<td>$record[year]</td>
<td><center><a href=\"register_student2.php?id=$record[student_id]&permission=1\"><img src=\"/Clab/images/b_usrcheck.png\"></a></center></td>
<td><center><a href=\"register_student2.php?id2=$record[student_id]\" onclick=\"return confirm(' ต้องการลบ $record[name] ออกจากระบบจริงหรือไม่')\"><img src=\"../images/b_usrdrop.png\"></a></center></td>
</tr>";
}
mysql_close();
?>
</table>
</div></div>
</BODY>
</HTML>


