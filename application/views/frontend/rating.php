  <?php foreach($rating_board as $rb)
				{?>
          			<div class="items">
                    	<div class="images">
                    <a href="<?php echo base_url(); ?>home/rating_item_detail/<?php echo $rb['rating_id']; ?>">    
           <img src="<?php echo $frontend_image;?>/image-new/<?php echo $rb['new_image']; ?>" title="<?php echo $rb['new_title'];?>" />
                    </a>   
                        </div><!--.images-->
                        <div class="content">
                    <a href="<?php echo base_url(); ?>home/rating_item_detail/<?php echo $rb['rating_id']; ?>">
                    	<b><?php echo $rb['new_title'];?></b>
                    </a> 
                    <br />
                     <div>
                     	<?php
							echo substr($rb['new_content'],0,30)."..."; // lay 1 phan` chuoi~ ra
                        ?>
                     </div>   
                        </div><!--.content-->
                    </div><!--#right_rating_board .items-->
              <?php
				}//end: foreach()
              ?>
              <div align="right">
              	<div style="width:90px; height:auto; -moz-border-radius-topleft:5px;-webkit-border-top-left-radius:5px;-moz-border-radius-topright:5px;-webkit-border-top-right-radius:5px; border:1px solid #CCC; margin-right:5px; text-align:center">
                 <a href="<?php echo base_url();?>home/rating">Xem toàn bộ</a>
             	 </div>
              </div>
































































