<head>
<title>Practical-Based Online Testing System :: Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
<link href="../templatemo_style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {font-size: 36px}
-->
</style>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<script language="Javascript" type="text/javascript" src="../editarea/edit_area/edit_area_full.js">
</script>
<script language="Javascript" type="text/javascript">
        editAreaLoader.init({
                id: "student_code",
                start_highlight: true,
                allow_resize: "both",
                allow_toggle : false,
                word_wrap: true,
                language: "en",
                syntax: "c",
                toolbar: "search, go_to_line, |, undo, redo"
        
        });     
</script>
<link rel="stylesheet" type="text/css" href="../css/smoothness/jquery-ui-1.7.2.custom.css">
    <script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="../js/jquery-ui-1.7.2.custom.min.js"></script>
    <script type="text/javascript">  
  
$(function(){  
    // แทรกโค้ต jquery  
    $("#dateInput").datepicker({ dateFormat: 'yy-mm-dd' });  
    // รูปแบบวันที่ที่ได้จะเป็น 2009-08-16  
});
        
    </script>
    <style type="text/css">
.ui-datepicker{
    width:150px;
    font-family:tahoma;
    font-size:11px;
    text-align:center;
}
</style>
<style type="text/css">
/* class สำหรับแถวส่วนหัวของตาราง */
.tr_head{
        background-color:#333333;
        color:#FFFFFF;
}
/* class สำหรับแถวแรกของรายละเอียด */
.tr_odd{
        background-color:#99FFCC;
}
/* class สำหรับแถวสองของรายละเอียด */
.tr_even{
        background-color:#F2F2F2;
}
</style>

<script language="javascript">
  window.onload = function () {    
                var a=document.getElementById('mytable'); // อ้างอิงตารางด้วยตัวแปร a
                for(i=0;i<a.rows.length;i++){ // วน Loop นับจำนวนแถวในตาราง
                        if(i>0){  // ตรวจสอบถ้าไม่ใช่แถวหัวข้อ
                                if(i%2==1){   // ตรวจสอบถ้าไม่ใช่แถวรายละเอียด
                                        a.rows[i].className="tr_odd";     // กำหนด class แถวแรก
                                }else{
                                        a.rows[i].className="tr_even";  // กำหนด class แถวที่สอง
                                }       
                        }else{ // ถ้าเป็นแถวหัวข้อกำหนด class 
                                a.rows[i].className="tr_head";  
                        }       
                }
 }
 </script>
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
                        <label><a href="main.php" style="color:#FE9A2E"><b>[ Home ]</b></a></label><br><br>
                        <label><a href="mstudent.php" style="color:#FE9A2E"><b>[ จัดการข้อมูลนักศึกษา ]</b></a></label><br><br>
                        <label><a href="mteacher.php" style="color:#FE9A2E"><b>[ จัดการข้อมูลอาจารย์ ]</b></a></label><br><br>
                        <label><a href="m_lesson.php" style="color:#FE9A2E"><b>[ จัดการบทเรียน ]</b></a></label><br><br>
                        <label><a href="m_scroll.php" style="color:#FE9A2E"><b>[ จัดการคะแนน ]</b></a></label><br><br>
                        <label><a href="changepw.php" style="color:#FE9A2E"><b>[ เปลี่ยนรหัสผ่าน ]</b></a></label><br><br>
                        <label><a href="changepw.php" style="color:#FE9A2E"><b>[ Logout ]</b></a></label><br><br>

               </div>
            </div>
        </div>
        </div>


        <!-- end of left column -->

        <!-- start of middle column -->

        <div id="templatemo_middle_column">

