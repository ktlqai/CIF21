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
		if(frm.txtTenGame.value =='')
			alert('Chưa nhập tên của game !');
		else if(frm.img.value =='')
			alert('Chưa chọn hình ảnh đại diện cho game!');
		else if(frm.txtGioiThieu.value =='')
			alert('Chưa nhập nội dung giới thiệu về game !');
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
      <img src="<?php echo $backend_image;?>game-add.jpg" />
        	</div><!--.banner-->
        <div align="right">
        Hello,&nbsp;<?php echo $this->session->userdata('admin_username');?>&nbsp;&nbsp;[<a href="<?php echo base_url();?>admin/do_logout_2">Đăng xuất</a>]
        <br />
    <a href="<?php echo base_url();?>admin/flashgame_manager">Back to flash game management</a>&nbsp;
        </div><!--align=right-->
        <br />
        <div class="clear"></div><!--.clear-->
        	<div id="container_index_2" style="background:#000; height:auto">
            
      <form action="<?php echo base_url();?>admin/add_game" method="post" name="add_game" enctype="multipart/form-data">
            <table cellpadding="10" cellspacing="10">
            	<tr>
                	<td><b>Tên game</b></td>
                    <td><input type="text" name="txtTenGame" id="txtTenGame" size="30" /></td>
                </tr>
                
                <tr>
                	<td><b>Hình ảnh</b></td>
                    <td>
                    	<input type="file" name="img" />
                    </td>
                </tr>
                
                <tr>
                	<td><b>Giới thiệu</b></td>
                    <td>
              <textarea id="txtGioiThieu" name="txtGioiThieu" cols="50" rows="5"></textarea>
                    </td>
                </tr>
                
                <tr>
                	<td></td>
                    <td>
              <input type="submit" name="submit" value="Lưu thông tin" class="button_1" style="width:120px; height:auto" onclick="KiemTra(this.form)" />
              </td>
                </tr>
            
            </table>
            </form>
        
            </div><!--#container_index_2-->
    </div><!--#wrapper-->

</body>
</html>