<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: ../index.html"); 	exit();
}
?>
<HTML>
<? require "_header.php"; ?>

<center>
<h1>เปลี่ยนรหัสผ่าน</h1></center><br><br>
<a href="main.php">Home</a>&gt; เปลี่ยนรหัสผ่าน<br><br>
<FORM METHOD=POST ACTION="changepw2.php">
  <TABLE cellspacing="2">
    <TR> 
      <TD>Username : </TD> <TD><?=$sess_username?></TD>
    </TR>
    <TR> 
      <TD>Old password : </TD><TD><INPUT name="oldpass" type="password"> * </TD>
    </TR>
    <TR> 
      <TD>New password: </TD><TD><INPUT name="newpass" type="password"> * </TD>
    </TR>
    <TR> 
      <TD>Comfirm password : </TD><TD><INPUT name="newpass2" type="password"> * </TD>
    </TR>
    <TR> 
      <TD>&nbsp;</TD>
      <TD><INPUT TYPE="Submit" VALUE="Submit"> <INPUT TYPE="Reset" VALUE="Reset"></TD>
    </TR>
  </TABLE>
</FORM>

<? require "_footer.php"; ?>
</HTML>
