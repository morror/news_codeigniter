<a id='moreButton' class='a_demo_two' href="#">get more news</a>
<script>
	$('#moreButton').click(function(event){
		event.preventDefault();
		var url = "<?php echo $this->input->server('url').'/news/'?>";
		url = url + $('.news').length;
		$.ajax({
					url: url,
					type: "POST",
					data: {
						ajax: "true"
					},
					success : function(data) {
						console.log(data);
						$('#moreButton').before(data);
					}
				});
		
		
	});
</script>