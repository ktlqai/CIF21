	<?php foreach($rating_board_show_data as $rbsd)
								{
							?>
                        <div id="rating_board_show">
                        	<div class="left">
                            	<div class="number"><b><?php echo $rbsd['rating_id'];?></b></div>
                                <img src="<?php echo $frontend_image; ?>/image-new/<?php echo $rbsd['new_image'];?>" />
                            </div><!--#rating_board_show .left-->
                            <div class="right" style="height:auto">
                            	<div style="margin-bottom:5px; color:#09F;"><b><?php echo $rbsd['new_quote'];?></b></div>
                                <div style="margin-bottom:5px;">Thể loại :<?php echo $rbsd['type_name'];?></div>
                                <div style="margin-bottom:5px;">Đánh giá :<?php echo $rbsd['rating_number'];?>/10</div>
                              <p>
							  	<?php echo $rbsd['new_content'];?>
                              </p>
                            </div><!--rating_board_show .right-->
                               <div align="left">
                              	<a href="<?php echo base_url();?>home/newdetail/<?php echo $rbsd['new_id_rating'];?>" class="button_1" style="width:177px; margin-top:10px; margin-left:5px; margin-bottom:5px; background:#09F;">Xem chi tiết</a>
                              </div>
                        </div><!--#rating_board_show-->
                        
                      <?php
								}//end: foreach()
					  ?>  