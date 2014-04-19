<div class="panel-group" id="accordion">
    <div class="{{(count(Session::get('anonyChats'))>6)? 'chat-panel':''}} panel panel-default">
        <div class="panel-heading row">
            <div class="col-lg-3">
                <button type="button" class="btn btn-primary btn-block" data-parent="#accordion" data-toggle="collapse" data-target="#female">
                    {{(count(Session::get('anonyChats')))}}<sup><span class="glyphicon glyphicon-comment"></span></sup> <srong>Conversations</srong> 
                </button>
            </div>
        </div>
        <div id="female" class="panel-collapse collapse in">
            <div class="panel-body">
                <ul class="chat row">
                    @if((count(Session::get('anonyChats')))>0)
                        @foreach(Session::get('anonyChats') as $anonyChats)
                                <li class="left clearfix col-lg-6">
                                    <a href="#" title="View My Full Profile">
                                        {{HTML::image('image/download.png','',array('height'=>'100','width'=>'100','class'=>'img-responsive pull-left img-circle'))}}
                                    </a>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">&nbsp;&nbsp;&nbsp;<i class="fa fa-male"></i> {{User::find($anonyChats->sender_id)->nick_name}}</strong><br>
                                            <span class="my-font-Antic_Slab">
                                                <?php 
                                                    $unreadMessages=DB::table('messages')
                                                        ->where('receiver_id',Auth::user()->id)
                                                        ->where('sender_id',$anonyChats->sender_id)
                                                        ->where('status',0)
                                                        ->get();
                                                ?>
                                                &nbsp;&nbsp;{{count($unreadMessages)}} unread sms
                                            </span><br>
                                            &nbsp;&nbsp;
                                            <!-- ChatBox trigger modal -->
                                            <a href="{{URL::to("user/anonymousChat/".$anonyChats->sender_id)}}" style="text-decoration: none;">
                                                <button class="btn btn-warning" >
                                                    Chat
                                                </button><br>&nbsp;&nbsp;
                                            </a>  
                                            <small class="text-muted">
                                                <span class="glyphicon glyphicon-time"></span>{{Date::convertTime($anonyChats->date_sent)}}
                                            </small>
                                        </div>
                                    </div>
                                </li>
                        @endforeach
                    @else
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>No previous conversation's</strong>
                        </div>
                    @endif
                </ul>
            </div>
            <div class="panel-footer row">
                <div class="input-group col-lg-6 col-lg-offset-3">
                    <select class="form-control">
                        <option disabled selected>Arrage By...</option>
                        <option>Unread Messages</option>
                        <option>Message Time</option>
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