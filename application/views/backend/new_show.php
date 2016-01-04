<?php
	//Css file path :
		$path_css=base_url().'public/backend/css/';
	//Path image to news image show:
		$path_image_new = base_url().'public/images/image-new/';	
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
      <img src="<?php echo $backend_image;?>new-manager.jpg" />
        	</div><!--.banner-->
  
        <div align="right">Hello,&nbsp;<?php echo $this->session->userdata('user_name');?>&nbsp;&nbsp;[<a href="<?php echo base_url();?>admin/do_logout_2">Đăng xuất</a>]
        <br />
        <a href="<?php echo base_url();?>admin">Back to home</a>&nbsp;
        </div>
        <br />
        <div class="clear"></div><!--.clear-->
        
            <div align="left">
            <br />
         <a href="<?php echo base_url();?>admin/add_new" class="button_1" style="width:150px; height:auto; margin-bottom:10px; margin-left:10px">Thêm mới tin</a>
            </div>
        <div class="clear"></div><!--.clear-->
        
        	<div id="container_index_2" style="background:#000; height:auto">
            <table width="1030px" height="auto" border="1px solid #000" cellpadding="2" cellspacing="2">
				<tr>
                	<td width="30" align="center"><b>STT</b></td>
                    <td width="50" align="center"><b>Tiêu đề tin</b></td>
                    <td width="100px" align="center"><b>Trích dẫn</b></td>
                    <td width="100px" align="center"><b>Nội dung ngắn</b></td>
                    <td width="180px" align="center"><b>Hình minh họa</b></td>
                    <td width="50px" align="center"><b>Ngày đăng tin</b></td>
                    <td width="50px" align="center"><b>Thể loại</b></td>
                    <td width="50" align="center"><b>Chuyên mục</b></td>
                    <td width="50" align="center"><b>Tùy chọn</b></td>
                </tr>
                
                <?php foreach($data as $d_n_a)
				{?>
                <tr>
                	<td width="30" align="center"><?php echo $d_n_a['new_id'];?></td>
                    <td width="50" align="center"><?php echo $d_n_a['new_title'];?></td>
                    <td width="100px" align="center"><?php echo $d_n_a['new_quote'];?></td>
                    <td width="100px" align="center"><?php echo substr($d_n_a['new_content'],0,50);?>...</td>
                    <td width="180px" align="center">
             <img src="<?php echo $path_image_new;?><?php echo $d_n_a['new_image'];?>" width="180px" height="130px" />
                    </td>
                    <td width="50px" align="center"><?php echo $d_n_a['new_day'];?></td>
                    <td width="50px" align="center"><?php echo $d_n_a['type_name'];?></td>
                    <td width="50" align="center"><?php echo $d_n_a['new_type'];?></td>
                    <td width="50" align="center">
               	
                
                <a href="<?php echo base_url();?>admin/update_new/<?php echo $d_n_a['new_id'];?>">  
                <img src="<?php echo $backend_image;?>sua.png" width="30px" height="30px" title="Sửa thông tin" />
     </a>
                <br />
                <br />
            <a href="<?php echo base_url();?>admin/delete_new/<?php echo $d_n_a['new_id'];?>" onclick='return confirm("Bạn có chắc muốn xóa [<?php echo $d_n_a['new_title']?>]  không ?")'>    
                <img src="<?php echo $backend_image;?>xoa.png" width="30px" height="30px" title="Xóa" />
           </a> 
                    </td>
                </tr>
             <?php
				}//end: foreach()
             ?>            	
            </table>
                <?php
							echo '<div align="center" id="pagination">';
         echo $this->pagination->create_links(); // tạo link phân trang trong thu vien pagination
                			echo '</div><!--#pagination-->'; 
			?>
            
            </div><!--#container_index_2-->
    </div><!--#wrapper-->

</body>
</html>
