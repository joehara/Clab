<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<link rel="stylesheet" type="text/css" href="../Oranges/style.css" />
<title>Drop Lesson</title>
</head>
<body>

<?
$id=$_GET[id];
include "../connect.php";
$sql2="delete from HeadLesson where id='$id' ";
$result2=mysql_db_query($dbname,$sql2);
if ($result2) {
	echo "<h3>Delete successful</h3>";
	echo "<meta http-equiv=\"Refresh\" content=\"2; URL=m_lesson.php\">";
} else {
	echo "<h3>ERROR Delete unsucessful</h3>";
}
mysql_close();
?>

</body>
</html>
