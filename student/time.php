<?
include "../connect.php";
$sql="select * from headlesson  ";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result); 
$time=$record[time];
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8 />
<title>Untitled Document</title>
</head>
 
<body>
<body onLoad="begintimer()">
<script language="">
var limit="0:10"
if (document.images){
var parselimit=limit.split(":")
parselimit=parselimit[0]*60+parselimit[1]*1
}
function begintimer(){
if (!document.images)
return
if (parselimit==1)
// เหตุการณ์ที่ต้องการให้เกิดขึ้น
 //ถ้าต้องการให้กระโดดไปยัง Page อื่น
frmTest.submit();
else{
parselimit-=1
curmin=Math.floor(parselimit/60)
cursec=parselimit%60
if (curmin!=0)
curtime="เวลาที่เหลือ <font color=red> "+curmin+" </font>นาที กับ <font color=red>"+cursec+" </font>วินาที "
else if(cursec==1)
{
alert("หมดเวลาแล้วจ้า");
window.location="/Clab/logout.php";
}
else
{
curtime="เวลาที่เหลือ <font color=red>"+cursec+" </font>วินาที "
}
document.getElementById('dplay').innerHTML = curtime;
setTimeout("begintimer()",1000)
}
}
//-->
</script>
<div id=dplay ></div>
<form name="frmTest" action="JavaScript:window.close();"> 
</form>
</body>
</html>
