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
                    	
                        <div>
                        	<?php foreach($title_game as $ntfnd)
							{
								echo "<h3 style='color:#09F'>" .$ntfnd['game_name']. "</h3>";
							}?>
                            <div align="right"><?php echo date("F j, Y, g:i a");?></div>
                            <div class="clear"></div>
                            <?php
                            {
								echo "<b>" .$ntfnd['game_intro']. "</b>";
								echo "<br />";
							}
                            ?> 
                        </div>
                        
                    	<div id="new_detail">
                        	<?php foreach($flashgame_detail as $nd)
							{
								echo $nd['new_content_detail'];
							}
							?>
                    	</div><!--#new_detail-->
                           
     
         			</div><!--#left-->
        		<div id="right"><?php $this->load->view("frontend/right"); ?></div><!--#right-->
           <div class="clear"></div>
           		<div id="footer">
           	 		<?php $this->load->view("frontend/footer"); ?>
            	</div><!--#footer-->
            
            </div><!--#wrapper-->
     
</body>
</html>
