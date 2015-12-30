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
<script type="text/javascript" src="<?php echo $path_js;?>jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="<?php echo $path_js;?>js-slider.js"></script>
<!--end Js file here-->

</head>

<body>
			<div class="wrapper_menu">
		<div class="container">
       	 	<?php $this->load->view("frontend/menu");?>
        </div><!--.container-->
     		</div><!--.wrapper_menu-->
            
     <div class="clear"></div><!--.clear-->
     		
            <div id="wrapper">
            		<div id="left">
                    	<?php $this->load->view("frontend/$content");?>
                    </div><!--#left-->
        
        		<div id="right"><?php $this->load->view("frontend/right"); ?></div><!--#right-->
           <div class="clear"></div>
           		<div id="footer">
           	 		<?php $this->load->view("frontend/footer"); ?>
            	</div><!--#footer-->
            
            </div><!--#wrapper-->
     
</body>
</html>
































































