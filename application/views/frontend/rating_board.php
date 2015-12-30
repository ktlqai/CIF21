<?php
	//Css file path :
		$path_css=base_url().'public/frontend/css/';
	//Js file path :
		$path_js=base_url().'public/frontend/js/';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Blue Game | Recent Update News</title>

<!--start Css file here-->
<link rel="stylesheet" type="text/css" href="<?php echo $path_css; ?>style.css" />
<!--end Css file here-->

</head>

<body>
			<div class="wrapper_menu">
		<div class="container">
       	 	<?php $this->load->view("frontend/menu");?>
        </div><!--.container-->
        
        <?php
			//$session_user = $this->session->userdata('user_fullname'); 
		 	if($this->session->userdata('logged_in')==false) // Đã đăng nhập ( True )  hay chưa (False) ?
			{
				$this->session->sess_destroy();
			?>	
            	     <a href="<?php echo base_url();?>home/dangky">Đăng ký</a> |  
				<a href="<?php echo base_url();?>home/dangnhap">Đăng nhập</a>
          <?php      
			}
			else
			{
				echo "Hello, ".$this->session->userdata('user_name').'['.$log_out.']';
			}

        ?>
        
     		</div><!--.wrapper_menu-->
            
     <div class="clear"></div><!--.clear-->
  
            <div id="wrapper">
            		<div id="left" style="height:auto">
                      <div class="title"><img src="<?php echo $frontend_image; ?>/image-stuff/diem-tin-game.jpg" /></div><!--#left .title-->
                      
                    	<?php
							$this->load->view("frontend/rating_board_process");
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
            </div><!--#container_footer--
     
</body>
</html>

































































































































