<?php
	//Css file path :
		$path_css=base_url().'public/backend/css/';
		
	//Image Path to display :
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
		if(frm.txtTieuDeSlide.value=='')
			alert('Chưa nhập tiêu đề của slide !');
		else if(frm.txtTrichDan.value=='')
			alert('Chưa nhập trích dẩn của slide');
		else if(frm.img.value=='')
			alert('Chưa chọn hình ảnh đại diện thay thế !');
		else
			{
				alert('Chúc mừng bạn đã lưu thành công !');
				frm.submit();
			}
	}
</script>

</head>

<body>
	<div id="wrapper" style="background:#OOO; height:auto;">
    		<div class="banner">
      <img src="<?php echo $backend_image;?>update-slider.jpg" />
        	</div><!--.banner-->
        <div align="right">Hello,&nbsp;<?php echo $this->session->userdata('admin_username');?>&nbsp;&nbsp;[<a href="<?php echo base_url();?>admin/do_logout_2">Đăng xuất</a>]
        <br />
        <a href="<?php echo base_url();?>admin/slider_manager">Back to slider manager</a>&nbsp;
        </div>
        <br />
        <div class="clear"></div><!--.clear-->
        	<div id="container_index_2" style="background:#000; height:auto">
            
            <table width="1030px" height="auto" cellpadding="10" cellspacing="10">	
            <?php foreach($data_slider as $sd)
			{
			?>
            	<form method="post" action="<?php echo base_url();?>admin/update_slider/<?php echo $sd['slider_id']?>" enctype="multipart/form-data">
           <tr>
           		<td><b>Tiêu đề silde</b></td>
                <td><input type="text" value="<?php echo $sd['slider_title'];?>" name="txtTieuDeSlide" id="txtTieuDeSlide" size="66" /></td>
           </tr>
           
            <tr>
           		<td><b>Nội dung trích dẫn</b></td>
                <td><textarea name="txtTrichDan" id="txtTrichDan" cols="50" rows="5"><?php echo $sd['slider_content'];?></textarea></td>
           </tr>
           
           	<tr>
            	<td><b>Hình ảnh ban đầu</b></td>
                <td>
  <img src="<?php echo $path_image;?><?php echo $sd['slider_image'];?>" width="400px" height="250px"/>
        		</td>
            </tr>
            
            <tr>
            	<td><b>Hình ảnh cần thay đổi</b></td>
                <td><input type="file" name="img" /></td>
            </tr>
            
             <tr>
            	<td><b>Trạng thái của silde</b></td>
                <td>
                
                		<?php
							if($sd['slider_active'] == 1)
							{
                        ?>
                        	<input type="radio" id="radActive" name="radActive" value="1" checked="checked" />Đã kích hoạt
                        	<input type="radio" id="radActive" name="radActive" value="0" />Chưa kích hoạt	
                       		<?php
							}
							else{ ?>
					<input type="radio" id="radActive" name="radActive" value="0" checked="checked" />Chưa kích hoạt			
				<input type="radio" id="radActive" name="radActive" value="1" />Đã kích hoạt	
                           <?php
						    }//end : else
                            ?>    
                
             	</td>
            </tr>
            
            <tr>
            	<td></td>
                <td>
   <input type="submit" name="submit" onclick="KiemTra(this.form)" value="Lưu thông tin" class="button_1" style="width:120px; height:auto" />
                </td>
                
            </tr>
            </form>
            
            <?php
			}//end:foreach()
			
			if(isset($message))
				echo $message;
			
            ?>
                
            </table>
           
            <div class="clear"></div><!--.clear-->
            <div align="left">
            <br />
         <a href="<?php echo base_url();?>admin/add_slider" class="button_1" style="width:150px; height:auto; margin-bottom:10px; margin-left:10px">Thêm mới slide</a>
            </div>
                
            
            
            </div><!--#container_index_2-->
    </div><!--#wrapper-->

</body>
</html>