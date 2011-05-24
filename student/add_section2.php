<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=TIS-620" />
<title>Untitled Document</title>
</head>

<body>
<?
$add_section=$_POST[add_section];
include "../connect.php";
$sql="select * from student where section_name='$add_section' ";
$result=mysql_db_query($dbname,$sql);
$num=mysql_num_rows($result);
if($num>0) {
	echo "<h3>ERROR : Section name was duplicate in Database</h3>";	 exit();
}
$sql="insert into Section values('','$add_section')";
$result=mysql_db_query($dbname,$sql);
if ($result) {
	echo "<h3>Insert section name successful</h3>";
echo"<meta http-equiv=\"Refresh\" content=\"5; URL=addstudent.php\">";
} else {
	echo "<h3>Error Can't insert to database</h3>";
}
mysql_close();
?>
</body>
</html>
