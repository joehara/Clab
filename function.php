<?
function displaydate($x) {
	$thai_m=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
	$date_array=explode("-",$x);
	$y=$date_array[0];
	$m=$date_array[1]-1;
	$d=$date_array[2];

	$m=$thai_m[$m];
	$y=$y+543;

	$displaydate="$d $m $y";
	return $displaydate;
} // end function displaydate

function checkemail($checkemail) { 
	if(ereg( "^[^@ ]+@([a-zA-Z0-9\-]+\.)+([a-zA-Z0-9\-]{2}|net|com|gov|mil|org|edu|int)$",$checkemail) )  {
		return true; 
	} else {
		return false; 
	}
} // end fuction checkemail


function randomToken($len) { 
srand( date("s") ); 
$chars = "abcdefghijklmnopqrstuvwxyz"; 
//$chars.= "1234567890!@#$%^&*()"; 
$ret_str = ""; 
$num = strlen($chars); 
for($i=0; $i < $len; $i++) { 
$ret_str.= $chars[rand()%$num]; 
} 
return $ret_str; 
} 


function randomPW($len) { 
srand( date("s") ); 
$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz"; 
$chars.= "1234567890!@#$%^&*()"; 
$ret_str = ""; 
$num = strlen($chars); 
for($i=0; $i < $len; $i++) { 
$ret_str.= $chars[rand()%$num]; 
} 
return $ret_str; 
} 



 function DateDiff($strDate1,$strDate2)
	 {
				return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
	 }
	 function TimeDiff($strTime1,$strTime2)
	 {
				return (strtotime($strTime2) - strtotime($strTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
	 }
	 function DateTimeDiff($strDateTime1,$strDateTime2)
	 {
				return (strtotime($strDateTime2) - strtotime($strDateTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
	 }

	
?>
