<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}

$id_edit=$_GET[id_edit];
$code_st=$_GET[code_st];
?>
<HTML>
<? require "_header.php"; ?>

<p><H1>You are changing password  <?=$code_st?></H1></p>
<form method="post" action="resetpw2.php?code_st=<?=$code_st;?>" >
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
