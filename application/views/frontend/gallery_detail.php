<?php
	//Css file path :
		$path_css=base_url().'public/frontend/css/';
	//Js file path :
		$path_js=base_url().'public/frontend/js/';
		
	//$session_logged = $this->session->userdata('logged_in');
	
	//Thiết lập vùng giờ mặc định:
				date_default_timezone_set('Asia/Ho_Chi_Minh');
				//Thiết lập định dạng ngày, giờ :
				$day=date("F j, Y, g:i a");
	
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Blue Game | Recent Update News</title>

<!--start Css file here-->
<link rel="stylesheet" type="text/css" href="<?php echo $path_css; ?>style.css" />
<!--end Css file here-->


<script type="text/javascript">
	function CheckComment(frm){
		//Check E-mail address :
			//var check_email = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; // Regular Expression Check Email String	
		if(frm.txtcomment.value=='')
			alert('Chưa nhập nội dung bình luận !');
		//else if(frm.txtHoTen.value=='')
			//alert('Chưa nhập họ và tên !');
		//else if(frm.txtEmail.value=='')
			//alert('Chưa nhập E-mail !');
		//else if(!check_email.test(frm.txtEmail.value)) // check Email here !
			//alert('Địa chỉ email không hợp lệ !');
		else
			{
				alert('Cám ơn bình luận của bạn về bài viết này !');
				frm.submit();
			}
}
</script>
</head>

<body>
			<div class="wrapper_menu">
		<div class="container">
       	 	<?php $this->load->view("frontend/menu");?>
        </div><!--.container-->
        
         <a href="<?php echo base_url();?>home/dangky">Đăng ký</a> |  
        <?php
			//$session_user = $this->session->userdata('user_fullname'); 
		 	if($this->session->userdata('logged_in')==false) // Đã đăng nhập ( True )  hay chưa (False) ?
			{
				$this->session->sess_destroy();
			?>	
				<a href="<?php echo base_url();?>home/dangnhap">Đăng nhập</a>
          <?php      
			}//end if
			else
			{?>
		Hello, <?php echo "<b>".$this->session->userdata('user_name')."</b>"?>[<a href="<?php echo base_url();?>home/do_logout">Click here to Logout !</a>]
			
            <?php
            }
        ?>
     		</div><!--.wrapper_menu-->
            
     <div class="clear"></div><!--.clear-->
  
            <div id="wrapper">
            		<div id="left" style="height:auto; margin-bottom:20px">
                		
                         <div>
                        	<?php foreach($title_gallery as $gtfgd)
							{
								echo "<h3 style='color:#09F'>" .$gtfgd['gallery_name']. "</h3>". "<p align='right'>".date("F j, Y, g:i a")."</p>";
								echo "<br />";
								echo "<b>" .$gtfgd['gallery_quote']. "</b>";
							}
                            ?>
                        </div>
                        
                    	<div id="new_detail">
                        	<?php foreach($gallery_detail as $nd)
							{
								echo $nd['new_content_detail'];
							}
							?>
                    	</div><!--#new_detail-->
                         	<div id="news_other">
					<?php $this->load->view("frontend/newother"); ?>
                			</div><!--#news_other-->
                           <br />
                           
                              <div align="left" style="height:auto">
       	<b>Ý kiến của bạn đọc</b>&nbsp;( hiện có :&nbsp;<?php if(!is_null($count_all_comment_each_new)) echo $count_all_comment_each_new;?> bình luận về bài viết này. )
       							</div>       
               
                  <?php 
			 if($this->session->userdata('logged_in') == true) // đăng nhập rồi 
			   	{?>     
                            
               <div id="comment_board">
 					<?php $this->load->view('frontend/comment'); ?>
                  <br />
                  <br />
                  <br />
                  
                   <div style="margin-bottom:10px"></div>
                      <div id="comment_board_quote">
                      	<?php $this->load->view('frontend/comment_quote');?>				 
                      </div><!--#comment_board_quote-->
                    
               	</div><!--#comment_board-->
				<?php
				}//end if()
					else
						{
                	?>
                    	        &raquo;<b>Chú ý :</b> Bạn cần <a style="color:#F00" href="<?php echo base_url();?>home/dangnhap">Đăng nhập</a> để comment cho bài viết này.
                <div style="margin-bottom:10px"></div>
                      <div id="comment_board_quote">
                      	<?php $this->load->view('frontend/comment_quote');?>
                       				 
                      </div><!--#comment_board_quote-->
      				<?php
						}//end else()
                    ?>        
         			</div><!--#left-->
        		<div id="right"><?php $this->load->view("frontend/right"); ?></div><!--#right-->
           <div class="clear"></div>
            </div><!--#wrapper-->
     			
                 <div class="clear"></div>
            <div id="container_footer">
            	<div id="footer">
                	<?php
						include_once("footer.php");
                    ?>
                </div><!--#footer-->
            </div><!--#container_footer-->	
     
</body>
</html>

































































































































