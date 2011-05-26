<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: ../index.html"); 	exit();
}
$code=$_POST[codest];
$userst=$_POST[userst];
$passst=$_POST[password];
$namest=$_POST[namest];
$secst=$_POST[section];
$email_st=$_POST[email_st];
$phone_st=$_POST[phone_st];
$address_st=$_POST[address_st];
$permission=$_POST[permission];
$date_reg=date("Y-m-d");
?>

<HTML>
<? require "_header.php"; ?>

<?
if ($userst==""  or $namest=="" ) {
	echo "<h3>ERROR : Don't have user or pass in Textbox $passst<h3>"; exit();

}
include "../function.php";
if (!checkemail($email_st)) {
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


$sql3="insert into student values('','$code','$userst','$passst','$namest','$secst',
'$email_st','$phone_st','$address_st','$permission','$date_reg')";
$result2=mysql_db_query($dbname,$sql3);
if ($result2) {
	echo "<h3>Insert student successful</h3>";
echo"$permission";
	echo "<A HREF='main.php'>Back Management</A><BR><BR>";
} else {
	echo "<h3>Error Can't insert to database</h3>";
}
mysql_close();
?>
</table>

<? require "_footer.php"; ?>
</HTML>
