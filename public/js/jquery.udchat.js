 var list_id = 0;

function anonymousChat(chtid){
                         
		$.get('anonymousChat/'+chtid, function(data){
				$('#loader').hide('fast', function(){
                                        
					$('#udchat-box').html(data);
					$('#chat-sms-box').show();
					$('#btn-chat').attr("chatter", chtid);
                                        
                                        var new_list_id = $("#udchat-box li:last").attr('listid');
                                        console.log(list_id);
                                        console.log(new_list_id);
                                        if(list_id != new_list_id ){
                                            $("#udchat-box li:last").hide().fadeIn(2000 );
                                            list_id = new_list_id;
                                        }
                                        
				});		
		});	
}



$(document).ready(function(){
	//chat codes
	var chatter_id;
        

	$('.cht').on('click', function(){
                
                $('#chatter_name').text("");
		$('#udchat-box').html("");
		$('#chat-sms-box').hide();
		$('#loader').show('fast')
		chatter_id           = $(this).attr('chatterid');
                var chatter_name     = $(this).attr('chattername');
                $('#chatter_name').text(chatter_name);
       
		//route
		anonymousChat(chatter_id);
		setInterval(function(){anonymousChat(chatter_id)}, 5000);
	});

        if(document.layers){
            document.captureEvents(Event.KEYDOWN);
        }
        
        document.onkeydown = function(evt){
            var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
            if(keyCode == 13) {
                var btn_input          = $('#btn-input').val();
                var chatter_id         = $('#btn-input').parent().find("#btn-chat").attr('chatter');
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
            }
        }
        
        $('#btn-input').on('focus', function(){
            $('#alrt').hide();
        });
        
        $('#btn-input').on('keyup', function(){
            $('#alrt').hide();
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
