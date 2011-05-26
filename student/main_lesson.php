<?
header("Content-Type content=text/html; charset=UTF-8");
$id=$_GET[id];
$lesson=$_GET[lesson];
$plus=$_GET[plus];
include "../connect.php";
include "../chksession.php";
$time=date("Y-m-d G:i:s");

if ($sess_table<>student) {
	header( "Location: /Clab/index.html"); 	exit();
}
?>
<HTML>
<? require "_header.php"; ?>

<h1>:: Question ::	</h1> </center><br><br>

[ <a href="lesson.php">Back Lesson</a> ]
<br><br><center>
<table border="1">
<tr bgcolor="#D3D3D3"> 
    
    <td>No</td>
    <td><center>Detail Lesson</center></td>
    <td><center>Status</center></td>

</tr>


<?
$sql="select * from student where code_st='$sess_username'";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);
$ref_student=$record[student_id];
$teach=$record[teach];

$sql="select * from headlesson where lesson='$lesson'";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);
$id_lesson=$record[id];
$hard=$record[hard];
$easy=$record[easy];

$sql="select proposition.question_id,proposition.proposition,random.ref_question,random.ref_student from proposition,random where 
proposition.question_id=random.ref_question and proposition.ref_lesson='$lesson' and random.ref_student='$ref_student' order by random.ref_question asc";
$result5=mysql_db_query($dbname,$sql);
$num=mysql_num_rows($result5);

if($num>0){

$count=1;


while($record=mysql_fetch_array($result5)) {

$sql6="select proposition.question_id,proposition.proposition,sendanswer.ref_question,sendanswer.ref_student from proposition,sendanswer where proposition.question_id=sendanswer.ref_question and sendanswer.ref_student='$ref_student'  and proposition.question_id='$record[question_id]' order by sendanswer.ref_question asc";
$result6=mysql_db_query($dbname,$sql6);
$num6=mysql_num_rows($result6);

		echo "
		<tr> 
			
			<td>$count</td>
			<td><a href=\"golesson.php?id_question=$record[question_id]&ref_student=$ref_student\">$record[proposition]</a></td>";
			if($num6<=0){
			echo"<td>ยังไม่ได้ส่งคำตอบ</td>";
			}else{
			echo"<td>ส่งคำตอบแล้ว</td>";
			$success++;

			if($success==($hard+$easy)){
														$sql8="update  time_use set time_end='$time' where ref_lesson='$lesson' and ref_student='$ref_student'";
$result8=mysql_db_query($dbname,$sql8);
			}
			}
			
			echo "</tr>";
			$count++;
								
			}
			
			
													
}else{

$count=1;

$sql="select * from proposition,teacher_random,teacher where teacher_random.question_id=proposition.question_id and teacher_random.teacher_id=teacher.teacher_id and proposition.ref_lesson='$lesson' and proposition.level=1 and teacher.name='$teach' ORDER BY rand()LIMIT $hard";
	$result=mysql_db_query($dbname,$sql);
	while($record=mysql_fetch_array($result)) {
		
		echo "
		<tr> 
			
			<td>$count</td>
			<td><a href=\"golesson.php?id_question=$record[question_id]&ref_student=$ref_student\">$record[proposition]</a></td>
			<td>ยังไม่ได้ส่งคำตอบ</td>
			</tr>";
			$count++;
			$sql3="insert into random values('','$record[question_id]','$ref_student','$time')";
			$result3=mysql_db_query($dbname,$sql3);
			
	}


$sql="select * from proposition,teacher_random,teacher where teacher_random.question_id=proposition.question_id and teacher_random.teacher_id=teacher.teacher_id and proposition.ref_lesson='$lesson' and proposition.level=0 and teacher.name='$teach' ORDER BY rand()LIMIT $easy";
	$result=mysql_db_query($dbname,$sql);
	while($record=mysql_fetch_array($result)) {
		
		echo "
		<tr> 
			
			<td>$count</td>
			<td><a href=\"golesson.php?id_question=$record[question_id]&ref_student=$ref_student\">$record[proposition]</a></td>
			<td>ยังไม่ได้ส่งคำตอบ</td>
			</tr>";
			$count++;
			$sql4="insert into Random values('','$record[question_id]','$ref_student','$time')";
			$result4=mysql_db_query($dbname,$sql4);
		
	}
echo"</table>";
	$sql9="select * from proposition where ref_lesson='$lesson'";
	$result9=mysql_db_query($dbname,$sql9);
	$num9=mysql_num_rows($result9);
	if($num9>0){
	$sql7="insert into time_use values('','$lesson','$ref_student','$time','')";
	$result7=mysql_db_query($dbname,$sql7);
	}else{
		



	echo"<h3>ไม่มีโจทย์</h3><br>";
	}

	}
	 

mysql_close();
?>
</table></center>

<? require "_footer.php"; ?>
</HTML>
