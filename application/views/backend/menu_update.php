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

<script type="text/javascript">
	function KiemTra(frm)
	{
		if(frm.txtTieuDeMenu.value=='')
			alert('Chưa nhập tiêu đề menu !');
		else if(frm.txtTenController.value=='')
			alert('Chưa nhập tên của Controller !');
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
      <img src="<?php echo $backend_image;?>menu-update.jpg" />
        	</div><!--.banner-->
        <div align="right">Hello,&nbsp;<?php echo $this->session->userdata('user_name');?>&nbsp;&nbsp;[<a href="<?php echo base_url();?>admin/do_logout_2">Đăng xuất</a>]
        <br />
        <a href="<?php echo base_url();?>admin/menu_manager">Back to menu manager</a>&nbsp;
        </div>
        <br />
        <div class="clear"></div><!--.clear-->
        	<div id="container_index_2" style="background:#000; height:auto">
            
      
            <table width="1030px" height="auto" border="1px solid #000" cellpadding="2" cellspacing="2">	
            	<?php //foreach($menu_item_data as $mid)
				{
                    $mid = $mid[0];
				?>
                 <form action="<?php echo base_url();?>admin/update_menu/<?php echo $mid['menu_id']; ?>" method="post">
           		<tr>
                	<td>Tiêu đề menu</td>
                    <td>
          <input type="text" name="txtTieuDeMenu" id="txtTieuDeMenu" value="<?php echo $mid['menu_name'] ;?>" />
                    </td>
                </tr>
                
                <tr>
                	<td>Tên Controller</td>
                    <td>
                    <input type="text" name="txtTenController" id="txtTenController" value="<?php echo $mid['menu_link'] ;?>" />
                    </td>
                </tr>
                
                <tr>
                	<td>Trạng thái kích hoạt</td>
                    <td>
						<?php
							if ($mid['menu_active'] == 1)
							{
                        ?>
                        	<input type="radio" id="radActive" name="radActive" value="1" checked="checked" />Đã kích hoạt
                        	<input type="radio" id="radActive" name="radActive" value="0" />Chưa kích hoạt	
                       		<?php
							}
							else { ?>
					<input type="radio" id="radActive" name="radActive" value="0" checked="checked" />Chưa kích hoạt			
				<input type="radio" id="radActive" name="radActive" value="1" />Đã kích hoạt	
                           <?php
						    }//end : else
                            ?>    
                    </td>
                    <tr>
                    	<td></td>
                        <td>
                        	<input type="submit" value="Lưu thông tin" onclick="KiemTra(this.form)" />
                        </td>
                    </tr>
                </tr>
                
                </form>
                
             <?php
				}//end : foreach
				
				if(isset($message))
					echo $message;
             ?>   
                
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