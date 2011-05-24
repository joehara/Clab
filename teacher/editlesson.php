<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}
$id_edit=$_GET[id_edit];
include "../connect.php";
$sql="select * from HeadLesson where id='$id_edit' ";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);
$lesson=$record[lesson];
$detail=$record[detail];
$hard=$record[hard];
$easy=$record[easy];
$time=$record[time];
?>
<HTML>
<HEAD><TITLE>Edit Lesson</TITLE></HEAD>
<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
<link href="../templatemo_style.css" rel="stylesheet" type="text/css" />
<meta content="text/html; charset=UTF-8" http-equiv="content-type">
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
	Welcome, <a href="showprofile.php" style="color:#000000"><b><?=$sess_username?></b></a>&nbsp;&nbsp;<a href="../logout.php"><img src="../images/logout.gif" alt="Logout" /></a>
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
			<label><a href="showlesson.php" style="color:#FE9A2E"><b>[ add/edit lesson ]</b></a></label><br><br>
			<label><a href="showprofile.php" style="color:#FE9A2E"><b>[ Show Profile ]</b></a></label><br><br>
		
               </div> 
            </div>            	            
        </div>
        </div>
        <!-- end of left column -->
        
        <!-- start of middle column -->
<div id="templatemo_middle_column">

<center><h1>: Edit Lesson::</h1></center><br><br>
  <a href="main.php">&nbsp;Back Main</a>&gt;<a href="showlesson.php">Manage Lesson</a>&gt;Edit Lesson<br><br>
  
  <form method="post" action="editlesson2.php?id_edit=<?=$id_edit;?>">
  <table border="0" cellpadding="2" cellspacing="2">
    <tbody>
      <tr>
        <td><span class="Apple-style-span" style="border-collapse: separate; color: rgb(0, 0, 0); font-family: 'Times New Roman'; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; font-size: medium;"><span class="Apple-style-span" style="">บทเรียนบทที่</span></span> </td>
        <td><?=$lesson?>
          <INPUT NAME="lesson" TYPE=HIDDEN id="lesson" value="<?=$lesson?>"></td>
      </tr>
      <tr>
        <td><table border="0" cellpadding="2" cellspacing="2">
          <tbody>
            <tr>
              <td><span class="Apple-style-span" style="border-collapse: separate; color: rgb(0, 0, 0); font-family: 'Times New Roman'; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; font-size: medium;">หัวข้อของบทเรียน<br>
              </span></td>
            </tr>
          </tbody>
        </table>
            <br class="Apple-interchange-newline">
        </td>
        <td><input name="h_lesson" id="h_lesson" value="<?=$detail?>"></td>
      </tr>
      <tr>
        <td class="style3"><strong>ให้นักศึกษาทำจากการสุ่ม</strong></td>
        <td class="style3">&nbsp;</td>
      </tr>
      <tr>
        <td class="style3">สุ่มข้อยาก จำนวน</td>
        <td><select name="hard" id="hard">
        <?
for($x=1;$x<=20;$x++) {
?>
<option value=<?=$x;?> <? if($x==$hard){echo "selected";} ?>><?=$x?></option>
<? } ?>
</select>

        
        &nbsp;&nbsp;<span class="style3">ข้อ </span></td>
      </tr>
      <tr>
        <td class="style3">สุ่มข้อง่าย จำนวน</td>
        <td><select name="easy" id="easy">
       <?
for($x=1;$x<=20;$x++) {
?>
<option value=<?=$x;?> <? if($x==$easy){echo "selected";} ?>><?=$x?></option>
<? } ?>
</select>
          &nbsp;<span class="style3">&nbsp;ข้อ</span></td>
      </tr>
      <tr>
        <td class="style3">เวลาในการทำ <? list($HH, $MM,$SS) = explode(':', $time);
		
		?> </td>
        <td>
          <select name="HH" id="HH">
                   <?
for($x=0;$x<=23;$x++) {
?>
<option value=<? echo"$x";?> <? if($x==$HH){echo "selected";} ?>><?  if($x<10){echo"0$x";}else{echo"$x";}?></option>
<? } ?>
</select>
          :
          <select name="MM" id="MM">
           <?
for($x=0;$x<=59;$x++) {
?>
<option value=<? echo"$x";?> <? if($x==$MM){echo "selected";} ?>><?  if($x<10){echo"0$x";}else{echo"$x";}?></option>
<? } ?>
</select> 
          <span class="style3">&nbsp;ชั่วโมง </span></td>
      </tr>
      <tr>
        <td><br>
        </td>
        <td><INPUT TYPE="Submit" VALUE="UPDATE">
            </button>
          <br>
        </td>
      </tr>
    </tbody>
  </table>
  </form>
</div>
</div>
</body>
</HTML>
<?
mysql_close();
?>
