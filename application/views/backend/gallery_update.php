<?php
	//Css file path :
		$path_css=base_url().'public/backend/css/';
	//Js file of CKEditor:
		$path_ckeditor=base_url().'ckeditor/';	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Home Page</title>

<!--start Css file here-->
<link rel="stylesheet" type="text/css" href="<?php echo $path_css; ?>style.css" />
<!--end Css file here-->

<!--JS CKEditor-->
<script type="text/javascript" src="<?php echo $path_ckeditor;?>ckeditor.js"></script>
<!--JS CKEditor-->

<script type="text/javascript">
	function KiemTra(frm)
		if(frm.editor.value == '')
			alert('Chưa nhập nội dung chi tiết !');
		else
			{
				alert('Lưu thành công !');
				frm.submit();
			}
</script>


</head>

<body>
	<div id="wrapper" style="background:#OOO; height:auto;">
    		<div class="banner">
      <img src="<?php echo $backend_image;?>gallery-update.jpg" />
        	</div><!--.banner-->
        <div align="right">Hello,&nbsp;<?php echo $this->session->userdata('admin_username');?>&nbsp;&nbsp;[<a href="<?php echo base_url();?>admin/do_logout_2">Đăng xuất</a>]
        <br />
        <a href="<?php echo base_url();?>admin/gallery_manager">Back to gallery manager</a>&nbsp;
        </div>
        <br />
        <div class="clear"></div><!--.clear-->
        	<div id="container_index_2" style="background:#000; height:auto">
            <table width="1030px" height="auto" cellpadding="10" cellspacing="10">
            <?php
				foreach($gallery_detail as $g_d)
				{
            ?>
            	<tr>
                
                <form action="<?php echo base_url();?>admin/update_gallery/<?php echo $g_d['new_id_detail']?>" method="post">
                	<td><b>Mã số gallery</b></td>
                    <td align="left"><input type="text" readonly="readonly" value="<?php echo $g_d['new_id_detail'];?>" /></td>
                </tr>
                
                <tr>
                	<td><b>Nội dung</b></td>
                    <td align="center">
                    	<!--Use CKeditor here-->
                        
        <textarea id="editor" name="editor" cols="10" rows="10">
        	<?php if($g_d['new_content_detail']=='')
						{echo "Chưa có nội dung cho phần này, hãy thêm một số nội dung vào !";}
				 else
						{echo $g_d['new_content_detail'];}
			?>
        </textarea>
        <script type="text/javascript">CKEDITOR.replace('editor')</script>
        
                        <!--Use CKeditor here-->
                    </td>
                </tr>
                
                <tr>
                	<td><b>Chi tiết loại</b></td>
                    <td>
         <input type="text" readonly="readonly" value="<?php echo $g_d['new_detail_type'];?>" />
                    </td>
                </tr>
                
                 <tr>
                	<td></td>
                    <td>
               <input type="submit" name="submit" value="Lưu thay đổi" class="button_1" style="width:150px; height:auto" onclick="KiemTra(this.form)" />     
                    </td>
                </tr>
                <?php
				}//end: foreach()
				
			if(isset($message))
				echo $message;
				
                ?>          
                </form>
            </table>
            <div class="clear"></div><!--.clear-->
            <div align="left">
            <br />
         <a href="<?php echo base_url();?>admin/add_menu" class="button_1" style="width:150px; height:auto; margin-bottom:10px; margin-left:10px">Thêm mới menu</a>
            </div>
                
            
            
            </div><!--#container_index_2-->
    </div><!--#wrapper-->

</body>
</html>