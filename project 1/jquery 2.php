<script src="js/jquery-2.1.3 (2).js"></script>

<script>

$(document).ready(function() {

$("div").click(function(){
	$(this).animate({
	marginLeft: "500"
}).animate({
	marginLeft:"0",
	marginTop: "500"
}, 1000).animate({
	marginLeft: "500",
	marginTop: "500"
}, 500).animate({
	marginTop: "0",
	marginLeft: "500"
}, 200);

})
});

</script>

<div style="height:500; width:500; background-color:#093"></div>