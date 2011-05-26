<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: ../index.html"); 	exit();
}

  $lesson=$_GET[lesson];
  $section=$_GET[section];
?>
<HTML>
<? require "_header.php"; ?>

<p><h1>:: ŒÙé·ÓÊè§¢éÍÊÍº::</h1><br><br>
<p>[<a href="main.php">Main</a> &gt;<a href="m_scroll.php">Management Scroll</a> &gt;<a href="report2.php?lesson=<?=$lesson?>&section=<?=$section?>">º··ÕèÊè§§Ò¹à¢éÒÁÒ</a> &gt;ŒÙé·ÓÊè§¢éÍÊÍº</p>
<table border="0">
  <tr bgcolor="#D3D3D3"> 
    
    <td>NO.</td>
    <td>âš·Âì</td>
    <td>ŒÙé·Ó¢éÍÊÍº</td>
  </tr>
  <?

	$count=1;
	include "../connect.php";
	$sql="select proposition.proposition,student.name,answer.ans_id from answer,proposition,student  where answer.ref_question=proposition.question_id and answer.ref_student=student.student_id  and proposition.ref_lesson='$lesson' and  student.section='$section' and answer.answer_code!='$space'";
	$result=mysql_db_query($dbname,$sql);
	while($record=mysql_fetch_array($result)) {
		
		$sql2="select * from check_answer where ref_answer='$record[ans_id]'";
		$result2=mysql_db_query($dbname,$sql2);
		$num2=mysql_num_rows($result2);
		if($num2==0) {
		echo "
		
		<tr> 
			<td>$count</td>
			<td>$record[proposition]</td>
			<td>$record[name]</a></td>
			<td><a href=\"question_check.php?ans_id=$record[ans_id]\">µÃÇš</a></td>
		</tr>";
		$count++;

		}
	}
	mysql_close();
?>
</table>

<? require "_footer.php"; ?>
</html>
