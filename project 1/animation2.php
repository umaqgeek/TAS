<script src="jquery-2.1.3 (2).js"></script>

<script>

$(document).ready(function() {
	
	var c = 250;

	$("div").click(function() {
		$(this).height(250);
			$(this).css("background-repeat", "no-repeat");
			$(this).css("background-origin", "#FFF");
			for (i=0; i<30; i++){
				$(this).animate({opacity:1.0, marginTop:c-=5},100, function(){
					$(this).css("background-repeat", "no-repeat");
					$(this).css("background-origin", "#FFF");
					$(this).css("break-after");
				});
			//	$(this)<?php
			//	for ($i = 1; $i <= 30; $i++){
			//	echo ".animate({opacity:1.0, marginTop:c-=5},100, function(){
			//		$(this).css(\"background-image\", \"url('project/images/a".$i.".png')\");
			//	})";
			//	}
			//	?>;
			}
			if (i=30){
				$(this)<?php
					echo ".show().animate({opacity:1.0, marginTop:c-=5},100, function(){
					$(this).css(\"background-repeat\", \"no-repeat\");
					$(this).css(\"background-image\", \"url('project/images/boom.png')\");
				})";
			?>
			}
			if (i=30){
				$(this).animate({opacity:1.0, marginTop:c-=5},1, function(){
					$(this).css("background-repeat", "no-repeat");
					$(this).css("break-before");
				});
			}
			
	});
	
});

</script>
<body bgcolor="#999999">
<div><img src="project/image/giphy.gif" /></div>
</body>