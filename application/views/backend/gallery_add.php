<?php
	//Css file path :
		$path_css=base_url().'public/backend/css/';
	//Js file path :
		$path_js=base_url().'public/backend/js/';
	//Image file path for sliders:
		$path_image=base_url().'public/images/image-slider/';
		
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
		if(frm.txtTieuDeGallery.value =='')
			alert('Chưa nhập tiêu đề của gallery !');
		else if(frm.txtGioiThieuGallery.value =='')
			alert('Chưa nhập nội dung giới thiệu slide !');
		else if(frm.img.value=='')
			alert('Chưa chọn ảnh đại diện !');
		else
			{
				alert('Chúc mừng bạn đã thêm dữ liệu thành công !');
				frm.submit();
			}
	}
</script>


</head>

<body>
	<div id="wrapper" style="background:#000; height:auto">
    		<div class="banner">
      <img src="<?php echo $backend_image;?>gallery-add.jpg" />
        	</div><!--.banner-->
        <div align="right">
        Hello,&nbsp;<?php echo $this->session->userdata('admin_username');?>&nbsp;&nbsp;[<a href="<?php echo base_url();?>admin/do_logout_2">Đăng xuất</a>]
        <br />
    <a href="<?php echo base_url();?>admin/gallery_manager">Back to gallery manager</a>&nbsp;
        </div><!--align=right-->
        <br />
        <div class="clear"></div><!--.clear-->
        	<div id="container_index_2" style="background:#000; height:auto">
            
	
            <form action="<?php echo base_url();?>admin/add_gallery" method="post" enctype="multipart/form-data">
            <table cellpadding="10" cellspacing="10">
         		<tr>
                	<td><b>Tiêu đề gallery</b></td>
                    <td><input type="text" name="txtTieuDeGallery" size="66" /></td>
                </tr>
                
                <tr>
                	<td><b>Hình ảnh đại diện</b></td>
                    <td>
                    	<input type="file" name="img" />
                    </td>
                </tr>
                
                <tr>
                	<td>Giới thiệu về gallery</td>
                    <td>
                    	<textarea name="txtGioiThieuGallery" cols="50" rows="5"></textarea>
                    </td>
                </tr>
                
                <tr>
                	<td></td>
                    <td>
             <input type="submit" name="submit" value="Lưu thông tin" class="button_1" style="width:120px; height:auto" onclick="KiemTra(this.form)" />       
               <input type="reset" value="Nhập lại" class="button_1" style="width:120px; height:auto" />
                    </td>
                </tr>
                
            </table>
            </form>
         
        
            </div><!--#container_index_2-->
    </div><!--#wrapper-->

</body>
</html>