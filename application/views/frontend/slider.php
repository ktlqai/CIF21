       <div id="featured">
       
     <?php
	 	foreach($slider_home as $sh)
		{
     ?>  
     	<img src="<?php echo $frontend_image;?>image-slider/<?php echo $sh['slider_image'];?>" data-caption="#<?php echo $sh['slider_id']?>" />
           	 <div id="featuredContent"></div> <!--Effect for the caption , nothing in it !-->
        <span class="orbit-caption" id="<?php echo $sh['slider_id']?>">
         	<p style="text-align:left; padding-left:5px; font-size:16px; color:#09F"><?php echo $sh['slider_title'];?></p>  
             <p style="text-align:left; padding-left:5px"><?php echo $sh['slider_content'];?>
             <div align="right">
             	<a href="<?php echo base_url();?>home/sliderdetail/<?php echo $sh['slider_id']?>">					              Xem thêm &nbsp;
                </a>
             </div>
             </p>   
        </span>
     <?php
		}//end: foreach()
     ?>     
		</div><!--#featured-->	

