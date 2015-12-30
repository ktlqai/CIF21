                       
                       <?php foreach($new_home as $nh)
					   		{?> 	
                            <div class="left_new_item">
                  				<div class="left_new_item_image">
                       <a href="<?php echo base_url(); ?>home/newdetail/<?php echo $nh['new_id']; ?>">         
                  	<img src="<?php echo $frontend_image; ?>/image-new/<?php echo $nh['new_image']; ?>"
                    title="<?php echo $nh['new_quote']; ?>" width="150px" height="100px" />
                       </a>
                  				</div><!--.left_new_item_image-->
                                	<div class="left_new_item_content">
                                		<h4>
                           <a href="<?php echo base_url();?>home/newdetail/<?php echo $nh['new_id']?>"><?php echo $nh['new_quote']; ?></a>
                                        </h4>
                                    	<p><?php echo substr($nh['new_content'],0,200)."..."; ?></p>
                                    		<div class="detail">
                                    			Thể loại : <?php echo $nh['type_name'];?> | Ngày đăng : <?php echo $nh['new_day'];?> 
                                    		</div><!--.left_new_item_content .detail-->
                                	</div><!--.left_new_item_content-->
                        	</div><!--.left_new_item-->
                            	<div style="margin-top:5px"></div>
                            		<hr style="border:1px inset #CCC;" />
                            	<div style="margin-bottom:5px"></div>
                                
                              <?php
							}//end : foreach()
                              ?>  