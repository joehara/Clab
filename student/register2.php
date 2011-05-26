<?
$code_st=$_POST[codest];
$password=base64_encode(1234);
$name=$_POST[namest];
$section=$_POST[section];
$year=$_POST[year];
$teach=$_POST[teach];
$email=$_POST[email_st];
$phone=$_POST[phone_st];
$st_reg=date("Y-m-d");

?>
<HTML>
<HEAD><TITLE>Registration</TITLE>
<link href="../templatemo_style2.css" rel="stylesheet" type="text/css" />
<meta content="text/html; charset=UTF-8" http-equiv="content-type">
<meta http-equiv="Refresh" content="2; URL=/Clab/student/register.php">
</HEAD>
<body>
<center>
<img src="/Clab/images/templatemo_heading_background.jpg" width="690" height="146"></center><br><br><br><br><br><br>
<center>
<?

if ($code_st==""  or $name=="" ) {
	echo "<h3>ERROR : Don't have code student in Textbox<h3>"; exit();

}
include "../function.php";
if (!checkemail($email)) {
	echo "<h3>ERROR : email differant format</h3>"; exit();
}
include "../connect.php";
$sql="select * from student where username='$userst' ";
$result=mysql_db_query($dbname,$sql);
$num=mysql_num_rows($result);
if($num>0) {
	echo "<h3>ERROR : Username was duplicate in Database</h3>";	 exit();
}

/*$sql="select * from teacher where password='$password'";
$result=mysql_db_query($dbname,$sql);
$num=mysql_num_rows($result);
if($num>0){
	echo "<h3>ERROR : Password was duplicate in Database</h3>";exit();}*/


$sql3="insert into student values('','$code_st','$password','$name','$section',
'$year','$teach','$email','$phone','0','$st_reg')";
$result2=mysql_db_query($dbname,$sql3);
if ($result2) {
	echo "<h3>Insert student successful</h3>";
	echo "รอการตอบรับจาก อาจารย์ ที่ปรึกษา";

	echo "<A HREF='../../index.html'>กลับสู่หน้าหลัก</A><BR><BR>";
} else {
	echo "<h3>Error Can't insert to database</h3>";
}
?>
</center>
<center><div id="templatemo_footer"><br>
copyright © 20010-2011 College of Industrial Technology || King Mongkut's University of Technology North Bangkok
</div></center>
</div>
</div>
</body>
</html>

<?
mysql_close();
?>
