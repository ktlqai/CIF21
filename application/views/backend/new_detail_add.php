<?php
	//Css file path :
		$path_css=base_url().'public/backend/css/';
	//Js file path :
		$path_js=base_url().'public/backend/js/';
	//Image file path for sliders:
		$path_image=base_url().'public/images/image-slider/';
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

<!--Js For CKEditor-->
<script type="text/javascript" src="<?php echo $path_ckeditor;?>ckeditor.js"></script>
<script type="text/javascript">
	//function ABCXYZ()
	//{
		//Đây là code lấy dữ liệu của khung CKEditor
		//var content = CKEDITOR.instances.editor.getData();
		
	//}
</script>
<!--Js For CKEditor-->



</head>

<body>
	<div id="wrapper" style="background:#360">
    		<div class="banner">
      <img src="<?php echo $backend_image;?>add-slider.jpg" />
        	</div><!--.banner-->
        <div align="right">
        Hello,&nbsp;<?php echo $this->session->userdata('admin_username');?>&nbsp;&nbsp;[<a href="<?php echo base_url();?>admin/do_logout_2">Đăng xuất</a>]
        <br />
    <a href="<?php echo base_url();?>admin/slider_manager">Back to slider management</a>&nbsp;
        </div><!--align=right-->
        <br />
        <div class="clear"></div><!--.clear-->
        	<div id="container_index_2" style="background:#09C">
            
			<!--SHOW CKEDITOR WITH <textarea> HERE-->
            <form action="<?php echo base_url();?>admin/add_slider" method="post">
            STT tin <input type="text" name="stt" id="stt" />
            <br />
            Loại tin tức <input type="text" name="loaitin" id="loaitin" />
            
      		<textarea id="editor" name="editor" cols="10" rows="10"></textarea>
        <script type="text/javascript">CKEDITOR.replace('editor')</script>
        
        	<input type="submit" value="Lưu" />
            <div id="track"></div>
            </form>
            <!--USE CKEDITOR HERE-->
            <?php
				if(isset($message))
					echo $message;
            ?>
            </div><!--#container_index_2-->
    </div><!--#wrapper-->

</body>
</html>