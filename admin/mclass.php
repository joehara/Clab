<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: /Clab/index.html"); 	exit();
}
?>
<html>
<? require "_header.php"; ?>

<center><h1><u>Class Management</u></h1></center>
<br><br> 
<p><a href="main.php">Back Main</a>&gt; <a href="mclass.php">Class Management</a></p><br><br><br>
<center><table border="0">
<tr>
<td><center><a href="add_section.php"><img src="/Clab/images/network_add.png" alt="Add Section" /><br>Add Section</a></center></td>
<td><center><a href="add_academic_year.php"><img src="/Clab/images/x_office_calendar.png" alt="Add Year" /><br>Add Year</a></center></td>

</tr>

</table>
</center>  


<? require "_footer.php"; ?>
</html>
