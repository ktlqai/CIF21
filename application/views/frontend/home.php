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
<title>Blue Game | Wellcome To Home Page</title>

<!--start Css file here-->
<link rel="stylesheet" type="text/css" href="<?php echo $path_css; ?>style.css" />
<!--end Css file here-->

<!--start Js file here-->

		<script src="<?php echo $path_js; ?>jquery-1.5.1.min.js"></script>
		<script src="<?php echo $path_js; ?>jquery.orbit-1.2.3.js"></script>

<!--end Js file here-->
<!--JS  SLIDER-->  
<script type="text/javascript">
			$(window).load(function() {
				$('#featured').orbit({
					
	 animation: 'fade',    // fade, horizontal-slide, vertical-slide, horizontal-push
     animationSpeed: 1000,                // how fast animtions are
     timer: true, 			 // true or false to have the timer at the top right of slide-show
     advanceSpeed: 6000, 		 // if timer is enabled, time between transitions 
     pauseOnHover: false, 		 // if you hover pauses the slider
     startClockOnMouseOut: false, 	 // if clock should start on MouseOut
     startClockOnMouseOutAfter: 1000, 	 // how long after MouseOut should the timer start again
     directionalNav: true, 		 // manual advancing directional navs
     captions: true, 			 // do you want captions?
     captionAnimation: 'slideOpen', 		 // fade, slideOpen, none
     captionAnimationSpeed: 900, 	 // if so how quickly should they animate in
     bullets: false,			 // true or false to activate the bullet navigation
     bulletThumbs: true,		 // thumbnails for the bullets
     bulletThumbLocation: '',		 // location from this file where thumbs will be
     afterSlideChange: function(){} 	 // empty function 
					
					});
			});
</script>      
<script type='text/javascript'>
   $(window).load(function() {
       $('#featuredContent').orbit({ fluid: '16x6' });
   });
</script>       
<!-- END JS  SLIDER-->

<!--JS  AUTO CLOCK-->
<script type="text/javascript" src="<?php echo $path_js?>dongho.js"></script>   
<!-- END JS  AUTO CLOCK--> 

<!--JS  PAGE TOP-->
<script type="text/javascript" src="<?php echo $path_js?>jquery.min.js"></script>   
<script type="text/javascript" src="<?php echo $path_js?>up.js"></script>   
<!-- END JS  PAGE TOP-->  

</head>

<body>
		
		<div id="banner">
			<div align="right" class="dongho" style="background:#FFF">
            <img src="<?php echo $frontend_image;?>image-stuff/banner-home.jpg" width="1030px" height="50px" />
            	<span id="tick2"></span><!--span for show clock-->
                
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
                
            </div><!--.dongho-->
         </div><!--#banner-->    
  
            <div class="clear"></div><!--.clear-->

            
     <div class="clear"></div><!--.clear-->
     
     	<div id="wrapper_round">	
            <div id="wrapper">
    
            <div class="wrapper_menu">
		<div class="container">
       	 	<?php $this->load->view("frontend/menu");?>
        </div><!--.container-->
         
     		</div><!--.wrapper_menu-->
         	<div class="clear"></div><!--.clear-->	  
            
            		<div id="left">
         <div class="title"><img src="<?php echo $frontend_image; ?>/image-stuff/game-noi-bat.jpg" /></div><!--#left .title-->
        	<div id="slider_container"><?php $this->load->view("frontend/slider");?></div><!--#slider_container-->
            	<div id="recent_left">
                	<div class="title"><img src="<?php echo $frontend_image; ?>/image-stuff/moi-cap-nhat.jpg" /></div><!--#left .title-->
                    	<?php $this->load->view("frontend/recentnew");?>
                	</div><!--#recent_left-->
                	<div id="left_news">
                     <div class="title"><img src="<?php echo $frontend_image; ?>/image-stuff/tin-tuc.jpg" /></div><!--#left .title-->
                            <?php $this->load->view("frontend/news");?>
                    </div><!--#left_news-->
                    
                    <div id="left_ads">
                 <a href="#">   
           <img src="<?php echo $frontend_image;?>/image-stuff/quangcao6.gif" />
             	</a>
                    </div><!--#left_ads-->
        </div><!--#left-->
        
        		<div id="right"><?php $this->load->view("frontend/right"); ?></div><!--#right-->
           <div class="clear"></div><!--.clear-->
           
            
            </div><!--#wrapper-->
            </a>
            
            <?php
				include_once("pagetop.php");//localhost/CIF2/application/views/pagetop.php
            ?>     
            </div>
            
            <?php include_once("fblikebox.php");?>
            
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
