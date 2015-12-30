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
            		<div id="left">
               	
                	 	
                     <div class="title"><img src="<?php echo $frontend_image; ?>/image-stuff/thu-vien-hinh-anh.jpg" /></div><!--#left .title-->
                    	<div class="recent_update_feature">
                     <?php foreach($data_gallery_1 as $d_g_1)
					 {?>
                 <div class="images">
                 <a href="<?php echo base_url();?>home/gallery_detail/<?php echo $d_g_1['gallery_id'];?>">       
             <img src="<?php echo $frontend_image; ?>/image-gallery/<?php echo $d_g_1['gallery_image'];?>" width="340px" height="230px" />
             	</a>
                </div><!--.images-->
                            <div class="content">
                            <a href="<?php echo base_url();?>home/gallery_detail/<?php echo $d_g_1['gallery_id'];?>">
                            	<h3><?php echo $d_g_1['gallery_name'];?></h3>
                           </a>   
                                <br />
                              <p><?php echo $d_g_1['gallery_quote'];?></p>
                            </div><!--.recent_update_feature .content-->
              <?php
					 }//end; foreach()
              ?>          
              </div><!--.recent_update_feature-->
                                    
                	<?php foreach($data_gallery_2 as $d_g_l_2)
						{?>
                        <div class="recent_update_items">
                       <div class="images">
                       <a href="<?php echo base_url();?>home/gallery_detail/<?php echo $d_g_l_2['gallery_id'];?>">
                    <img src="<?php echo $frontend_image; ?>/image-gallery/<?php echo $d_g_l_2['gallery_image'];?>" width="200px" height="130px" />
                       </a>
                       </div><!--.recent_update_items .images-->
                            <div class="content">
                            <h5>
                            	<a href="<?php echo base_url();?>home/gallery_detail/<?php echo $d_g_l_2['gallery_id'];?>">
							<?php echo $d_g_l_2['gallery_name'];?>
                            	</a>
                            </h5>
                            	<br />
                            <p><?php echo $d_g_l_2['gallery_quote'];?></p>
                            </div><!--.recent_update_items .content-->
                        </div><!--.recent_update_items-->
                      <?php
						}//end: foreach()
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







