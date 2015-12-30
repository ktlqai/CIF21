<?php
	//Css file path :
		$path_css=base_url().'public/frontend/css/';
	//Js file path :
		$path_js=base_url().'public/frontend/js/';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Blue Game | Wellcome To Home Page</title>

<!--start Css file here-->
<link rel="stylesheet" type="text/css" href="<?php echo $path_css; ?>style.css" />
<!--end Css file here-->

<script type="text/javascript">
	function KiemTra2(frm){
				
		// Declaring valid date character, minimum year and maximum year
var dtCh= "/";
var minYear=1900;
//Create Date Object :
var currentTime = new Date();
var year= currentTime.getFullYear();//Current year 
var maxYear=year;

function isInteger(s){
	var i;
    for (i = 0; i < s.length; i++){   
        // Check that current character is number.
        var c = s.charAt(i);
        if (((c < "0") || (c > "9"))) return false;
    }
    // All characters are numbers.
    return true;
}

function stripCharsInBag(s, bag){
	var i;
    var returnString = "";
    // Search through string's characters one by one.
    // If character is not in bag, append to returnString.
    for (i = 0; i < s.length; i++){   
        var c = s.charAt(i);
        if (bag.indexOf(c) == -1) returnString += c;
    }
    return returnString;
}

function daysInFebruary (year){
	//Tháng 2 có 29 ngày tất cả
	//Chỉ trừ những năm có (số năm vừa chia hết cho 4 vừa chia hết cho 100) hoặc chia hết cho 400 là có 28 ngày
    return (((year % 4 == 0) && ( (!(year % 100 == 0)) || (year % 400 == 0))) ? 29 : 28 );
}
function DaysArray(n) {
	for (var i = 1; i <= n; i++) {
		this[i] = 31
		if (i==4 || i==6 || i==9 || i==11) {this[i] = 30}
		if (i==2) {this[i] = 29}
   } 
   return this
}
//Kiểm tra định dạng ngày tháng năm
function isDate(dtStr){
	var daysInMonth = DaysArray(12)
	var pos1=dtStr.indexOf(dtCh)
	var pos2=dtStr.indexOf(dtCh,pos1+1)
	var strDay=dtStr.substring(0,pos1)
	var strMonth=dtStr.substring(pos1+1,pos2)
	var strYear=dtStr.substring(pos2+1)
	strYr=strYear
	if (strDay.charAt(0)=="0" && strDay.length>1) strDay=strDay.substring(1)
	if (strMonth.charAt(0)=="0" && strMonth.length>1) strMonth=strMonth.substring(1)
	for (var i = 1; i <= 3; i++) {
		if (strYr.charAt(0)=="0" && strYr.length>1) strYr=strYr.substring(1)
	}
	month=parseInt(strMonth)
	day=parseInt(strDay)
	year=parseInt(strYr)
	if (pos1==-1 || pos2==-1){
		alert("Ngày, tháng, năm sinh phải theo định dạng là : dd/mm/yyyy !")
		return false
	}
	if (strMonth.length<1 || month<1 || month>12){
		alert("Vui lòng nhập tháng chính xác !")
		return false
	}
	if (strDay.length<1 || day<1 || day>31 || (month==2 && day>daysInFebruary(year)) || day > daysInMonth[month]){
		alert("Vui lòng nhập ngày chính xác !")
		return false
	}
	if (strYear.length != 4 || year==0 || year<minYear || year>maxYear){
		alert("Giá trị của năm sinh trong khoảng từ năm "+minYear+" đến năm "+maxYear)
		return false
	}
	if (dtStr.indexOf(dtCh,pos2+1)!=-1 || isInteger(stripCharsInBag(dtStr, dtCh))==false){
		alert("Vui lòng nhập ngày phú hợp !")
		return false
	}
return true
}

		var check_email = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; // Regular Expression Check Email String
		
		if(frm.f1.value=='')
			alert("Chưa nhập tên đăng nhập !");
		else if(frm.f2.value=='')
			alert("Chưa nhập mật khẩu !");
		else if(frm.f9.value!=frm.f2.value)
			alert('Mật khẩu xác nhận không đúng !');
		else if(frm.f3.value=='')
			alert("Chưa nhập họ tên !");
		else if(isDate(frm.f5.value)==false)
			//alert("Ngày tháng năm sinh không hợp lệ !");
			return false;
		else if(frm.f6.value=='')
			alert("Chưa nhập số điện thoại !");
		else if(!check_email.test(frm.f8.value))
			alert("Địa chỉ email không hợp lệ !");
		else if(frm.f7.value=='')
			alert("Chưa nhập địa chỉ liên hệ !");
		else{
			alert('Chúc mừng bạn đã đăng ký thành công !');
			frm.submit();
			}
	}
</script>
</head>

<body>
			<div class="wrapper_menu">
		<div class="container">
       	 	<?php $this->load->view("frontend/menu");?>
        </div><!--.container-->
        
          <a href="<?php echo base_url();?>home/dangky">Đăng ký</a> |  
        <?php
			//$session_user = $this->session->userdata('user_fullname'); 
		 	if($this->session->userdata('logged_in')==false) // Đã đăng nhập ( True )  hay chưa (False) ?
			{
				$this->session->sess_destroy();
			?>	
				<a href="<?php echo base_url();?>home/dangnhap">Đăng nhap</a>
          <?php      
			}
			else
			{
				echo "Hello, ".$this->session->userdata('user_name').'['.$log_out.']';
			}

        ?>
        
     		</div><!--.wrapper_menu-->
            
     <div class="clear"></div><!--.clear-->
     		
            <div id="wrapper">
            		<div id="left">
         <div class="title"><img src="<?php echo $frontend_image; ?>/image-stuff/dang-ky.jpg" /></div><!--#left .title-->
         	
            <form action="<?php base_url();?>xulydangky" method="post" name="xulydangky">
            <div id="dangnhap">
            	<table width="auto" cellpadding="5" cellspacing="30">
                	<tr>
                    	<td><label for="f1">Tên đăng nhập</label></td>
                        <td><input type="text" name="f1" id="f1" /></td>
                    </tr>
                     <tr>
                    	<td><label for="f2">Mật khẩu</label></td>
                        <td><input type="password" name="f2" id="f2" /></td>
                    </tr>
                    <tr>
                    	<td><label for="f9">Xác nhận mật khẩu</label></td>
                        <td><input type="password" name="f9" id="f9" /></td>
                    </tr>
                    <tr>
                    	<td><label for="f3">Họ và tên</label></td>
                        <td><input type="text" name="f3" id="f3" /></td>
                    </tr>
                    <tr>
                    <td><label for="f4">Giới tính</label></td>
                        <td>
                      <input type="radio" name="f4" id="f4" value="Nam" checked="checked" />Nam
                      <input type="radio" name="f4" id="f4" value="Nữ" />Nữ
                        </td>
                    </tr>
                     <tr>
                    	<td><label for="f5">Ngày,tháng,năm sinh</label></td>
                        <td><input type="text" name="f5" id="f5" />(dd/mm/yyyy)</td>
                    </tr>
                    <tr>
                    	<td><label for="f6">Số điện thoại</label></td>
                        <td><input type="text" name="f6" id="f6" /></td>
                    </tr>
                    <tr>
                    	<td><label for="f8">E-mail</label></td>
                        <td><input type="text" name="f8" id="f8" /></td>
                    </tr>
                    <tr>
                    	<td><label for="f7">Địa chỉ liên hệ</label></td>
                        <td>
                        	<textarea name="f7" id="f7" rows="5" cols="30"></textarea>
                        </td>
                    </tr>
                    <!--
                    <tr>
                    	<td>Ảnh đại diện</td>
                        <td><input type="file" name="user_avatar" /></td>
                    </tr>
                    -->
                    <tr>
                    	<td></td>
                        <td><input type="button" value="Đăng ký" onclick="KiemTra2(this.form)" class="button_1" /></td>
                    </tr>
                </table>
                </div><!--#dangnhap-->
            </form>
                      
        			</div><!--#left-->
        
        		<div id="right"><?php $this->load->view("frontend/right"); ?></div><!--#right-->
           <div class="clear"></div>
             
            </div><!--#wrapper-->
           
                  <div class="clear"></div>
            <div id="container_footer">
            	<div id="footer">
                	<?php
						include_once("footer.php");
                    ?>
                </div><!--#footer-->
            </div><!--#container_footer-->	
</body>
</html>
































































