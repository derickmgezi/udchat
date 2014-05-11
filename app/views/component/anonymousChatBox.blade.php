<<<<<<< HEAD
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
                                            <button class="btn btn-success cht" data-toggle="modal" data-target="#chatModal"  chatterid="{{$anonyUser->id}}" chattername="{{$anonyUser->nick_name}}" >
                                                    Chat
                                                </button><br>&nbsp;&nbsp;

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
        <div class="modal-content panel panel-default custom-panel chat-panel {{($messageCount>5)? '':''}}">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">
                    <a href="#" style="text-decoration: none;">
                        <sup><i class="fa fa-comments"></i></sup>
                        <span id="chatter_name"></span><span id="typing"></span>
                    </a>
                </h4>
            </div>
            <div class="modal-body panel-body">
                <center>
                    <p id="loader" style="display:none"> {{HTML::image("/image/load.gif")}} </p>
                </center>
                <div id="udchat-box">

                </div>    
            </div>
            <div class="panel-footer" style="display:none" id="chat-sms-box" >
                <div class="input-group">
                    <input id="btn-input" required="" type="text" name="message_content" class="form-control input-sm" placeholder="Type your message here..." />
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-warning btn-sm" id="btn-chat" chatter="">
                            <span class="glyphicon glyphicon-send"></span>
                        </button>
                    </span>
                </div>
                {{ Form::close() }}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
=======
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
                <button type="button" class="btn btn-default btn-block" data-parent="#accordion" data-toggle="collapse" data-target="#female">
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
                                            <button class="btn btn-success cht" data-toggle="modal" data-target="#chatModal"  chatterid="{{$anonyUser->id}}" chattername="{{$anonyUser->nick_name}}" >
                                                    Chat
                                                </button><br>&nbsp;&nbsp;

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
        <div class="modal-content panel panel-default chat-panel {{($messageCount>5)? '':''}}">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">
                    <a href="#" style="text-decoration: none;">
                        <sup><i class="fa fa-comments"></i></sup>
                        <span id="chatter_name"></span>
                    </a>
                </h4>
            </div>
            <div class="modal-body panel-body">
                <center>
                    <p id="loader" style="display:none"> {{HTML::image("/image/load.gif")}} </p>
                </center>
                <div id="udchat-box">

                </div>    
            </div>
            <div class="panel-footer" style="display:none" id="chat-sms-box" >
                <div class="input-group">
                    <input id="btn-input" required="" type="text" name="message_content" class="form-control input-sm" placeholder="Type your message here..." />
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-warning btn-sm" id="btn-chat" chatter="">
                            <span class="glyphicon glyphicon-send"></span>
                        </button>
                    </span>
                </div>
                {{ Form::close() }}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
>>>>>>> 7617b12d3722c69f3b59aae1b1ecd2cfa1202c39
</div><!-- /.modal -->