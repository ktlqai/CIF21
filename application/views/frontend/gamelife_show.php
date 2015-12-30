               <?php foreach($game_life as $g_l)
			   	{?>
                
 			 		<div class="container">
                    	<div class="images">
         <a href="<?php echo base_url();?>home/gamelife_detail/<?php echo $g_l['new_id']?>">               
        <img src="<?php echo $frontend_image;?>/image-new/<?php echo $g_l['new_image'];?>" />
        </a>
                        </div><!--#right_rating_video .images-->
                        <div class="content">
          <b><a href="<?php echo base_url();?>home/gamelife_detail/<?php echo $g_l['new_id']?>">
                        <?php echo substr($g_l['new_title'],0,25)."...";?>
              </a></b>
                        <br />
                        <br />
                         <?php echo substr($g_l['new_quote'],0,130)."...";?>
                        </div><!--#right_rating_video .content-->
                    </div><!--#right_rating_video .container-->
                   
                <?php
				}//end:forwach()
                ?>    
                    <div align="right">    
                    <div style=" width:90px;-moz-border-radius-topleft:5px;-webkit-border-top-left-radius:5px;-moz-border-radius-topright:5px;-webkit-border-top-right-radius:5px; border:1px solid #CCC; margin-right:5px">
                    	<a href="<?php echo base_url();?>home/gamelife">Xem toàn bộ</a>
                    </div><!--style=...-->
                   </div><!--align = right--> 