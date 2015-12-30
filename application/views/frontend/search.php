<?php
	//Css file path :
		$path_css=base_url().'public/frontend/css/';
	//Js file path :
		$path_js=base_url().'public/frontend/js/';
		
	//$session_logged = $this->session->userdata('logged_in');	
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
		if(frm.txtcomment.value=='')
			alert('Chưa nhập nội dung bình luận !');
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
				<a href="<?php echo base_url();?>home/dangnhap">Đăng nhap</a>
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
            		<div id="left" style="height:auto">
					
              <?php
			  	foreach($get_result_data as $grs)
				{ ?>
                	<h3>
                    <a href="<?php echo base_url();?>home/newdetail/<?php echo $grs['new_id'];?>">			                    </h3>
					<?php echo $grs['new_quote'];?>
                    </a>
					<br />
                    <?php echo $grs['new_content'];?>
                    <br />
                    <?php
					foreach($get_result_content as $grc)
						{
							echo $grc['new_content_detail'];
						}
					?>
				
                <?php
                }//end: foreach
				
				if(isset($attach))
				{
					echo $attach;
				}
              ?>
                               
         			</div><!--#left-->
        		<div id="right"><?php $this->load->view("frontend/right"); ?></div><!--#right-->
           <div class="clear"></div>
           		<div id="footer">
           	 		<?php $this->load->view("frontend/footer"); ?>
            	</div><!--#footer-->
            
            </div><!--#wrapper-->
     
</body>
</html>