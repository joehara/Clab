<?
session_start();
ob_start();
	
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login To C programming Exam</title></head>
<meta http-equiv="Refresh" content="2; URL=/Clab/index.html">
<body bgcolor="#ADD8E6">
<br><br><br><br><br><br>
<center>
<table width="482" border="0" align="center">
  <tr>
    <td width="480" height="250" colspan="2"  background="/Clab/images/form_er1.jpg"><div align="center" class="style1"></div></td>
  <td> </td>
</tr>
  



<?
$user_login=$_POST[user_login];
$pass_login=$_POST[pass_login];
$pass=base64_encode($pass_login);
//$table=$_POST[table];

if ($user_login=="" and $pass_login=="") {
	echo ""; exit();
}
include "connect.php";

$sql="select * from admin where username='$user_login' and password='$pass'";
$result=mysql_db_query($dbname,$sql);
$num=mysql_num_rows($result);

$sql2="select * from teacher where username='$user_login' and password='$pass'";
	$result2=mysql_db_query($dbname,$sql2);
	$num2=mysql_num_rows($result2);

$sql3="select * from student where code_st='$user_login' and password='$pass' and permission='1' ";
		    $result3=mysql_db_query($dbname,$sql3);
		    $num3=mysql_num_rows($result3);

if($num>0){
startAdmin($user_login);
}else if($num2>0){
startTeacher($user_login);
}else if($num3>0){
startStudent($user_login);
}else{
echo ""; exit();
}


function startAdmin($user){

	$_SESSION[sess_userid]=session_id();
	$_SESSION[sess_username]=$user;
	$_SESSION[table]='admin';
	header("Location: admin/main.php");
}
function startTeacher($user){

	$_SESSION[sess_userid]=session_id();
	$_SESSION[sess_username]=$user;
	$_SESSION[table]='teacher';
	header("Location: teacher/main.php");
}
function startStudent($user){

	$_SESSION[sess_userid]=session_id();
	$_SESSION[sess_username]=$user;
	$_SESSION[table]='student';
	header("Location: student/main.php"); 
}

mysql_close();
?>

</table>
</div>
</body>
</html>
