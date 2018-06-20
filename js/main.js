$(function(){
	var $name = $('#name');

	$('#signup').on('click',function(){

		var order = {
			name: $name.val()
		};

		$.ajax({
			type: 'POST',
			url: 'http://localhost/skilrock/api/post/create.php',
			data: order,
			success: function(){
				alert("Data inserted in Database!");
			}
			error: function()
			{
				alert("Data not inserted!!");
			}
		});

	});
});