	<ul class="menu" rel="sam1">
<?php foreach($menu_top_home as $mth){ ?>
	<li class="active">
    	<a href="<?php echo base_url().'home/'.$mth['menu_link'] ;?>"><?php echo $mth['menu_name'];?></a>
    </li>
<?php
	}//end : foreach (menu - home)
?>
	<?php foreach($menu_top_items as $mti){ ?>
    <li>
    	<a href="<?php echo base_url().'home/'.$mti['menu_link'] ;?>"><?php echo $mti['menu_name'];?></a> <!--Chu y doan nay !! -->
    </li>
<?php
	}//end : foreach ( menu - items )
?>
	</ul>