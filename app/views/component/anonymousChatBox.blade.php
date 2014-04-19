<div class="panel-group" id="accordion">
    <div class="panel panel-default {{(count(Session::get('anonyUsers'))>9)? 'chat-panel':''}}">
        <div class="panel-heading row">
            <div class="input-group col-lg-5">
                <input type="text" placeholder="Search..." class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div><!-- /input-group -->
            <div class="col-lg-offset-4 col-lg-3">
                <button type="button" class="btn btn-success btn-block" data-parent="#accordion" data-toggle="collapse" data-target="#female">
                    {{count(Session::get('anonyUsers'))}} <srong>Users Online</srong> <i class="fa fa-users"></i> 
                </button>
            </div>
        </div>
        <div id="female" class="panel-collapse collapse in">
            <div class="panel-body">
                <ul class="chat row">
                    @if(count(Session::get('anonyUsers'))>0)
                        @foreach (Session::get('anonyUsers') as $anonyUser)
                                <li class="left clearfix col-lg-4">
                                    <a href="#" title="View My Full Profile">
                                        {{HTML::image('image/download.png','',array('height'=>'80','width'=>'80','class'=>'img-responsive pull-left img-circle'))}}
                                    </a>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">&nbsp;&nbsp;&nbsp;<i class="fa fa-male"></i> {{Str::limit($anonyUser->nick_name,10,'...')}}</strong><br>
                                            &nbsp;&nbsp;
                                            <!-- ChatBox trigger modal -->
                                            <a href="{{URL::to("user/anonymousChat/".$anonyUser->id)}}" style="text-decoration: none;">
                                                <button class="btn btn-success" >
                                                    Chat
                                                </button><br>&nbsp;&nbsp;
                                            </a> 
                                            <small class="text-muted">
                                                <span class="glyphicon glyphicon-time"></span>{{Date::convertTime($anonyUser->login)}}
                                            </small>
                                        </div>
                                    </div>
                                </li>
                        @endforeach
                    @else
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>No Users online</strong>
                        </div>
                    @endif
                </ul>
            </div>
            <div class="panel-footer row">
                <div class="input-group col-lg-4 col-lg-offset-4">
                    <select class="form-control">
                        <option disabled selected>Arrage By...</option>
                        <option>Gender</option>
                        <option>Age</option>
                        <option>Most Chats</option>
                        <option>Who is online</option>
                    </select>
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-refresh"></span></button>
                    </span>
                </div><!-- /input-group -->
            </div>
        </div>
    </div>
</div>

<!--Chat Box Modal -->
<?php
    $messagaeInfor=Session::get("messageInfor");
    $messageCount=count($messagaeInfor);
?>
<div class="modal fade" id="chatModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content panel panel-default custom-panel {{($messageCount>5)? 'chat-panel':''}}">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">
                    <a href="#" style="text-decoration: none;">
                        @if(Session::has('global'))
                        {{User::find(Session::get('global'))->nick_name}}
                        @endif
                        <sup><i class="fa fa-comments"></i></sup>
                    </a>
                </h4>
            </div>
            <div class="modal-body panel-body">
                <ul class="chat">
                    @if($messageCount>0)
                        @for($message=0; $message < $messageCount; $message++)
                            <li class="{{($messagaeInfor[$message]->sender_id == Auth::user()->id)? 'right':'left'}} clearfix">
                                <a href="#" title="View My Full Profile">
                                    {{HTML::image('image/download.png','',array('height'=>'50','width'=>'50','class'=>(($messagaeInfor[$message]->sender_id == Auth::user()->id)? 'pull-right':'pull-left').' img-responsive img-circle'))}}
                                    
                                </a>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <strong class="{{($messagaeInfor[$message]->sender_id == Auth::user()->id)? 'pull-right':''}} primary-font">{{User::find($messagaeInfor[$message]->sender_id)->nick_name}}</strong> 
                                        <small class="{{($messagaeInfor[$message]->sender_id == Auth::user()->id)? '':'pull-right'}} text-muted">
                                            <span class="glyphicon glyphicon-time"></span> {{Date::convertTime($messagaeInfor[$message]->date_sent)}}
                                        </small>
                                    </div>
                                    <p>
                                       <div>
                                            {{ $messagaeInfor[$message]->message_content }}
                                        </div> 
                                    </p>
                                </div>
                            </li>
                        @endfor
                    @else
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>No previous messages</strong>
                        </div>
                    @endif
                </ul>
            </div>
            <div class="panel-footer">
                {{ Form::open(array('url' => "user/anonymousMessage/".Session::get('global'),'class'=>'form')) }}
                <div class="input-group">
                    <input id="btn-input" required="" type="text" name="message_content" class="form-control input-sm" placeholder="Type your message here..." />
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-warning btn-sm" id="btn-chat">
                            <span class="glyphicon glyphicon-send"></span>
                        </button>
                    </span>
                </div>
                {{ Form::close() }}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->