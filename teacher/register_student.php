<?
include "../chksession.php";

if ($sess_table<>teacher) {
header( "Location: ../index.html"); exit();
}
?>
<HTML>
<HEAD><TITLE>Register</TITLE></HEAD>
<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
<link href="../templatemo_style.css" rel="stylesheet" type="text/css" />
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
<H1>:: �ѡ�����ŧ��������::</H1></center><br><br>
[ <a href="main.php">Back Main</a> &gt; <a href="mstudent.php">manage student</a> &gt;<a href="showstudent.php">Show Student/detail</a>&gt;�ѡ�����ŧ���������<br>
<br><br>

<table border="1">
<tr bgcolor="#D3D3D3">
<td>No.</td>
<td>Student Code</td>
<td>name-sername</td>
<td>section</td>
<td>year</td>
<td><td></td>
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
<td><a href=\"register_student2.php?id=$record[student_id]&permission=1\"><img src=\"../images/b_usrcheck.png\"></a></td>
<td><a href=\"register_student2.php?id2=$record[student_id]\" onclick=\"return confirm(' ����ź $record[name] ���ҡ��������� ')\"><img src=\"../images/b_usrdrop.png\"></a></td>
</tr>";
}
mysql_close();
?>
</table>
</div></div>
</BODY>
</HTML>


