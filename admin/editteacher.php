<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: ../index.html"); 	exit();
}

$id_edit=$_GET[id_edit];
include "../function.php";

include "../connect.php";
$sql="select * from teacher where teacher_id='$id_edit' ";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);

$code=$record[code];
$username=$record[username];
$password=$record[password];
$name=$record[name];
$email=$record[email];
$phone=$record[phone];
$reg_date=$record[reg_date];

mysql_close();
?>
<HTML>
<? require "_header.php"; ?>
<center>
<h1>แก้ไขข้อมูลอาจารย์</h1></center><br><br>
<a href="main.php">Home</a>&gt;<a href="mteacher.php"> จัดการข้อมูลอาจารย์</a>&gt; แก้ไขข้อมูลอาจารย์<br>
<br>
<form METHOD="POST" action="editteacher2.php?id=<?=$id_edit?>" name="teacher">
  <table  border="0" cellpadding="2" cellspacing="2">
    <tbody>
      <tr>
        <td>Username<br></td><td><input name="username" value="<?=$username?>">
          <a href="resetpw.php?id_edit=<?=$id_edit;?>&username=<?=$username?>">[reset password]</a><br></td>
      </tr>
        <td style="vertical-align: top;">Name<br>        </td>
        <td style="vertical-align: top;"><input name="name" value="<?=$name?>"><br>        </td>
      </tr>
      <tr>
        <td style="vertical-align: top;">Email<br>        </td>
        <td style="vertical-align: top;"><input name="email" value="<?=$email?>"><br>        </td>
      </tr>
      <tr>
        <td style="vertical-align: top;">Phone<br>        </td>
        <td style="vertical-align: top;"><input name="phone" value="<?=$phone?>"><br>        </td>
      </tr>
      <tr>
        <td style="vertical-align: top;">Register<br>        </td>
	<td><?=displaydate($reg_date)?><br></td>
	</tr>
	<tr>
        <td style="vertical-align: top;"><INPUT TYPE="Submit" VALUE="UPDATE"></button><br>        </td>
      </tr>
    </tbody>
  </table>
  <br>
  <br>
</form>
<?require "_footer.php"; ?>
</html>
