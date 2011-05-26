<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: ../index.html"); 	exit();
}
$code=$_POST[code];
$username=$_POST[username];
$password=base64_encode(1234);
$name=$_POST[name];
$email=$_POST[email];
$phone=$_POST[phone];
$address=$_POST[address];
$date_reg=date("Y-m-d");
?>

<HTML>
<? require "_header.php"; ?>

<?

if ($username=="" or $password=="" or $name=="" ) {
	echo "<h3>ERROR : Don't have user or pass in Textbox<h3>"; exit();
}
include "../function.php";
if (!checkemail($email)) {
	echo "<h3>ERROR : email differant format</h3>"; exit();
}
include "../connect.php";
$sql="select * from teacher where username='$username' ";
$result=mysql_db_query($dbname,$sql);
$num=mysql_num_rows($result);
if($num>0) {
	echo "<h3>ERROR : Username was duplicate in Database</h3>";	 exit();
}


$sql="insert into teacher values('','$username','$password','$name',
'$email','$phone','$address','$date_reg')";
$result=mysql_db_query($dbname,$sql);
if ($result) {
	echo "<h3>Insert Teacher successful</h3>";
	echo "<A HREF='mteacher.php'>Back Management Teacher</A><BR><BR>";
} else {
	echo "<h3>Error Can't insert to database</h3>";
}
mysql_close();
?>

<? require "_footer.php"; ?>
</HTML>
