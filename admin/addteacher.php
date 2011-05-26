<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: ../index.html"); 	exit();
}
?>
<HTML>
<? require "_header.php"; ?>

<center>
<p><h1>เพิ่มอาจารย์</h1></center><br><br>
<a href="main.php">Home</a>&gt;<a href="mteacher.php"> จัดการข้อมูลอาจารย์</a>&gt; เพิ่มอาจารย์<br><br>
<form METHOD="POST" action="addteacher2.php" name="teacher">
  <table  border="0" cellpadding="2" cellspacing="2">
    <tbody>
      <tr>
        <td>Username<br></td><td><input name="username"><br></td>
      </tr>
        <td style="vertical-align: top;">Name<br>        </td>
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
