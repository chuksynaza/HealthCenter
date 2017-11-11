$(document).ready(function()
{
	var lastSeenMessage = 0;
	var currentView;

	 var play=setTimeout(function () {viewMessage(lastSeenMessage)}, 1000);

	 

	function viewMessage(lastSeenMessage) {
		var viewMessageFrm = 'lastmessage='+lastSeenMessage;
	    $.ajax({
		type: 'GET',
		url: 'app/view.php',
		dataType: 'json',
		data: viewMessageFrm,
		contentType: false,
		cache: false,
		processData: false,
		enctype: 'multipart/form-data',
		success: function (data)
		{
		

			if(data.status == 1)
			{
				$('.message-area').append(data.message);

				lastSeenMessage	= data.lastmessage;
				
				
var play=setTimeout(function () {viewMessage(lastSeenMessage)}, 1000);
}
else
{
	
	var play=setTimeout(function () {viewMessage(lastSeenMessage)}, 1000);
}

},
error: function()
{
	
	var play=setTimeout(function () {viewMessage(lastSeenMessage)}, 1000);
}
});
	}

$('.logform').on('submit', function(e)
{

var logdata = new FormData($('.logform')[0]);
	$.ajax({
		type: 'POST',
		url: 'app/login.php',
		data: logdata,
		 dataType : "html",
    contentType: "application/json; charset=utf-8",
		cache: false,
		processData: false,
		enctype: 'multipart/form-data',
		success: function (data)
		{
		

			if(data.status == 1)
			{
					
					window.location.href = 'index.php';
}
else
{
	$('.logform').append("<p class = 'text-danger'>Invalid Login</p>");
}

},
error: function()
{
	$('.logform').append("<p class = 'text-danger'>Network Error, Please Try Again</p>");
}
});

e.preventDefault();
});

$('.sendform').on('submit', function(e)
{
	var message = $('.sendform .message').val();

var senddata = new FormData($('.sendform')[0]);
	$.ajax({
		type: 'POST',
		url: 'app/send.php',
		dataType: 'json',
		data: senddata,
		contentType: false,
		cache: false,
		processData: false,
		enctype: 'multipart/form-data',
		success: function (data)
		{
		

			if(data.status == 1)
			{
					
					//$('.message-area').append("<div class = 'col-sm-2'></div><div class = 'col-sm-10'><div class='alert alert-info' role='alert'>"+ message + "</div></div>");
						$('.message').val('');
}
else
{
	
}

},
error: function()
{
	
}
});

e.preventDefault();
});



});