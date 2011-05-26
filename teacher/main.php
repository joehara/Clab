<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: /Clab/index.html"); 	exit();
}
?>
<html>

<? require "_header.php"; ?>
<? 
include"../connect.php";
$sql="select * from teacher where username='$sess_username'";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);
$password=base64_decode($record[password]);


if($password=='1234'){
echo"<span style=\"color: rgb(255, 0, 0);\">password ของคุณยังเป็นค่าเดิมครับ กรุณาเปลี่ยน password</span>";
}
?>
<br><br><br><br>
<center><h1><u>Main Menu</u></h1></center>
<br><br>
<center><table border="0">
<tr>
<td><center><a href="mstudent.php"><img src="/Clab/images/personal.png" alt="Management Student" /><br><font size="2"><b>จัดการข้อมูลนักศึกษา</b></font></a></center></td>
<td><center><a href="showlesson.php"><img src="/Clab/images/file_manager.png" alt="add/edit lesson" /><br><font size="2"><b>จัดการบทเรียน</b></font></a></center></td>
<td><center><a href="showprofile.php"><img src="/Clab/images/summer_user.png" alt="Show Profile" /><br><font size="2"><b>ข้อมูลส่วนตัว</b></font></a></center></td>
<td><center><a href="../logout.php"><img src="/Clab/images/application_exit.png" alt="Logout" /><br><font size="2"><b>ออกจากระบบ</b></font></a></center></td>
</tr>
</table>
</center>

<? require "_footer.php"; ?>
</html>
