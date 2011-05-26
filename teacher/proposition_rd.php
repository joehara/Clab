<?
include "../chksession.php";
$lesson=$_POST[lesson];
?>
<HTML>
<? require "_header.php"; ?>

<p><a href="proposition.php?id_edit=<?=$id?>&amp;lesson=<?=$lesson?>">back Question</a></p>
<p>
  <?
include"../connect.php";
$sql="select * from teacher where username='$sess_username'";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);
$teacher_id=$record[teacher_id];
$count=1;



$sql2="select teacher_random.teacher_id,teacher_random.question_id from  teacher_random,proposition where teacher_random.question_id=proposition.question_id and teacher_random.teacher_id='$teacher_id' and proposition.ref_lesson='$lesson' ";
$result2=mysql_db_query($dbname,$sql2);
$num=mysql_num_rows($result2);



if($num>0){
while($record=mysql_fetch_array($result2)){


 $sql3="delete from teacher_random where question_id='$record[question_id]' "; 
$result3=mysql_db_query($dbname,$sql3);


}
}

echo"<table border='1'>";

	for($i=0;$i<count($_POST[chkDel]);$i++)
	{
	

	 $sql="select * from proposition where question_id='".$_POST[chkDel][$i]."' ";
	$result=mysql_db_query($dbname,$sql);
	$record=mysql_fetch_array($result);
	if($record[level]!=0){
	$level='ข้อยาก';}else{$level='ข้อง่าย';}
	echo"
	<tr>
	<td>$count</td><td>$record[proposition]</td><td>$record[create_by]</td><td>$level</td>
	</tr>";
	

	    	$sql = "insert  teacher_random   values(' ".$_POST[chkDel][$i]."','$teacher_id' )";
		$result=mysql_db_query($dbname,$sql);   
		  
		 $count++; 
	

	}

echo"</table>";
echo "up date complete  " ;
mysql_close( );
?>
</p>

<? require "_footer.php"; ?>
</html>
