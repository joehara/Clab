<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: ../index.html"); 	exit();
}
?>
<HTML>
<? require "_header.php"; ?>

<center>
<p><h1>:: Add Teacher ::</h1></center><br><br>
<a href="main.php">Back Main</a>&gt;<a href="mteacher.php"> Teacher Management</a>&gt; Add Teacher<br><br>
<form METHOD="POST" action="addteacher2.php" name="teacher">
  <table  border="0" cellpadding="2" cellspacing="2">
    <tbody>
      <tr>
        <td>username<br></td><td><input name="username"><br></td>
      </tr>
        <td style="vertical-align: top;">&#3594;&#3639;&#3656;&#3629;-&#3609;&#3634;&#3626;&#3585;&#3640;&#3621;<br>        </td>
        <td style="vertical-align: top;"><input name="name"><br>        </td>
      </tr>
      <tr>
        <td style="vertical-align: top;">Email<br>        </td>
        <td style="vertical-align: top;"><input name="email"><br>        </td>
      </tr>
      <tr>
        <td style="vertical-align: top;">Phone<br>        </td>
        <td style="vertical-align: top;"><input name="phone"><br>        </td>
      </tr>
      <tr>
        <td style="vertical-align: top;">Address<br>        </td>
        <td style="vertical-align: top;"><label>
          <textarea name="address" id="address" cols="45" rows="5"></textarea>
          </label>
          <br>        </td>
      </tr>
      <tr>
        <td style="vertical-align: top;"><br>        </td>
        <td style="vertical-align: top;"><INPUT TYPE="Submit" VALUE="ADD"></button><br>        </td>
      </tr>
    </tbody>
  </table>
  <br>
  <br>
</form>

<? require "_footer.php"; ?>
</html>
