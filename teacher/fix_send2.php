<?
include "../chksession.php";
include "../function.php";
if ($sess_table<>teacher) {
header( "Location: ../index.html"); 	exit();
}
$lesson=$_POST[headlesson];
$section=$_POST[section];
$year=$_POST[year];
$time=$_POST[time];


?>

<html>
<body>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?

$today=date("Y-m-d"); 


//echo"Date Diff =".DateDiff(
if(DateTimeDiff($today,$time)<0){
echo"วันที่และเวลาตั้งน้อยกว่าปัจจุบัน กรุณาตั้งวันทีและเวลา่ใหม่";
exit();
}

include "../connect.php";
$sql="select * from teacher where username='$sess_username'";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);

$sql="select * from time_fix where fix_sec='$section' and fix_year='$year' and ref_lesson='$lesson' and ref_teacher='$record[teacher_id]'";
$result=mysql_db_query($dbname,$sql);
$num=mysql_num_rows($result);


if($num>0){
	$fixid = mysql_result($result,0,0);
	$sql2="update time_fix set time_finish='$time' where fix_id=$fixid";
	$result2=mysql_db_query($dbname,$sql2);
} else {
	$sql2="insert into time_fix values('','$section','$year','$lesson','$record[teacher_id]','$time')";
	$result2=mysql_db_query($dbname,$sql2);
}
if($result2){
echo"<a href='fix_send.php'>เรียบร้อยแล้วครับ</a>";
}
?>
</body>
</html>
