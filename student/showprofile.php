<?
include "../chksession.php";
if ($sess_table<>student) {
	header( "Location: /Clab/index.html"); 	exit();}

include "../function.php";
include "../connect.php";
$sql="select * from student where code_st='$sess_username' ";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);

$code=$record[code_st];
$name=$record[name];
$section=$record[section];
$email=$record[email];
$phone=$record[phone];
$address=$record[address];
$reg_date=$record[st_reg];
mysql_close();

?>
<HTML>
<? require "_header.php"; ?>

<center>
<h1>ข้อมูลส่วนตัว</h1><br><br></center>
<a href="main.php">Home</a>&gt; ข้อมูลส่วนตัว<center><br>
  <table cellspacing="2">
    <tbody><tr> 
      <td><b>Student ID : </b></td><td><?=$code?></td>
    </tr>
    <tr> 
      <td><b>Name : </b></td><td><?=$name?></td>
    </tr>
    <tr> 
      <td><b>Section : </b></td><td><?=$section?></td>
    </tr>
    <tr>
      <td><b>Email : </b></td><td><?=$email?></td>
    </tr>
    <tr> 
      <td><b>Telephone : </b></td><td><?=$phone?></td>
    </tr>
    <tr> 
      <td valign="top"><b>Address :</b></td><td><?=$address?></td>
    </tr>
    <tr>
      <td><b>Register Date :</b></td><td><?=displaydate($reg_date)?></td>
    </tr>	
	
    <tr> 
      <td>&nbsp;</td>
    </tr>
  </tbody></table>
</form>
<a href="changepw.php"><img src="/Clab/images/changePass.jpeg" alt="Change Password" /></a><br>
<a href="changepw.php">เปลี่ยนรหัสผ่าน/a></center>
<?require "_footer.php"?>
</html>
