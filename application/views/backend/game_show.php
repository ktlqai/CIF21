<?php
	//Css file path :
		$path_css=base_url().'public/backend/css/';
	//Path to image of flash game :
		$path_image=base_url().'public/images/image-flash-game/';
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
      <img src="<?php echo $backend_image;?>game-manager.jpg" />
        	</div><!--.banner-->
        <div align="right">Hello,&nbsp;<?php echo $this->session->userdata('admin_username');?>&nbsp;&nbsp;[<a href="<?php echo base_url();?>admin/do_logout_2">Đăng xuất</a>]
        <br />
        <a href="<?php echo base_url();?>admin">Back to home</a>&nbsp;
        </div>
        <br />
        
        
         <div class="clear"></div><!--.clear-->
            <div align="left">
            <br />
         <a href="<?php echo base_url();?>admin/add_game" class="button_1" style="width:190px; height:auto; margin-bottom:10px; margin-left:10px">Thêm mới flash game</a>
            </div>
        
        <div class="clear"></div><!--.clear-->
        	<div id="container_index_2" style="background:#000; height:auto">
            <table width="1030px" height="auto" border="1px solid #000" cellpadding="5" cellspacing="5">
            	<tr>
                <td width="50px" align="center"><b>Số thứ tự</b></td>
                <td align="center"><b>Tên game</b></td>
                <td align="center"><b>Hình ảnh</b></td>
                <td align="center" width="200px"><b>Giới thiệu</b></td>
                <td width="50px" align="center"><b>Tùy chọn</b></td>
                </tr>
                
             	<?php foreach($data_game as $md)
				{?>
                
				<tr>
               	<td width="50px" align="center"><?php echo $md['game_id'];?></td>
                <td align="center"><?php echo $md['game_name'];?></td>
                <td align="center">
             <img src="<?php echo $path_image?><?php echo $md['game_image'];?>" width="250px" height="200px" />
                </td>
                <td align="center" width="200px">
                <?php echo $md['game_intro'];?>
                </td>
                <td width="50px" align="center">
            <a href="<?php echo base_url();?>admin/delete_game/<?php echo $md['game_id']?>" onclick='return confirm("Bạn có chắc muốn xóa [<?php echo $md['game_name']?>]  không ?")'>    
                <img src="<?php echo $backend_image;?>xoa.png" width="30px" height="30px" title="Xóa" />
           </a>
           <br />
           <br />
      <a href="<?php echo base_url();?>admin/update_game/<?php echo $md['game_id']?>">    
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