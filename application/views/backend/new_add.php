<?php
	//Css file path :
		$path_css=base_url().'public/backend/css/';
	//Js file of CKEditor:
		$path_ckeditor=base_url().'ckeditor/';	
	//Image file path for new:
		$path_image=base_url().'public/images/image-new/';
		
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
	{
		if(frm.txtTieuDeTin.value =='')
			alert('Chưa nhập tiêu đề của tin tức !');
		else if(frm.txtTrichDan.value =='')
			alert('Chưa nhập trích dẫn tin tức !');
		else if(frm.txtNoiDungNgan.value =='')
			alert('Chưa nhập nội dung tóm tắt !');
		else if(frm.txtNgayDangTin.value =='')
			alert('Chưa nhập ngày đăng tin');
		else if(frm.radTypeNew.value=='')
			alert('Chưa chọn thể loại tin tức !');
		else if(frm.txtChuyenMuc.value=='')
			alert('Chưa chọn chuyên mục tin !');
		else
		{
			alert('Chúc mừng bạn đã thêm tin tức thành công !');
			frm.submit();
		}
			
	}	
</script>


</head>

<body>
	<div id="wrapper" style="background:#000; height:auto">
    		<div class="banner">
      <img src="<?php echo $backend_image;?>new-add.jpg" />
        	</div><!--.banner-->
        <div align="right">
        Hello,&nbsp;<?php echo $this->session->userdata('admin_username');?>&nbsp;&nbsp;[<a href="<?php echo base_url();?>admin/do_logout_2">Đăng xuất</a>]
        <br />
    <a href="<?php echo base_url();?>admin/new_manager">Back to news management</a>&nbsp;
        </div><!--align=right-->
        <br />
        <div class="clear"></div><!--.clear-->
        	<div id="container_index_2" style="background:#000; height:auto">
           <form action="<?php echo base_url();?>admin/add_new" method="post" enctype="multipart/form-data">
            <table cellpadding="20" cellspacing="20">
            	<tr>
                	<td><b>Tiêu đề tin tức</b></td>
                    <td>
                    	<input type="text" name="txtTieuDeTin" id="txtTieuDeTin" size="68" />
                    </td>
                </tr>
                
                <tr>
                	<td><b>Trích dẫn</b></td>
                    <td>
             <textarea name="txtTrichDan" id="txtTrichDan" cols="50" rows="3"></textarea>
                    </td>
                </tr>
                
                <tr>
                	<td><b>Nội dung ngắn</b></td>
                    <td>
           <textarea name="txtNoiDungNgan" id="txtNoiDungNgan" cols="50" rows="10"></textarea>
                    </td>
                </tr>
                
                <tr>
                	<td><b>Hình đại diện</b></td>
                    <td>
                    	<input type="file" name="img" />
                    </td>
                </tr>
                
                <tr>
                	<td><b>Ngày đăng tin</b></td>
                    <td>
                    	<input type="text" name="txtNgayDangTin" id="txtNgayDangTin" value="<?php echo date('d/m/Y',time());?>" />
                    </td>
                </tr>
                
                <tr>
                	<td><b>Thể loại tin</b></td>
                    <td>
		 <input type="radio" value="1" name="radTypeNew" id="radTypeNew" />Game hành động
         				<br />	
        <input type="radio" value="2" name="radTypeNew" id="radTypeNew" />Game nhập vai              			<br />
            <input type="radio" value="3" name="radTypeNew" id="radTypeNew" />Game kinh dị
            			<br />
             <input type="radio" value="4" name="radTypeNew" id="radTypeNew" />Game giải đố
             			<br />
              <input type="radio" value="5" name="radTypeNew" id="radTypeNew" />Game thể thao
              			<br />
              <input type="radio" value="6" name="radTypeNew" id="radTypeNew" />Game mô phỏng
                		 <br />
            <input type="radio" value="7" name="radTypeNew" id="radTypeNew" />Đời sống & tin tức
                  		 <br /> 
         
                    </td>
                </tr>
                
                <tr>
                	<td><b>Chuyên mục tin</b></td>
                    <td>
 		<input type="radio" name="txtChuyenMuc" id="txtChuyenMuc" value="news" />Tin tức game mới cập nhật
            <input type="radio" name="txtChuyenMuc" id="txtChuyenMuc" value="gamelifes" />Game & đời sống
                    </td>
                </tr>
                
                <tr>
                	<td><b>Nội dung chi tiết tin</b></td>
                    <td>
                    
                     <textarea name="editor" rows="10" cols="10">
        	<?php
			echo "Chưa có nội dung chi tiết cho tin tức này ! Hãy thêm vào chi tiết tin này.";
            ?>
        </textarea>
         <script type="text/javascript">CKEDITOR.replace('editor')</script>
                    
                    </td>
                </tr>
                
                
                
                <tr>
                	<td></td>
                    <td>
                    	<input type="submit" name="submit" onclick="KiemTra(this.form)" class="button_1" style="width:120px; height:auto" value="Lưu thông tin" />
                   <input type="reset" class="button_1" style="width:120px; height:auto" value="Nhập lại" />
                    </td>
                </tr>      
            </table>
         </form>
          
            </div><!--#container_index_2-->
    </div><!--#wrapper-->

</body>
</html>