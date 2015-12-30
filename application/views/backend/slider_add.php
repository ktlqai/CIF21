<?php
	//Css file path :
		$path_css=base_url().'public/backend/css/';
	//Js file path :
		$path_js=base_url().'public/backend/js/';
		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Home Page</title>

<!--start Css file here-->
<link rel="stylesheet" type="text/css" href="<?php echo $path_css; ?>style.css" />
<!--end Css file here-->
<script type="text/javascript">
	function KiemTra(frm)
	{
		if(frm.txtTieuDeSlide.value=='')
			alert('Chưa nhập tiêu đề slide !');
		else if(frm.txtTrichDan.value=='')
			alert('Chưa nhập nội dung trích dẫn của slide !');
		else if(frm.img.value=='')
			alert('Chưa chọn hình cần upload !');
		else
			{
				alert('Chúc mừng bạn đã thêm mới slide thành công !');
				frm.submit();
			}
	}
</script>
</head>

<body>
	<div id="wrapper" style="background:#000; height:auto">
    		<div class="banner">
      <img src="<?php echo $backend_image;?>slider-add.jpg" />
        	</div><!--.banner-->
        <div align="right">
        Hello,&nbsp;<?php echo $this->session->userdata('admin_username');?>&nbsp;&nbsp;[<a href="<?php echo base_url();?>admin/do_logout_2">Đăng xuất</a>]
        <br />
    <a href="<?php echo base_url();?>admin/slider_manager">Back to slider management</a>&nbsp;
        </div><!--align=right-->
        <br />
        <div class="clear"></div><!--.clear-->
        	<div id="container_index_2" style="background:#000; height:auto">
            
            <form action="<?php echo base_url();?>admin/add_slider" method="post" enctype="multipart/form-data">
            
            <table width="1030px" height="auto" cellspacing="10">
            <tr>
            	<td><b>Tiêu đề slide</b></td>
            <td> <input type="text" name="txtTieuDeSlide" id="txtTieuDeSlide" size="68" /></td>
            </tr>
            
              <tr>
            	<td><b>Nội dung trích dẫn</b></td>
                <td><textarea name="txtTrichDan" cols="50" rows="10"></textarea></td>
            </tr>
            
            	<tr>
                	<td><b>Hình ảnh</b></td>
                    <td><input type="file" name="img" /></td>
                </tr>
                
                <tr>
                	<td><b>Kích hoạt slide</b></td>
                    <td>
              <input type="radio" name="radKichHoatSlide" id="radKichHoatSlide" value="1" />Có
               <input type="radio" name="radKichHoatSlide" id="radKichHoatSlide" value="0" />Không
                    </td>
                </tr>
                
                
                <tr>
                	<td></td>
                <td><input type="submit" name="submit" onclick="KiemTra(this.form)" value="Lưu thông tin" class="button_1" style="width:120px; height:auto" /></td>
                </tr>
            
            </table>
            
            </form>
          
            </div><!--#container_index_2-->
    </div><!--#wrapper-->

</body>
</html>