<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: /Clab/index.html"); 	exit();
}

$id_edit=$_GET[id_edit];
$code_st=$_GET[code_st];
?>
<HTML>
<? require "_header.php"; ?>
<center><H1>คุณต้องการเปลี่ยนรหัสผ่านของ  <?=$code_st?></H1></center><br><br>
<a href="main.php">Home</a>&gt;<a href="mstudent.php"> จัดการข้อมูลนักศึกษา</a>&gt; <a href="editstudent.php?id_edit=<?=$id_edit;?>&code_st=<?=$code_st?>"> แก้ไขข้อมูลนักศึกษา</a>&gt; เปลี่ยนรหัสผ่าน<br><br><br>

<form method="post" action="resetpwst2.php?code_st=<?=$code_st;?>" >
  <table style="text-align: left; width: 361px; height: 36px;" cellspacing="2">
    <tbody>
      <tr>
        <td >New password</td>
        <td ><input type="password" name="resetpw"><br>
        </td>
	<td><INPUT TYPE="Submit" VALUE="Change"></td>       
	</tr>
    </tbody>
  </table>

</form>

<? require "_footer.php"; ?>
</html>
