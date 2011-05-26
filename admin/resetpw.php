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

<a href="main.php">Back Main</a>&gt;<a href="mteacher.php"> Teacher Management</a>&gt;<a href="editteacher.php?id_edit=<?=$id_edit;?>&username=<?=$username?>""> Edit Teacher</a>&gt; Reset Password<br><br>

<p><H1>You are changing password  <?=$username?></H1></p>
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
