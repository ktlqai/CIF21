 	<div id="right_search">
                	<div class="items_search" style="background:#FFF">
                    	<div style="margin:7px;"></div>
               <form action="<?php echo base_url();?>home/search" method="get" name="search">         
         &nbsp;&nbsp;<input type="text" name="txtTimKiem" id="txtTimKiem" size="33" onfocus="if(this.value == 'Nhập từ khóa cần tìm kiếm...') this.value = '';" onblur="if(this.value == '') this.value = 'Nhập từ khóa cần tìm kiếm...';" value="Nhập từ khóa cần tìm kiếm..." onclick="this.value = ''"/>
                    </div>
                    <div class="button_search" style="background:#FFF">
                <input type="submit" name="txtSearch" id="txtSearch" class="button_1" value="Tìm" style="width:50px; height:34px" />         
                    </div><!--.button_search-->
                   </form> 
                </div><!--#right_search-->
           		     
                <div class="right_title">
                	<img src="<?php echo $frontend_image; ?>/image-stuff/diem-tin-game2.jpg" />
                </div><!--.right_title-->
                
                <div id="right_rating_board">
              <?php
			  	$this->load->view("frontend/rating");
              ?>
              	</div><!--#right_rating_board-->
                
                <div id="right_ads">
                <a href="#"><img src="<?php echo $frontend_image;?>/image-stuff/quangcao2.png" width="299px" height="99px" />
                </a>
                </div><!--#right_ads-->
              <div class="right_title">
                	<img src="<?php echo $frontend_image; ?>/image-stuff/game-doi-song.jpg" />
                </div><!--.right_title-->    
                <div id="right_rating_video">
               
					<?php $this->load->view("frontend/gamelife_show");?>
                    
                </div><!--#right_rating_video-->
                
                <div id="right_game_life">
         <embed src="<?php echo $frontend_flash; ?>/quangcao3.swf" quality="high" type="application/x-shockwave-flash" wmode="transparent" width="300" height="181" pluginspage="http://www.macromedia.com/go/getflashplayer" allowScriptAccess="always"></embed>  
                </div><!--#right_game_life-->
       