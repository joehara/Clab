<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: /Clab/index.html"); 	exit();
}
?>
<HTML>
<? require "_header.php"; ?>


<?
$add_section=$_POST[add_section];
include "../connect.php";
$sql="select * from student where section_name='$add_section' ";
$result=mysql_db_query($dbname,$sql);
$num=mysql_num_rows($result);
if($num>0) {
	echo "<h3>ERROR : Section name was duplicate in Database</h3>";	 exit();
}
$sql="insert into section values('','$add_section')";
$result=mysql_db_query($dbname,$sql);
if ($result) {
	echo "<h3>Insert section name successful</h3>";
echo"<meta http-equiv=\"Refresh\" content=\"5; URL=add_section.php\">";
} else {
	echo "<h3>Error Can't insert to database</h3>";
}
mysql_close();
?>

<? require "_footer.php"; ?>
</html>
