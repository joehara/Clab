<?
include "../chksession.php";
if ($sess_table<>student) {
	header( "Location: /Clab/index.html"); 	exit();
}
?>
<html>
<? require "_header.php"; ?>

<? include"../connect.php";
		$sql="select * from student where code_st='$sess_username'";
		$result=mysql_db_query($dbname,$sql);
		$record=mysql_fetch_array($result);
		$password=base64_decode($record[password]);

		if($password=='1234'){
		echo"<span style=\"color: rgb(255, 0, 0);\">password ของคุณยังเป็นค่าเดิมครับ กรุณาเปลี่ยน  password</span>";}?>
<br><br>
<center><h1>Main Menu</u></h1></center>
<br>
<center><table border="0">
<tr>
<td><center><a href="lesson.php"><img src="/Clab/images/report_check.png" alt="Lesson" /><br><b>แบบฝึกหัด</b></a></center></td>
<td><center><a href="showprofile.php"><img src="/Clab/images/summer_user.png" alt="Show Profile" /><br><b>ข้อมูลส่วนตัว</b></a></center></td>
<td><center><a href="../logout.php"><img src="/Clab/images/application_exit.png" alt="Logout" /><br><b>ออกจากระะบบ</b></a></center></td>
</tr>
</table>
</center>            	



<? require "_footer.php"; ?>
</html>
