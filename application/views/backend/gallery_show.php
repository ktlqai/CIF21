<?php
	//Css file path :
		$path_css=base_url().'public/backend/css/';
	//Path to Gallery image file:
		$path_gallery = base_url().'public/images/image-gallery/';	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Home Page</title>

<!--start Css file here-->
<link rel="stylesheet" type="text/css" href="<?php echo $path_css; ?>style.css" />
<!--end Css file here-->
</head>

<body>
	<div id="wrapper" style="background:#OOO; height:auto;">
    		<div class="banner">
      <img src="<?php echo $backend_image;?>gallery-manager.jpg" />
        	</div><!--.banner-->
        <div align="right">Hello,&nbsp;<?php echo $this->session->userdata('admin_username');?>&nbsp;&nbsp;[<a href="<?php echo base_url();?>admin/do_logout_2">Đăng xuất</a>]
        <br />
        <a href="<?php echo base_url();?>admin">Back to home</a>&nbsp;
        </div>
        <br />
        
        
      <div class="clear"></div><!--.clear-->
            <div align="left">
            <br />
         <a href="<?php echo base_url();?>admin/add_gallery" class="button_1" style="width:150px; height:auto; margin-bottom:10px; margin-left:10px">Thêm mới gallery</a>
            </div>
        
        
        <div class="clear"></div><!--.clear-->
           
        	<div id="container_index_2" style="background:#000; height:auto">
            <table width="1030px" height="auto" border="1px solid #000" cellpadding="2" cellspacing="2">
				<tr>
                	<td width="50px" align="center"><b>STT</b></td>
                    <td width="100px" align="center"><b>Tiêu đề</b></td>
                    <td width="300px" align="center"><b>Ảnh đại diện</b></td>
                    <td width="100px" align="center"><b>Giới thiệu</b></td>
                    <td width="50px" align="center"><b>Tùy chọn</b></td>
                </tr>
                <?php foreach( $data_gallery as $d_g)
				{?>
                	<tr>
                    	<td width="50px" align="center"><?php echo $d_g['gallery_id'];?></td>
                    	<td width="100px" align="center"><?php echo $d_g['gallery_name'];?></td>
                    	<td width="300px" align="center">
     <img src="<?php echo $path_gallery;?><?php echo $d_g['gallery_image'];?>" width="300px" height="250px" />   
                        </td>
                    	<td width="100px" align="center"><?php echo $d_g['gallery_quote'];?></td>
                      
                        <td width="50px" align="center">
           <a href="<?php echo base_url();?>admin/delete_gallery/<?php echo $d_g['gallery_id']?>" onclick='return confirm("Bạn có chắc muốn xóa [<?php echo $d_g['gallery_name'];?>]  không ?")'>  
                <img src="<?php echo $backend_image;?>xoa.png" width="30px" height="30px" title="Xóa" />
     </a>      
     <br />
     <br />
     <br />
     <a href="<?php echo base_url();?>admin/update_gallery/<?php echo $d_g['gallery_id'];?>">  
                <img src="<?php echo $backend_image;?>sua.png" width="30px" height="30px" title="Sửa thông tin" />
     </a>
                        </td>
                        
                    </tr>
                    
                    
                <?php
				}//end:foreach()
                ?>    
            </table>
            </div><!--#container_index_2-->
    </div><!--#wrapper-->

</body>
</html>