<?
include "../chksession.php";
if ($sess_table<>student) {
	header( "Location: /Clab/index.html"); 	exit();}
?>
<html>
<head>
<title>Welcome</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
<link href="/Clab/templatemo_style.css" rel="stylesheet" type="text/css" />
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
	Welcome, <a href="changepw.php" style="color:#000000"><b><?=$sess_username?></b></a>&nbsp;&nbsp;
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
 			<label><a href="lesson.php" style="color:#FE9A2E"><b>[ Lesson ]</b></a></label><br><br>
			<label><a href="showprofile.php" style="color:#FE9A2E"><b>[ Show Profile ]</b></a></label><br><br>
		<a href="/Clab/logout.php"><img src="/Clab/images/logout.gif" alt="Logout" /></a>
                </div> 
            </div>            	            
        </div>
        </div>
            
		
        <!-- end of left column -->
        
        <!-- start of middle column -->
        
    	<div id="templatemo_middle_column">
   <br>
<center><h1>เกี่ยวกับเรา</h1></center>
<br>     
<center><table border="0">
<tr>
      
      <td><label>
        <textarea cols="80" rows="22">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;สืบเนื่องจากวิวัฒนาการทางด้านเทคโนโลยีสารสนเทศที่เข้ามามีบทบาทสำคัญนั้นทำให้คอมพิวเตอร์จึงเป็นส่วนหนึ่งที่เกี่ยวข้องกับชีวิตประจำวันของมนุษย์มากขึ้นในปัจจุบันและในการศึกษาด้านวิศวกรรมไฟฟ้า-อิเล็กทรอนิกส์  วิชา โปรแกรมภาษาซี ซึ่งเป็นวิชาที่นักศึกษาทุกคนต้องได้เรียนรู้เพื่อมีความรู้พื้นฐานในการเขียนโปรแกรม นักศึกษาที่ศึกษาด้านคอมพิวเตอร์โดยเฉพาะ นั้นจำเป็นอย่างยิ่งที่ต้องศึกษาการเขียนโปรแกรมภาษาซี และทำความเข้าใจที่ดี เพราะในปัจจุบันนักศึกษามีความต้องการที่จะเข้ามาศึกษาในสาขาคอมพิวเตอร์เพิ่มมากขึ้นเนื่องจากความรู้ทางด้านคอมพิวเตอร์ และ โปรแกรมคอมพิวเตอร์ เป็นที่ต้องการอย่างมากของตลาดแรงงานทั้งในและนอกประเทศ  ซึ่งการเขียนโปรแกรมภาษาซีเป็นพื้นฐานหลักของการเขียนโปรแกรมต่างๆ เช่น เกมส์ไปจนถึงแอพพลิเคชั่นต่างๆ ที่มีใช้กันทั่วไปมีทั้งในอุปกรณ์สื่อสารรวมไปจนถึงแอพพลิเคชั่นการใช้งานของเครื่องอัตโนมัติ ทั้งหลายเป็นต้น
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ดังนั้น ในการศึกษาวิชา โปรแกรมภาษาซี ของ วิทยาลัยเทคโนโลยีอุตสาหกรรม มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือสามารถที่จะนำเทคโนโลยีระบบเครือข่ายอินเทอร์เน็ตมาประยุกต์ใช้ในการเพิ่มทักษะการเขียนโปรแกรมภาษาซี โดยระบบ e-Learning นี้ส่วนมากยังคงเห็นในแบบภาคทฤษฎีที่มีไว้ศึกษากัน แล้วยังไม่ค่อยมีการนำมาทำเป็นภาคปฏิบัติ จึงได้มีแนวคิดที่จะสร้างแล้วพัฒนาเว็บไซต์และระบบขึ้นมา เพื่อใช้งานสำหรับการศึกษา การเขียนโปรแกรมภาษาซี  เพื่อให้นักเรียนนักศึกษาเรียนรู้การเขียนโปรแกรมภาษาซีได้ด้วยตนเอง โดยการเข้าไปศึกษาบทเรียนและทำแบบฝึกหัดที่สร้างขึ้น โดยจะเก็บข้อมูลการทำงานของนักศึกษาแต่ละครั้ง และทำให้อาจารย์ประจำวิชาหรือผู้ดูแลระบบสามารถควบคุมการทำแบบฝึกหัดของนักศึกษาได้  โดยใช้ระบบฐานข้อมูลในการทำงาน    
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จากแนวคิดนี้คาดหวังว่าสื่อการสอนการเขียนโปรแกรมภาษาซีผ่านเว็บไซต์นี้จะช่วยให้ผู้เรียนสามารถพัฒนาการเขียนโปรแกรมภาษาซีได้ด้วยตนเอง โดยผ่านโปรแกรมที่สร้างขึ้นและเข้าไปทำแบบฝึกหัดและตรวจสอบคำตอบได้ด้วยตัวเอง  ยังช่วยแบ่งเบาภาระของอาจารย์ผู้สอนและผู้สอนยังสามารถแก้ไขหรือทำการเพิ่มแบบฝึกหัดแล้วยังควบคุมการทำงานนักศึกษาได้อีกด้วย อีกทั้งช่วยให้ผู้ที่เริ่มต้นเขียนโปรแกรมภาษาซีสามารถเข้าใจขั้นตอนการศึกษาของโปรแกรมภาษาซี ได้อย่างง่ายดาย

        </textarea>
      </label></td>
    </tr>
</table>
</center>  


   	  </div>
    	<!-- end of middle column -->
        
        <!-- start of right column -->

        <!-- end of right column -->

    </div>
	

	<!-- end of content -->
	<div id="templatemo_footer">
        <blockquote>
          <blockquote>
            <blockquote>
              <blockquote>
                <blockquote>
                  <blockquote>
                    <blockquote>
                      <p align="center">Copyright © 2010-2011<br>
                        <a href="http://www.kmutnb.ac.th">King Mongkut's University of Technology North Bangkok</p></a>
                    </blockquote>
                  </blockquote>
                </blockquote>
              </blockquote>
            </blockquote>
          </blockquote>
        </blockquote>
	</div>
    <div id="templatemo_footer_bottom"></div>

</div>
</div>
</body>
</html>
