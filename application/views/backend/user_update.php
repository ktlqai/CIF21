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
		if(frm.txtTenDN.value=='')
			alert('Chưa nhập tên đăng nhập');
		else if(frm.txtMatKhau.value=='')
			alert('Chưa nhập mật khẩu ');
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
      <img src="<?php echo $backend_image;?>user-update.jpg" />
        	</div><!--.banner-->
        <div align="right">Hello,&nbsp;<?php echo $this->session->userdata('admin_username');?>&nbsp;&nbsp;[<a href="<?php echo base_url();?>admin/do_logout_2">Đăng xuất</a>]
        <br />
        <a href="<?php echo base_url();?>admin/user_manager">Back to user manager</a>&nbsp;
        </div>
        <br />
        <div class="clear"></div><!--.clear-->
        	<div id="container_index_2" style="background:#000; height:auto">
            
      
            <table width="1030px" height="auto" border="1px solid #000" cellpadding="2" cellspacing="2">	
            	<?php foreach($user_data as $ud)
				{
				?>
                 <form action="<?php echo base_url();?>admin/user_update/<?php echo $ud['user_id']; ?>" method="post">
           		<tr>
                	<td>Tên đăng nhập</td>
                    <td><input type="text" name="txtTenDN" id="txtTenDN" value="<?php echo $ud['user_name']?>" /></td>
                 </tr>
                 <tr>   
                    <td>Mật khẩu</td>
                    <td><input type="text" name="txtMatKhau" id="txtMatKhau" value="<?php echo $ud['user_password']?>" /></td>
                    </tr>
                    <tr>
                    <td>Phân quyền</td>
                    <td>
                    		
                            		<?php
							if($ud['user_level'] == 1)
							{
                        ?>
                        	<input type="radio" id="radLevel" name="radLevel" value="1" checked="checked" />Admin
                        	<input type="radio" id="radLevel" name="radLevel" value="0" />User	
                       		<?php
							}
							else{ ?>
					<input type="radio" id="radLevel" name="radLevel" value="0" checked="checked" />User			
				<input type="radio" id="radLevel" name="radLevel" value="1" />Admin	
                           <?php
						    }//end : else
                            ?>    
                            
                    </td>
                </tr>
                <tr>
                	<td></td>
                    <td><input type="button" value="Lưu lại" onclick="KiemTra(this.form)" /></td>
                </tr>
                </form>
                <?php
				}//end: foreach()
				
			if(isset($message))
				echo $message;
			
                ?>
            </table>
            <div class="clear"></div><!--.clear-->
            <br />
           
                
            
            
            </div><!--#container_index_2-->
    </div><!--#wrapper-->

</body>
</html>