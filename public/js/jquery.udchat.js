function anonymousChat(chtid){
		$.get('anonymousChat/'+chtid, function(data){
				$('#loader').hide('fast', function(){
					$('#udchat-box').fadeIn(10000).html(data);
					$('#chat-sms-box').show();
					$('#btn-chat').attr("chatter", chtid);
				});		
		});	
}



$(document).ready(function(){
	//chat codes
	var chatter_id;


	$('#chat').on('click', function(){

		$('#udchat-box').html("");
		$('#chat-sms-box').hide();
		$('#loader').show('fast')
		chatter_id     = $(this).attr('chatterid');

		//route
		anonymousChat(chatter_id);
		setInterval(function(){anonymousChat(chatter_id)}, 5000);
	});



	$('#btn-chat').on('click', function(){

		var btn_input          = $('#btn-input').val();
		var chatter_id         = $(this).attr('chatter');
		var chat_messages      = $('.chat');
		$('#newXs').fadeIn(1500);
		$('#content-sms').text(btn_input);
		$('#btn-input').val('');
		$.post('anonymousMessage/'+ chatter_id, {message_content:btn_input}, function(data){
				$.get('anonymousChat/'+chatter_id, function(data){
				$('#loader').hide('fast', function(){
					$('#udchat-box').fadeIn(10000).html(data);
					$('#chat-sms-box').show();
					$('#btn-chat').attr("chatter", chatter_id);
				});		
		});
		});
	
	});
});
