<HTML>
<HEAD><TITLE>Import Student from file</TITLE></HEAD>
<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
<link href="../templatemo_style.css" rel="stylesheet" type="text/css" />
<meta content="text/html; charset=utf-8" http-equiv="content-type">
<style type="text/css">
<!--
.style1 {font-size: 36px}
-->

</style>
</head>

<body>

<div id="templatemo_container">
   
    <div id="templatemo_header" >
   	  <div id="logosection"></div>
    	<div id="header">
        	<div class="title">
        	  <p class="style1">&nbsp;</p>
        	  <p>&nbsp;</p>
        	</div>

        </div>
	</div>
    
	<div id="templatemo_menu">
    	<div id="search">
	Welcome, <a href="changepw.php" style="color:#000000"><b><?=$sess_username?></b></a>&nbsp;&nbsp;<a href="../logout.php"><img src="../images/logout.gif" alt="Logout" /></a>
    	</div>
        <div id="menu">
            <ul>
                <li></li>
                <li><a href="about_us.php">About Us</a></li>
                <li><a href="contact_us.php">Contact Us</a></li>
            </ul>
        </div>
	</div>
    
    <!-- start of content -->
    
	<div id="templatemo_content">
    
    	<!-- start of left column -->
    
    	<div id="templatemo_left_column">        	

            <div id="leftcolumn_box01">
                <div class="leftcolumn_box01_top">
                    <h2>Menu</h2>
                </div>
                <div class="leftcolumn_box01_bottom">
                        <div class="form_row">
                        <label><a href="main.php" style="color:#FE9A2E"><b>[ Main ]</b></a></label><br><br>
 			<label><a href="mstudent.php" style="color:#FE9A2E"><b>[ Management Student ]</b></a></label><br><br>
			<label><a href="mteacher.php" style="color:#FE9A2E"><b>[ Management Teacher ]</b></a></label><br><br>
			<label><a href="m_lesson.php" style="color:#FE9A2E"><b>[ Management Lesson ]</b></a></label><br><br>
			<label><a href="m_scroll.php" style="color:#FE9A2E"><b>[ Management Score ]</b></a></label><br><br>
			<label><a href="changepw.php" style="color:#FE9A2E"><b>[ Change Password ]</b></a></label><br><br>

		
               </div> 
            </div>            	            
        </div>
        </div>
        <!-- end of left column -->
        
        <!-- start of middle column -->
        
    	<div id="templatemo_middle_column">
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
</div></div>
</body>
</html>
