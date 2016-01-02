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

<!--start Js file here-->
<script type="text/javascript" src="<?php echo $path_js;?>jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="<?php echo $path_js;?>js-slider.js"></script>
<!--end Js file here-->

<script type="text/javascript">
    function IfEnterThenSubmitForm(frm) {
        if (window.event && window.event.keyCode == 13) {
            //frm.submit(); // submit form Dang nhap
            KiemTra(frm); // neu Enter thi call validate, xong thi tu Submit form luon
        }
    }
	function KiemTra(frm) {
		var username_input = document.getElementById("username").value; // get input data
		var password_input = document.getElementById("password").value; // get input data
			if(username_input == '' || password_input == '') {
					alert("Còn thiếu thông tin để đăng nhập, vui lòng điền đầy đủ thông tin để đăng nhập !");
				}
			else {
					//alert('Chúc mừng bạn đã đăng nhập thành công !');
					frm.submit(); // submit data
			}
}
</script>

</head>

<body>
			<div class="wrapper_menu">
		<div class="container">
       	 	<?php $this->load->view("frontend/menu");?>
        </div><!--.container--> 
        <?php
			//$session_user = $this->session->userdata('user_fullname'); 
		 	if($this->session->userdata('logged_in')==false) // Đã đăng nhập ( True )  hay chưa (False) ?
			{?>
             	<a href="<?php echo base_url();?>home/dangky">Đăng ký</a> | 
            	<a href="<?php echo base_url();?>home/dangnhap">Đăng nhập</a>
           <?php 
			}
			else
			{
				echo "Hello, ".$this->session->userdata('user_name').'['.$log_out.']';
			}

        ?>
     		</div><!--.wrapper_menu-->
            
     <div class="clear"></div><!--.clear-->

            <div id="wrapper" style="height:auto">
            		<div id="left">
         <div class="title"><img src="<?php echo $frontend_image; ?>/image-stuff/dang-nhap.jpg" /></div><!--#left .title-->
         	
            <div id="dangnhap">
            <!--Form Login here !-->
            <fieldset style="width:500px">
            <legend>Thông tin đăng nhập</legend>
            	<form action="<?php echo base_url();?>home/xulydangnhap" method="post" name="xulydangnhap"><!-- Call function xuydangnhap -->
            <table width="auto" cellspacing="20" cellpadding="5">
             <tr>
                <td><label for="username">Tên đăng nhập</label></td>
                <td><input type="text" name="username" id="username" size="20" onkeypress="IfEnterThenSubmitForm(this.form)" /></td>
             </tr>
             <tr>
                 <td><label for="username">Mật khẩu</label></td>
                 <td><input type="password" name="password" id="password" size="20" onkeypress="IfEnterThenSubmitForm(this.form)" /></td>
             </tr>
             <tr>
             	<td></td>
                <td><input type="button" value="Đăng nhập" onclick="KiemTra(this.form)" class="button_1" /></td>
             </tr>
             </table>
                </form>
            </fieldset>
              
                <?php
					//if(!is_null($log_out)){
							//echo $log_out; // Hiện link đăng xuất 
						//}
					/*
					if(!is_null($message)){
							echo "<b style='color:red'>".$message."</b>"; // Thông báo lỗi khi đăng nhập KHÔNG thành công
						}
					if(!is_null($thong_bao)){
							echo "<b style='color:red'>".$thong_bao."</b>"; // Thông báo khi đăng nhập thành công
						}
						*/
                ?>
             <!--Form Login here !-->
                    </div><!--#dangnhap-->
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
































































