<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: /Clab/index.html"); 	exit();
}
?>
<html>
<? require "_header.php"; ?>

<center><h1>จัดการห้องเรียน</h1></center>
<br><br> 
<a href="main.php">Home</a>&gt; จัดการห้องเรียน</a><br><br><br>
<center><table border="0">
<tr>
<td><center><a href="add_section.php"><img src="/Clab/images/network_add.png" alt="Add Section" /><br>เพิ่มห้องเรียน</a></center></td>
<td><center><a href="add_academic_year.php"><img src="/Clab/images/x_office_calendar.png" alt="Add Year" /><br>เพิ่มปีการศึกษา</a></center></td>

</tr>

</table>
</center>  


<? require "_footer.php"; ?>
</html>
