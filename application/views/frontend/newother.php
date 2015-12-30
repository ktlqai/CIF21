                	&nbsp;&raquo;&nbsp;<b>Các tin tức khác</b>
                    <?php
						foreach($other_new as $on)
						{?>
							<div style="margin-top:5px;"></div>
                            <a href="<?php echo base_url(); ?>home/newdetail/<?php echo $on['new_id']; ?>">
							<img src="<?php echo $frontend_image; ?>image-stuff/icon-arrow.png" />
							<?php echo $on['new_title'] ."&nbsp;"."(".$on['new_day'].")"; ?>
                            </a>
							<div style="border:1px dotted #CCC"></div>
						
                        <?php
						}//end foreach()
                        ?>