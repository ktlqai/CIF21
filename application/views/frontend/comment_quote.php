                           <?php 
						   foreach($data_comment_with_new as $dcwn)
						   {?>
                           <div class="left">
                   <img src="<?php echo base_url();?>public/images/avatar.gif" width="100px" height="100px" />
                   			   </div><!--#comment_quote .left-->
                           <div class="right">
                           		<div style="background:#CCC; margin-bottom:20px;">Đăng bởi <b><?php echo $dcwn['user_name'];?></b>, vào ngày <?php echo $dcwn['comment_day'];?></div>
                                <div class="clear"></div>
                                <?php echo $dcwn['comment_content'];?>    	
                           </div><!--#comment_quote .right-->
							<div class="clear"></div>
                            <div style="margin-top:5px"></div>
                         	<hr color="#000000" />
                      <?php
						   }//end: foreach();
					  ?>    