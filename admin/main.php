<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: ../index.html"); 	exit();
}
?>
<html>
<? require "_header.php"; ?>

<center><h1><u>Main Menu</u></h1></center>
<br><br>      
<center><table border="0">
<tr>
<td><center><a href="mclass.php"><img src="../images/golden_star.png" alt="Management Student" /><br><font size="2"><b>จัดการห้องเรียน</b></font></a></center></td>
<td><center><a href="mstudent.php"><img src="../images/personal.png" alt="Management Student" /><br><font size="2"><b>จัดการข้อมูลนักศึกษา</b></font></a></center></td>
<td><center><a href="mteacher.php"><img src="../images/user.png" alt="Management Teacher" /><br><font size="2"><b>จัดการข้อมูลอาจารย์</b></font></a></center></td>
<td><center><a href="m_lesson.php"><img src="../images/file_manager.png" alt="Management Lesson" /><br><font size="2"><b>จัดการบทเรียน</b></font></a></center></td>
</tr>
<tr>
<td><center><a href="m_scroll.php"><img src="../images/old_openofficeorg_calc.png" alt="Management Score" /><br><font size="2"><b>จัดการคะแนน</b></font></a></center></td>
<td><center><a href="changepw.php"><img src="../images/password.png" alt="change password" /><br><font size="2"><b>เปลี่ยนรหัสผ่าน</b></font></a></center></td>
<td><center><a href="../logout.php"><img src="../images/application_exit.png" alt="Logout" /><br><font size="2"><b>Logout</b></font></a></center></td>
</tr>
</table>
</center>  

<? require "_footer.php"; ?>
</html>
