     	    	       
                        <div class="left">
                   <img src="<?php echo base_url();?>public/images/avatar.gif" width="100px" height="100px" />
                   		</div><!--#comment_board .left-->
                        	<div class="right">
            <form action="<?php echo base_url();?>home/newdetail/<?php echo $this->uri->segment(3);?>" method="post" name="xulycomment">    
                            <!--
                            <table width="auto" cellspacing="5">
                            	<tr>
                                	<td><label>Họ và tên</label></td>
                                    <td><input type="text" name="txtHoTen" id="txtHoTen" /></td>
                                </tr>
                                <tr>
                                	<td><label>E-mail</label></td>
                                    <td><input type="text" name="txtEmail" id="txtEmail" /></td>
                                </tr>
                            </table>
                           -->
                            <textarea name="txtcomment" id="txtcomment" cols="73" rows="8"></textarea>
                        	</div><!--#comment_board .right-->
                        <div class="clear"></div>
                     <div align="right" style="margin-right:5px; margin-top:5px;">
               <input type="submit" name="submit" value="Comment" onclick="CheckComment(this.form)" class="button_1" style="width:100px; height:auto;" />
                     </div><!--#comment_board .right-->
            </form>   