						<div id="recent_left_item">
                        <?php foreach($recent_new as $rc)
							{?>
                        		<div class="items">
                           			<div class="images">
             <a href="<?php echo base_url();?>home/newdetail/<?php echo $rc['new_id']; ?>">         
                           <img src="<?php echo $frontend_image; ?>/image-new/<?php echo $rc['new_image']; ?>" width="175px" height="126px" />
                           </a>
                                    </div><!--#recent_left_item .items .images-->
                            		<div class="title"><?php echo $rc['new_title']; ?></div><!--#recent_left_item .items .title-->
                            </div><!--#recent_left_item .items-->
                        <?php
							}//end: foreach()
                        ?>
						</div><!--#recent_left_item-->