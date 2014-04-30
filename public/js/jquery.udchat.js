function anonymousChat(chtid, chattername){
                $('#chatter_name').text("");
		$.get('anonymousChat/'+chtid, function(data){
				$('#loader').hide('fast', function(){
                                        $('#chatter_name').text(chattername);
					$('#udchat-box').fadeIn(10000).html(data);
					$('#chat-sms-box').show();
					$('#btn-chat').attr("chatter", chtid);
				});		
		});	
}



$(document).ready(function(){
	//chat codes
	var chatter_id;
        

	$('.cht').on('click', function(){

		$('#udchat-box').html("");
		$('#chat-sms-box').hide();
		$('#loader').show('fast')
		chatter_id     = $(this).attr('chatterid');
                var chatter_name     = $(this).attr('chattername');
                
		//route
		anonymousChat(chatter_id, chatter_name);
		setInterval(function(){anonymousChat(chatter_id, chatter_name)}, 5000);
	});

        if(document.layers){
            document.captureEvents(Event.KEYDOWN);
        }
        
        document.onkeydown = function(evt){
            var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
            if(keyCode == 13) {
                var btn_input          = $('#btn-input').val();
                var chatter_id         = $('#btn-input').parent().find("#btn-chat").attr('chatter');
                 var chatter_name      = $('#btn-input').parent().find("#btn-chat").attr('chattername');
                var chat_messages      = $('.chat');
		$('#newXs').fadeIn(1500);
		$('#content-sms').text(btn_input);
		$('#btn-input').val('');
		$.post('anonymousMessage/'+ chatter_id, {message_content:btn_input}, function(data){
                                 $('#chatter_name').text(chatter_name);
				$.get('anonymousChat/'+chatter_id, function(data){
				$('#loader').hide('fast', function(){
					$('#udchat-box').fadeIn(10000).html(data);
					$('#chat-sms-box').show();
					$('#btn-chat').attr("chatter", chatter_id);
				});		
		});
		});
            }
        }

	$('#btn-chat').on('click', function(){

		var btn_input          = $('#btn-input').val();
		var chatter_id         = $(this).attr('chatter');
                var chattername       = $(this).attr('chattername');
		var chat_messages      = $('.chat');
		$('#newXs').fadeIn(1500);
		$('#content-sms').text(btn_input);
		$('#btn-input').val('');
		$.post('anonymousMessage/'+ chatter_id, {message_content:btn_input}, function(data){
                                $('#chatter_name').text(chattername);
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
