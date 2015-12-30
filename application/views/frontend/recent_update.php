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
            		<div id="left" style="height:auto; box-shadow: 0 1px 5px rgba(0, 0, 0, 0.46); background: #eeeeee; /* Old browsers */
background: -moz-linear-gradient(top,  #eeeeee 0%, #cccccc 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#eeeeee), color-stop(100%,#cccccc)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #eeeeee 0%,#cccccc 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #eeeeee 0%,#cccccc 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #eeeeee 0%,#cccccc 100%); /* IE10+ */
background: linear-gradient(to bottom,  #eeeeee 0%,#cccccc 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#eeeeee', endColorstr='#cccccc',GradientType=0 ); /* IE6-9 */
">
                <?php $this->load->view("frontend/recentupdate"); ?>
                
                <div id="news_other">
					<?php $this->load->view("frontend/newother"); ?>
                </div><!--#news_other-->
                                
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