<script src="js/jquery-2.1.3 (2).js"></script>

<script>

$(document).ready(function() {
	

	$("table").click(function(){
		$(this).animate({
			marginLeft: "40px",
			
			fontSize: "3em",
			borderWidth: "10px",
		},1500, function(){
			$(this).animate({
				width: "10%",
				opacity: 1,
				marginLeft: "0.0in",
				fontSize: "1em",
				borderWidth: "1px",
			}, 100, function(){
				$(this).animate({
					width: "100%",
				}, 100, function(){
				});
			});
		})
		alert ('hihi');

	});
	
	$("p").hover(function(){
		$("table").css("margin-left", i--);
	});
    
});


</script>

<h1>
<table border="1">

<tr>
	<td>hahaha</td>
    <td>apalah</td>
</tr>
</table>

<table>
<tr>
	<td>hahaha</td>
    <td>apalah</td>
</tr>

</table>

</h1>

<p>come</p>