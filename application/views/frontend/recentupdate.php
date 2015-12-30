  <div class="title"><img src="<?php echo $frontend_image; ?>/image-stuff/moi-cap-nhat.jpg" /></div><!--#left .title-->
                    	<div class="recent_update_feature">
                     <?php foreach($data_1 as $frun)
					 {?>
                 <div class="images">
                 <a href="<?php echo base_url();?>home/newdetail/<?php echo $frun['new_id'];?>">       
             <img src="<?php echo $frontend_image; ?>/image-new/<?php echo $frun['new_image'];?>" width="340px" height="230px" />
             	</a>
                </div><!--.images-->
                            <div class="content">
                            <a href="<?php echo base_url();?>home/newdetail/<?php echo $frun['new_id'];?>">
                            	<h3><?php echo $frun['new_quote'];?></h3>
                           </a>   
                                <br />
                              <p><?php echo $frun['new_content'];?></p>
                            </div><!--.recent_update_feature .content-->
              <?php
					 }//end; foreach()
              ?>          
              </div><!--.recent_update_feature-->
              
                           <?php foreach($data as $run)
						{?>
                        <div class="recent_update_items">
                       <div class="images">
                       <a href="<?php echo base_url();?>home/newdetail/<?php echo $run['new_id'];?>">
                       		<img src="<?php echo $frontend_image; ?>/image-new/<?php echo $run['new_image'];?>" width="200px" height="130px" />
                       </a>
                       </div><!--.recent_update_items .images-->
                            <div class="content">
                            <h5>
                            	<a href="<?php echo base_url();?>home/newdetail/<?php echo $run['new_id'];?>">
							<?php echo $run['new_quote'];?>
                            	</a>
                            </h5>
                            	<br />
                            <p><?php echo $run['new_content'];?></p>
                            </div><!--.recent_update_items .content-->
                        </div><!--.recent_update_items-->
                      <?php
						}//end: foreach()
						
							echo '<div id="pagination">';
                	echo $this->pagination->create_links(); // tạo link phân trang trong thu vien pagination
                			echo '</div><!--#pagination-->';	
						
                        ?>	
                        