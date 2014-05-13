<?php
        $messageCount=count($messageInfor);
?>
<ul class="chat">
                    <li id="newXs" class="right clearfix" style="display:none">
                                <a href="#" title="View My Full Profile">
                                    {{HTML::image('image/download.png','',array('height'=>'50','width'=>'50','class'=>'pull-right img-responsive img-circle'))}}
                                    
                                </a>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <strong class="pull-right primary-font">{{Auth::user()->nick_name}}</strong> 
                                        <small class="text-muted">
                                            <span class="glyphicon glyphicon-time"></span> just now 
                                        </small>
                                    </div>
                                    <p>
                                        <div>
                                            <span id="content-sms"></span> &nbsp&nbsp {{HTML::image("/image/load.gif")}}
                                        </div> 
                                        
                                    </p>
                                </div>
                    </li>

                    @if($messageCount>0)
                        
                        @for($message=0; $message < $messageCount; $message++)
                            <li listid="{{$message}}" class="{{($messageInfor[$message]->sender_id == Auth::user()->id)? 'right':'left'}} clearfix">
                                <a href="#" title="View My Full Profile">
                                    {{HTML::image('image/download.png','',array('height'=>'50','width'=>'50','class'=>(($messageInfor[$message]->sender_id == Auth::user()->id)? 'pull-right':'pull-left').' img-responsive img-circle'))}}
                                    
                                </a>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <strong class="{{($messageInfor[$message]->sender_id == Auth::user()->id)? 'pull-right':''}} primary-font">{{User::find($messageInfor[$message]->sender_id)->nick_name}}</strong> 
                                        <small class="{{($messageInfor[$message]->sender_id == Auth::user()->id)? '':'pull-right'}} text-muted">
                                            <span class="glyphicon glyphicon-time"></span> {{Date::convertTime($messageInfor[$message]->date_sent)}}
                                        </small>
                                    </div>
                                    <p>
                                       <div>
                                            {{ $messageInfor[$message]->message_content }}
                                        </div> 
                                    </p>
                                </div>
                            </li>

                        @endfor
                    @else
                        <div id="alrt" class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>No previous messages</strong>
                        </div>
                    @endif
</ul>