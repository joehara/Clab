<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}
?>
<HTML>
<? require "_header.php"; ?>

<center>
<h1>:: Import student from file ::</h1><br></center>
[ <a href="mstudent.php">Manage Student</a> ]<br>
<br>
<table border="0">
<tr>
<tr><td><center><b>วิธีการนำข้อมูลนักเรียนเข้า database</b></center></td></tr>
<tr><td>1.download file ต้นฉบับ นาสกุล CSV &nbsp;&nbsp;<a href="EXEM/Book1.csv">download here</a></td></tr>
<tr><td>2.เปิด file โดยใช้ โปรแกรม microsoft excel หรือ  OpenOffice Spreadsheet</td></tr>
<tr><td>3.พิมพ์ข้อมูลโดยพิมพ์เรียงลงมาทีละแถวดังตัวอย่าง ของไฟล์ต้นฉบับ โดยข้อมูลต้องเรียงตามลงมา</td></tr>
<tr><td>4. Save โดย Save ให้เป็น นาสกุล CSV ตามเดิม</td></tr>
<tr><td>5.Browse ข้อมูลจากปุ่มด้านล่าง แล้วเลือกไฟล์ที่ทำการ Save ไว้</center></td></tr>
<tr><td>
  <input name="fileCSV" type="file" id="fileCSV"><br>
  <input name="btnSubmit" type="submit" id="btnSubmit" value="Submit">

</td></tr>
<tr><td>6. ทำการกด submit จะขึ้นข้อความว่า import successful<br><br></td>
</tr></tr>
</table>
</form>

<? require "_footer.php"; ?>
</html>
