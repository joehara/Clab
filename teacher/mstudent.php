<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}
?>
<HTML>

<? require "_header.php"; ?>
<center>
<H1>จัดการข้อมูลนักศึกษา</H1><br><br></center>
<a href="main.php"> Home</a> &gt;  จัดการข้อมูลนักศึกษา<br>

<br><br><br>      
<center><table border="0">
<tr>
<td><center><a href="showstudent.php"><img src="../images/user_group_01.png" alt="show student/detail" /><br><font size="1">show student/detail</font></a></center></td>
<td><center><a href="report.php"><img src="../images/check.png" alt="ตรวจข้อสอบที่มีการส่งเข้ามา" /><br><font size="1">ตรวจข้อสอบที่มีการส่งเข้ามา</font></a></center></td>
<td><center><a href="check_al.php"><img src="../images/check_mark.png" alt="ข้อสอบที่ทำการตรวจแล้ว" /><br><font size="1">ข้อสอบที่ทำการตรวจแล้ว</font></a></center></td>
<td><center><a href="fix_send.php"><img src="../images/clock4.png" alt="กำหนดเวลาในการส่งงาน" /><br><font size="1">กำหนดเวลาในการส่งงาน</font></a></td>
<td><center><a href="report_score.php"><img src="../images/gtk_print_report.png" alt="รายงานผลคะแนน" /><br><font size="1">รายงานผลคะแนน</font></a></center></td>
</tr>
</table>
</center>

<? require "_footer.php"; ?>
</HTML>
