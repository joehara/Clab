<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: /Clab/index.html"); 	exit();
}
?>
<HTML>
<? require "_header.php"; ?>

<?
$lesson=$_GET[lesson];
$question=$_POST[question];
$help=$_POST[help];

$level=$_POST[level];
$help2 = htmlspecialchars($help, ENT_QUOTES);

if ($question=="" ) {
	echo "<h3>ERROR : Don't have Question<h3>"; exit();
}


include "../connect.php";

$sql="select * from teacher where username='$sess_username'";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);
$name=$record[name];

$sql2="select * from proposition where proposition='$question' ";
$result2=mysql_db_query($dbname,$sql2);
$num2=mysql_num_rows($result2);
if($num2>0) {
	echo "<h3>ERROR : Question duplicate in Database</h3>";	 exit();
}

$sql3="insert into proposition values('','$question','$help2','$name','$level','$lesson')";
$result3=mysql_db_query($dbname,$sql3);
if ($result3) {
	echo "<h3>Insert question successful</h3>";
	echo "<A HREF='proposition.php?id_edit=$id&lesson=$lesson'>Back Management</A><BR><BR>";
} else {
	echo "<h3>Error Can't insert to database</h3>";

}
mysql_close();
?>

<? require "_footer.php"; ?>
</html>
