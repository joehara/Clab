<?
include "../chksession.php";
include "../function.php";
if ($sess_table<>teacher) {
header( "Location: ../index.html"); 	exit();
}
$lesson=$_POST[HeadLesson];
$section=$_POST[section];
$year=$_POST[year];
$time=$_POST[time];
$HH=$_POST[HH];
$MM=$_POST[MM];

?>

<html>
<body>

<meta http-equiv="Content-Type" content="text/html; charset=TIS-620" />
<?

$today=date("Y-m-d H:s:i"); 
$time_today=date("H:s:i");

//echo"Date Diff =".DateDiff(
if(DateTimeDiff($today,"$time $HH:$MM:00")<0){
echo"�ѹ���������ҵ�駹��¡��һѨ�غѹ ��سҵ���ѹ��������������";
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
	echo"<a href='fix_send.php'>�ա�á�˹�����㹡���觢ͧ Section ��к�����</a>";
	exit();
}

$sql2="insert into time_fix values('','$section','$year','$lesson','$record[teacher_id]','$time $HH:$MM:00')";
$result2=mysql_db_query($dbname,$sql2);
if($result2){
echo"<a href='fix_send.php'>���º�������Ǥ�Ѻ</a>";
}
?>
</body>
</html>