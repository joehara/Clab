<?
include "../chksession.php";
if ($sess_table<>teacher) {
	header( "Location: /Clab/index.html"); 	exit();}

include "../function.php";
include "../connect.php";
$sql="select * from teacher where username='$sess_username' ";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);

$username=$record[username];
$name=$record[name];
$email=$record[email];
$phone=$record[phone];
$reg_date=$record[reg_date];
mysql_close();

?>
<HTML>
<? require "_header.php"; ?>
<center>
<h1>ข้อมูลส่วนตัว</h1><br><br></center>
<a href="main.php">Home</a>&gt; ข้อมูลส่วนตัว<center><br>
  <table cellspacing="2">
    <tbody><tr> 
      <td><b>Username : </b></td><td><?=$username?></td>
    </tr>
    <tr> 
      <td><b>ชื่อ-สกุล : </b></td><td><?=$name?></td>
    </tr>
    <tr>
      <td><b>Email : </b></td><td><?=$email?></td>
    </tr>
    <tr> 
      <td><b>Telephone : </b></td><td><?=$phone?></td>
    </tr>
    <tr>
      <td><b>Register Date :</b></td><td><?= displaydate($reg_date) ?></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
  </tbody></table>
</form>
<a href="changepw.php"><img src="/Clab/images/changePass.jpeg" alt="Change Password" /></a><br>
<a href="changepw.php">Change Password</a></center>
<? require "_footer.php"; ?>
</html>
