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
	function KiemTraMenu(frm)
	{
		if(frm.txtTenMenu.value == '')
			alert('Chưa nhập tên của Menu !');
		else if(frm.txtTenController.value == '')
			alert('Chưa nhập tên Controller của menu !');
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
      <img src="<?php echo $backend_image;?>menu-add.jpg" />
        	</div><!--.banner-->
        <div align="right">
        Hello,&nbsp;<?php echo $this->session->userdata('user_name');?>&nbsp;&nbsp;[<a href="<?php echo base_url();?>admin/do_logout_2">Đăng xuất</a>]
        <br />
    <a href="<?php echo base_url();?>admin/menu_manager">Back to menu management</a>&nbsp;
        </div><!--align=right-->
        <br />
        <div class="clear"></div><!--.clear-->
        	<div id="container_index_2" style="background:#000; height:auto">
            
		
            <fieldset>
            	<legend>Thông tin của menu</legend>
            <form action="<?php echo base_url();?>admin/add_menu" method="post" name="add_menu">
            <table cellpadding="10" cellspacing="10">
            	<tr>
                	<td>Tên menu</td>
                    <td><input type="text" name="txtTenMenu" id="txtTenMenu" /></td>
                </tr>
                
                <tr>
                	<td>Tên Controller</td>
                    <td><input type="text" name="txtTenController" id="txtTenController" /></td>
                </tr>
                
                <tr>
                	<td>Kích hoạt</td>
                    <td>
                   	<input type="radio" name="radActive" value="0" id="radActive" />Không
                    <input type="radio" name="radActive" value="1" id="radActive" />Có
                    </td>
                </tr>
				
                 <tr>
                	<td></td>
               <td>
               <input type="button" value="Lưu lại" onclick="KiemTraMenu(this.form)" class="button_1" style="width:150px" height="auto" border="0" />
               </td>
                </tr> 
            </table>
            </form>
            </fieldset>
        
            </div><!--#container_index_2-->
    </div><!--#wrapper-->

</body>
</html>