<script src="jquery-2.1.3 (2).js"></script>

<script>

$(document).ready(function() {


	$("div").click(function() {
		$(this).height(250);
			$(this).css("background-repeat", "no-repeat");
			$(this).css("background-origin", "#FFF");
			$(this).width(1280);
			$(this).height(780);
			for (i=0; i<35; i++){
				$(this).animate({opacity:1.0, paddingLeft:550},100, function(){
					$(this).css("background-repeat", "no-repeat");
					$(this).css("background-origin", "#FFF");
				});
				$(this)<?php
				for ($i = 1; $i <= 35; $i++){
				echo ".animate({opacity:1.0, paddingLeft:550},100, function(){
					$(this).css(\"background-image\", \"url('project/images/b".$i.".png')\");
				})";
				}
				?>;
			}
	});
});
</script>
<body background="project/images/bg.jpg" style="background-repeat:no-repeat !important">
<div><img src="project/image/giphy.gif" /></div>
</body>