<?php
	//Css file path :
		$path_css=base_url().'public/backend/css/';
	//Js file path :
		$path_js=base_url().'public/backend/js/';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Home Page</title>

<!--start Css file here-->
<link rel="stylesheet" type="text/css" href="<?php echo $path_css; ?>style.css" />
<!--end Css file here-->
</head>

<body bgcolor="#000000">
	<div id="wrapper" style="height:auto;">
    		<div class="banner">
      <img src="<?php echo $backend_image;?>banner-home2.jpg" />
        	</div><!--.banner-->
       <?php
	   		if($this->session->userdata('logged_in') == true && $this->session->userdata('user_level') == 1)
			{ //--> Have logged in and admin
       ?>
       
        <div align="right" style="background:#000">Hello,&nbsp;<?php echo $this->session->userdata('user_name');?>&nbsp;&nbsp;[<a href="<?php echo base_url();?>admin/do_logout_2">Đăng xuất</a>]
        </div>
        <?php
			}//end if()
			else redirect('home');
        ?>
        
        
        <div class="clear"></div><!--.clear-->
        	<div id="container_index" >
            <table width="1030px" cellspacing="4" cellpadding="4">
            <tr>
            	<td bgcolor="#0099CC">
        <a href="<?php echo base_url();?>admin/slider_manager">        
             <img src="<?php echo $backend_image;?>slider-mana1.jpg" title="Slider Manager" width="515px" height="200px" /> 
        </a>     
                </td>
           
                <td bgcolor="#CC0000">
        <a href="<?php echo base_url();?>admin/menu_manager">          
         <img src="<?php echo $backend_image;?>menu-mana1.jpg" title="Menu Manager" width="505px" height="200px" /> 
        </a>
                </td>
            </tr>
            <tr>
            	<td colspan="2" bgcolor="#33CC00">
       <a href="<?php echo base_url();?>admin/new_manager">          
          <img src="<?php echo $backend_image;?>new-mana1.jpg" title="News Manager" width="1024px" height="200px"  />  
        </a>     
                </td>
            </tr>
            <tr>
            	<td bgcolor="#FF0033">
         <a href="<?php echo base_url();?>admin/gallery_manager">        
                    <img src="<?php echo $backend_image;?>gallery-mana1.jpg" title="Gallery Manager" />
          </a>
                </td>
                <td bgcolor="#FF0099">
                
             <a href="<?php echo base_url();?>admin/flashgame_manager">   
                     <img src="<?php echo $backend_image;?>game-mana1.jpg" title="Flash Game Manager" width="505px" height="200px" />
                     </a>     
                </td>
            </tr>
            	<tr>
                	<td colspan="2">
              <a href="<?php echo base_url();?>admin/user_manager">        
                	          <img src="<?php echo $backend_image;?>user-mana1.jpg" title="Users Manager" width="1024px" height="200px"  />
               </a>               
                     </td>  
                </tr>
            </table>
        	</div><!--#container_index-->
    </div><!--#wrapper-->

</body>
</html>