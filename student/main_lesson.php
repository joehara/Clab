<?
$id=$_GET[id];
$lesson=$_GET[lesson];
$plus=$_GET[plus];
include "../connect.php";
include "../chksession.php";

if ($sess_table<>student) {
	header( "Location: ../index.html"); 	exit();
}
?>
<HTML>
<? require "_header.php"; ?>

<center><h1> คำถาม </h1></center><br><br>

<a href="lesson.php">Home</a>&gt;<a href="lesson.php"> แบบฝึกหัด</a>&gt; คำถามบทที่ <?=$lesson?></a>
<br><br><center>
<table border="1">
<tr bgcolor="#D3D3D3"> 
    
    <td>ข้อที่</td>
    <td><center>คำถาม</center></td>
    <td><center>สถานะ</center></td>

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

$sql6="select sendanswer.status, sendanswer.result from proposition,sendanswer where proposition.question_id=sendanswer.ref_question and sendanswer.ref_student='$ref_student'  and proposition.question_id='$record[question_id]'";
$result6=mysql_db_query($dbname,$sql6);
$record6=mysql_fetch_array($result6);
$num6=mysql_num_rows($result6);
?>
		<tr> 
			<td><?= $count ?></td>
<?
			if($num6 <= 0) {
				echo "<td><a href=\"golesson.php?id_question=$record[question_id]&ref_student=$ref_student&lesson=$lesson\">$record[proposition]</a></td>";
				echo"<td>ยังไม่ได้ส่งคำตอบ</td>";
			} else {
				if($record6[status] == 1) {
					echo "<td>$record[proposition]</td>";
					echo "<td><center><a href=\"result_question_detail.php?check_id=$record[question_id]&id=$ref_student\">$record6[result]</a></center></td>";
				} else {
					echo "<td><a href=\"golesson.php?id_question=$record[question_id]&ref_student=$ref_student&lesson=$lesson\">$record[proposition]</a></td>";
					echo"<td>ส่งคำตอบแล้ว</td>";
				}
			}

			echo "</tr>";
			$count++;
								
	}
			
			
													
}else{

$count=1;

$sql="select * from proposition,teacher_random,teacher where teacher_random.question_id=proposition.question_id and teacher_random.teacher_id=teacher.teacher_id and proposition.ref_lesson='$lesson' and proposition.level=0 and teacher.name='$teach' ORDER BY rand()LIMIT $easy";
	$result=mysql_db_query($dbname,$sql);
	while($record=mysql_fetch_array($result)) {
		
		echo "
		<tr> 
			
			<td>$count</td>
			<td><a href=\"golesson.php?id_question=$record[question_id]&ref_student=$ref_student&lesson=$lesson\">$record[proposition]</a></td>
			<td>ยังไม่ได้ส่งคำตอบ</td>
			</tr>";
			$count++;
			$sql4="insert into random values('','$record[question_id]','$ref_student','$time')";
			$result4=mysql_db_query($dbname,$sql4);
		
	}


$sql="select * from proposition,teacher_random,teacher where teacher_random.question_id=proposition.question_id and teacher_random.teacher_id=teacher.teacher_id and proposition.ref_lesson='$lesson' and proposition.level=1 and teacher.name='$teach' ORDER BY rand()LIMIT $hard";
	$result=mysql_db_query($dbname,$sql);
	while($record=mysql_fetch_array($result)) {
		
		echo "
		<tr> 
			
			<td>$count</td>
			<td><a href=\"golesson.php?id_question=$record[question_id]&ref_student=$ref_student&lesson=$lesson\">$record[proposition]</a></td>
			<td>ยังไม่ได้ส่งคำตอบ</td>
			</tr>";
			$count++;
			$sql3="insert into random values('','$record[question_id]','$ref_student','$time')";
			$result3=mysql_db_query($dbname,$sql3);
			
	}

	echo"</table>";
}	
	 

mysql_close();
?>
</table></center>

<? require "_footer.php"; ?>
</HTML>
