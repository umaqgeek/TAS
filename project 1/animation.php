<script src="js/jquery-2.1.3 (2).js"></script>


<script>

$(document).ready(function() {
	
	var c = 0;

	$("div").click(function() {
			$(this).css("background-repeat", "no-repeat");
			$(this).css("background-color", "#FFF");
			for (i=0; i<50; i++){
				$(this)<?php
				for ($i = 1; $i <= 8; $i++){
				echo ".animate({opacity:1.0, marginLeft:c+=10},100, function(){
					$(this).css(\"background-image\", \"url('pic/images/a".$i.".jpg')\");
				})";
				}
				?>;
			}
	});
});
</script>

<div style="height:500; width:500; background-color:#093"></div>