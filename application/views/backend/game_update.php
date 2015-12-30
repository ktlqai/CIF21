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
      <img src="<?php echo $backend_image;?>game-update.jpg" />
        	</div><!--.banner-->
        <div align="right">Hello,&nbsp;<?php echo $this->session->userdata('admin_username');?>&nbsp;&nbsp;[<a href="<?php echo base_url();?>admin/do_logout_2">Đăng xuất</a>]
        <br />
     <a href="<?php echo base_url();?>admin/flashgame_manager">Back to flashgame manager</a>&nbsp;
        </div>
        <br />
        <div class="clear"></div><!--.clear-->
        	<div id="container_index_2" style="background:#000; height:auto">
            <table width="1030px" height="auto" cellpadding="10" cellspacing="10">
            	<?php
					foreach($game_detail as $g_d)
					{
                ?>
     			<tr>
                	<td><b>Mã số game</b></td>
                    <td>
             <input type="text" readonly="readonly" value="<?php echo $g_d['new_id_detail'];?>" />
                    </td>
                </tr>
                
                <tr>
                	<td><b>Tên game</b></td>
                    <td>
                    	<input type="text" readonly="readonly" value="<?php echo $g_d['game_name'];?>" size="65" />
                    </td>
                </tr>
                
                <tr>
                	<td><b>Chi tiết game</b></td>
                    <td>
                    	
                        <textarea id="editor" name="editor" rows="10" cols="10">
                        <?php
							if($g_d['new_content_detail']=='')
								{echo "Chưa có dữ liệu cho game này !";}
							else
								{echo $g_d['new_content_detail'];}
                        ?>
                        </textarea>
                        <script type="text/javascript">CKEDITOR.replace('editor')</script>
                    </td>
                </tr>
                
                <td></td>
                    <td>
                    	<input type="submit" name="submit" onclick="KiemTra(this.form)" class="button_1" style="width:120px; height:auto" value="Lưu thông tin" />
                    </td>
                </tr>
                <?php
					}//end:foreach()
                ?>
           </table>
            <div class="clear"></div><!--.clear-->
           
            </div><!--#container_index_2-->
    </div><!--#wrapper-->

</body>
</html>