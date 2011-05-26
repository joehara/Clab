<?
include "../chksession.php";

if ($sess_table<>admin) {
        header( "Location: ../index.html");     exit();
}
?>
<HTML>
<? require "_header.php"; ?>

<?
setlocale(LC_ALL, 'en_US.UTF-8');

copy($_FILES["fileCSV"]["tmp_name"],$_FILES["fileCSV"]["name"]); // Copy/Upload CSV
$check=$_FILES["fileCSV"]["tmp_name"];
if($check==""){
echo"<h1>!Missing File</h1>
<a href=\"mstudent.php\">Back Management Student</a>";  exit();
}
include "../connect.php";
$password=base64_encode(1234);
$date=date("Y-m-d");
$objCSV = fopen($_FILES["fileCSV"]["tmp_name"], "r");

while (($objArr = fgetcsv($objCSV, 1000, ",")) != FALSE) {

if($objArr[0]<>'/*'){
	$strSQL = "INSERT INTO student VALUES ('','".$objArr[1]."','$password' ,' ".$objArr[2]."','".$objArr[3]."','".$objArr[4]."','".$objArr[5]."','".$objArr[6]."','".$objArr[7]."','".$objArr[8]."','1','$date') ";
    $result=mysql_db_query($dbname,$strSQL);
echo $strSQL."<BR>";	
echo $objArr[2];
	echo $objArr[3];
	}
	
}

echo "Upload & Import Done.<br>";
fclose($objCSV);
unlink('$objCSV.csv');
echo"<a href=\"mstudent.php\">show Management Student</a>";
?>
</table>

<? require "_footer.php"; ?>
</html>
