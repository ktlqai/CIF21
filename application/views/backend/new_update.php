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
      <img src="<?php echo $backend_image;?>new-update.jpg" />
        	</div><!--.banner-->
        <div align="right">Hello,&nbsp;<?php echo $this->session->userdata('admin_username');?>&nbsp;&nbsp;[<a href="<?php echo base_url();?>admin/do_logout_2">Đăng xuất</a>]
        <br />
        <a href="<?php echo base_url();?>admin/new_manager">Back to new manager</a>&nbsp;
        </div>
        <br />
        <div class="clear"></div><!--.clear-->
        	<div id="container_index_2" style="background:#000; height:auto">
               
           <?php 
		   		if(isset($new_detail))
				{
		   ?>
             
            <table width="1030px" height="auto" cellpadding="10" cellspacing="10">
            
            <?php
				foreach($new_detail as $n_d)
				{ 
			?>	
            	<form action="<?php echo base_url();?>admin/update_new/<?php echo $n_d['new_id']; ?>" method="post">
				<tr>
                	<td><b>Mã tin tức</b></td>
                    <td align="left">
                    	<input type="text" readonly="readonly" value="<?php echo $n_d['new_id']?>" />
                    </td>
                </tr>
                
                <tr>
                	<td><b>Tiêu đề tin tức</b></td>
                    <td>
        <input type="text" readonly="readonly" size="68" value="<?php echo $n_d['new_title'];?>" />
                    </td>
                </tr>
          
                <tr>
                	<td><b>Chi tiết tin tức</b></td>
                    <td>
        <textarea name="editor" rows="10" cols="10">
        	<?php
				if($n_d['new_content_detail_2']=='')
					{echo "Chưa có nội dung chi tiết cho tin tức này ! Hãy thêm vào chi tiết tin này.";}
				else
				{echo $n_d['new_content_detail_2'];}
            ?>
        </textarea>
         <script type="text/javascript">CKEDITOR.replace('editor')</script>
                    </td>
                </tr>
                
                 <tr>
                	<td><b>Ngày đăng tin</b></td>
                    <td>
                  <input type="text" readonly="readonly" value="<?php echo $n_d['new_day']; ?>" />
                    </td>
                </tr>
                
                 <tr>
                	<td><b>Thể loại tin</b></td>
                    <td>
                    	<input type="text" readonly="readonly" value="<?php echo $n_d['type_name'];?>" />
                    </td>
                </tr>
                
                 <tr>
                	<td><b>Chuyên mục tin tức</b></td>
                    <td>
                    	<input type="text" readonly="readonly" value="<?php echo $n_d['new_type'];?>" />
                    </td>
                </tr>
                
                 <tr>
                		<td>
                    	</td>
                    <td>
           <input type="submit" name="submit" onclick="alert('Lưu thành công !')" value="Lưu thay đổi" class="button_1" style="width:120px; height:auto" />
                    </td>
                </tr>
                
                <?php
				}//end foreach()
				?>
                
            </table>
                      
           <?php
				}//end if()
           ?>
           
           <!--///////////////////////////////////////////////////////////////////////////-->
           
           
           <?php
		   		if(isset($new_detail_2))
				{
           ?>
           
            <table width="1030px" height="auto" cellpadding="10" cellspacing="10">
            
            <?php
				foreach($new_detail_2 as $n_d)
				{ 
			?>	
            	<form action="<?php echo base_url();?>admin/update_new/<?php echo $n_d['new_id']; ?>" method="post">
				<tr>
                	<td><b>Mã tin tức</b></td>
                    <td align="left">
                    	<input type="text" readonly="readonly" value="<?php echo $n_d['new_id']?>" />
                    </td>
                </tr>
                
                <tr>
                	<td><b>Tiêu đề tin tức</b></td>
                    <td>
        <input type="text" readonly="readonly" size="68" value="<?php echo $n_d['new_title'];?>" />
                    </td>
                </tr>
          
                <tr>
                	<td><b>Chi tiết tin tức</b></td>
                    <td>
        <textarea name="editor" rows="10" cols="10">
        	<?php
				if($n_d['new_content_detail_2']=='')
					{echo "Chưa có nội dung chi tiết cho tin tức này ! Hãy thêm vào chi tiết tin này.";}
				else
				{echo $n_d['new_content_detail_2'];}
            ?>
        </textarea>
         <script type="text/javascript">CKEDITOR.replace('editor')</script>
                    </td>
                </tr>
                
                 <tr>
                	<td><b>Ngày đăng tin</b></td>
                    <td>
                  <input type="text" readonly="readonly" value="<?php echo $n_d['new_day']; ?>" />
                    </td>
                </tr>
                
                 <tr>
                	<td><b>Thể loại tin</b></td>
                    <td>
                    	<input type="text" readonly="readonly" value="<?php echo $n_d['type_name'];?>" />
                    </td>
                </tr>
                
                 <tr>
                	<td><b>Chuyên mục tin tức</b></td>
                    <td>
                    	<input type="text" readonly="readonly" value="<?php echo $n_d['new_type'];?>" />
                    </td>
                </tr>
                
                 <tr>
                		<td>
                    	</td>
                    <td>
           <input type="submit" name="submit" onclick="KiemTra(this.form)" value="Lưu thay đổi" class="button_1" style="width:120px; height:auto" />
                    </td>
                </tr>
                
                <?php
				}//end foreach()
				?>
                
            </table>
           
           <?php
				}//end if()
           ?>
           
           
            <div class="clear"></div><!--.clear-->
                     
            </div><!--#container_index_2-->
    </div><!--#wrapper-->

</body>
</html>