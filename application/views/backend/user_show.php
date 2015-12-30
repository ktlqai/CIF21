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
<style>
	#container_index_2 table tr:hover{
		color:#F00;
		background:#FFF;
	}
</style>
</head>

<body>
	<div id="wrapper" style="background:#OOO; height:auto;">
    		<div class="banner">
      <img src="<?php echo $backend_image;?>user-manager.jpg" />
        	</div><!--.banner-->
        <div align="right">Hello,&nbsp;<?php echo $this->session->userdata('admin_username');?>&nbsp;&nbsp;[<a href="<?php echo base_url();?>admin/do_logout_2">Đăng xuất</a>]
        <br />
        <a href="<?php echo base_url();?>admin">Back to home</a>&nbsp;
        </div>
        <br />
        <div class="clear"></div><!--.clear-->
        	<div id="container_index_2" style="background:#000; height:auto">
            <table width="1030px" height="auto" border="1px solid #000" cellpadding="2" cellspacing="2">
         		<tr>
                	<td width="50" align="center"><b>STT</b></td>
                    <td width="50" align="center"><b>Tên đăng nhập</b></td>
                    <td width="100" align="center"><b>Mật khẩu</b></td>
                    <td width="50" align="center"><b>Họ và tên</b></td>
                    <td width="50" align="center"><b>Giới tính</b></td>
                    <td width="50" align="center"><b>Ngày sinh</b></td>
                    <td width="50" align="center"><b>Số ĐT</b></td>
                    <td width="50" align="center"><b>Địa chỉ</b></td>
                    <td width="50" align="center"><b>Email</b></td>
                    <td width="50" align="center"><b>Level</b></td>
                    <td width="50" align="center"><b>Tùy chọn</b></td>
                </tr>
                 	<?php foreach($user_data as $ud)
					{
					?>
                <tr>
                    <td width="50" align="center"><?php echo $ud['user_id'];?></td>
                    <td width="50" align="center"><?php echo $ud['user_name'];?></td>
                    <td width="100" align="center"><?php echo $ud['user_password'];?></td>
                    <td width="50" align="center"><?php echo $ud['user_full_name'];?></td>
                    <td width="50" align="center"><?php echo $ud['user_sex'];?></td>
                    <td width="50" align="center"><?php echo $ud['user_birthday'];?></td>
                    <td width="50" align="center"><?php echo $ud['user_phone'];?></td>
                    <td width="50" align="center"><?php echo $ud['user_address'];?></td>
                    <td width="50" align="center"><?php echo $ud['user_email'];?></td>
                    <td width="50" align="center"><?php echo $ud['user_level'];?></td>
                    <td width="50" align="center">
                    
          <a href="<?php echo base_url();?>admin/user_delete/<?php echo $ud['user_id']?>" onclick='return confirm("Bạn có chắc muốn xóa [<?php echo $ud['user_name']?>]  không ?")'>  
                     <img src="<?php echo $backend_image;?>xoa.png" width="30px" height="30px" title="Xóa" />
          </a>     
                     <br />
             <a href="<?php echo base_url();?>admin/user_update/<?php echo $ud['user_id']?>">
                      <img src="<?php echo $backend_image;?>sua.png" width="30px" height="30px" title="Sửa thông tin" />
              </a>    
                    </td>
                    
                </tr>
                        <?php
					}//end: foreach()
                    ?>
                	
            </table>
            <div class="clear"></div><!--.clear-->
            <br />
                 
            
            </div><!--#container_index_2-->
    </div><!--#wrapper-->

</body>
</html>