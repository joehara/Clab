<HTML>
<HEAD><TITLE>Import student from file</TITLE></HEAD>
<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
<link href="../templatemo_style.css" rel="stylesheet" type="text/css" />
<meta content="text/html; charset=TIS-620" http-equiv="content-type">
<style type="text/css">
<!--
.style1 {font-size: 36px}
-->
<form method="post" action="editlesson2.php?id_edit=<?=$id_edit;?>">
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
	<? $today=date("r");
echo "$today"; ?>
    	</div>
        <div id="menu">
            <ul>
                <li><a href="../index.html" class="current">Home</a></li>
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
                    <h2>Logined In System </h2>
                </div>
                <div class="leftcolumn_box01_bottom">
                        <div class="form_row">
                        <label>Welcome</label><a href="showprofile.php" style="color:#FFFFFF"><b><?=$sess_username?></b></a></p>
                        <p>Log in the systems</p>
                        <a href="../logout.php"><p style="color:#FE9A2E"><b>[ logout ]</b></p></a> 
		
                </div>            
            	</div>
            
		<div id="leftcolumn_box02">
            	<h2>Menu</h2>
                <ul>
<p> <a href="main.php">[ Main ]</a> </p>
<p><a href="mstudent.php">[ Management Student ]</a> </p>
<p><a href="showlesson.php">[ add/edit lesson ]</a> </p>
<p><a href="changepw.php">[ change password ]</a> </p>
</div>
                <div id="leftcolumn_box02">
<h2>Link</h2>
                <a href="http://lms.kmutnb.ac.th/"><img src="../images/banner_LMS.gif" alt="Elearning" /></a>                
		<a href="http://wasana.kmutnb.ac.th//"><img src="../images/wireless.gif" alt="wireless" /></a>
                <a href="http://k-radio.kmutnb.ac.th/"><img src="../images/banner-K_radio.gif" alt="K_radio" /></a>

		</ul>
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
<a href=\"showstudent.php\">Back Show student</a>";  exit();
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
echo"<a href=\"showstudent.php\">show student/detail</a>";
?>
</table>

</div>
</body>
</html>
