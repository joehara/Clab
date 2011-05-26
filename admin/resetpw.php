<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: ../index.html"); 	exit();
}

$id_edit=$_GET[id_edit];
$username=$_GET[username];
?>
<HTML>
<? require "_header.php"; ?>
<center><H1>คุณต้องการเปลี่ยนรหัสผ่านของ  <?=$username?></H1></center><br><br>
<a href="main.php">Home</a>&gt;<a href="mteacher.php"> จัดการข้อมูลอาจารย์</a>&gt;<a href="editteacher.php?id_edit=<?=$id_edit;?>&username=<?=$username?>""> แก้ไขข้อมูลอาจารย์</a>&gt; เปลี่ยนรหัสผ่าน<br><br><br>


<form method="post" action="resetpw2.php?username=<?=$username?>" >
  <table style="text-align: left; width: 361px; height: 36px;" cellspacing="2">
    <tbody>
      <tr>
        <td >New password</td>
        <td ><input type="password" name="resetpw"><br>
        </td>
      </tr>
    </tbody>
  </table>
<table style="text-align: left; width: 361px; height: 36px;" cellspacing="2"> 
<tbody>
<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><INPUT TYPE="Submit" VALUE="Change"></td> 
</tr>

    </tbody>
  </table>

</form>

<? require "_footer.php"; ?>
</html>
