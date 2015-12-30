<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<!--
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
-->
</head>

<style>
	#sidePanel{
    width:245px;
    position:fixed;
    left:-202px;
    top:15%;
	z-index:9999;
    
}
#panelHandle{
    background-image: -webkit-linear-gradient(top,#333,#222);
    background-image: -moz-linear-gradient(center top , #333333, #222222);
    background-image: -o-linear-gradient(center top , #333333, #222222);
    background-image: -ms-linear-gradient(center top , #333333, #222222);
    background-image:linear-gradient(center top , #333333, #222222);

    height:150px;
    width:40px;
    border-radius:0 5px 5px 0;
    float:left;
    cursor:pointer;
}
#panelContent{
    float:left;
    border:1px solid #333333;
    width:200px;
    height:148px;
    background-color:#FFF;
}
#panelContent a{
	color:#FFF;
	text-decoration:none;
}

#panelHandle p {
    -moz-transform: rotate(90deg);
    -webkit-transform: rotate(90deg);
    color: #FFFFFF;
    font-size: 23px;
    font-weight: bold;
    left: -4px;
    margin: 0;
    padding: 0;
    position: relative;
    top: 26px;
}
</style>
<body>
<script type="text/javascript">
	jQuery(function($) {
    $(document).ready(function() {
        $('#panelHandle').hover(function() {
            $('#sidePanel').stop(true, false).animate({
                'left': '0px'
            }, 900);
        }, function() {
            jQuery.noConflict();// tránh xung đột nhiều thư viện jQuery với nhau
        });

        $('#sidePanel').hover(function() {
            // Do nothing
        }, function() {

            jQuery.noConflict();// tránh xung đột nhiều thư viện jQuery với nhau
            $('#sidePanel').animate({
                left: '-201px'
            }, 800);

        });
    });
});
</script>
<div id="sidePanel">
        <div id="panelContent">        
       <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2FWebsTutorial&amp;width=200&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=false&amp;appId=253401284678598" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:200px; height:258px;" allowTransparency="true"></iframe>  
        </div>
        <div id="panelHandle"><p>Like&nbsp;us&nbsp;now</p></div>
        
      </div>
</body>
</html>