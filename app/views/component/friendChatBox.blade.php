<div class="col-lg-12">
    <div class="panel-group" id="accordion">
        <div class="panel panel-default {{(count(Session::get('friendList')) > 9)? 'chat-panel':''}}">
            <div class="panel-heading row">
                <div class="input-group col-lg-5">
                    <input type="text" placeholder="Search For Female Friends..." class="form-control">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
                </div><!-- /input-group -->
                <div class="col-lg-offset-4 col-lg-3">
                    <button type="button" class="btn btn-primary btn-block" data-parent="#accordion" data-toggle="collapse" data-target="#female">
                        {{count(Session::get('friendList'))}} <srong>Friends</srong> <span class="glyphicon glyphicon-user"></span> 
                    </button>
                </div>
            </div>
            <div id="female" class="panel-collapse collapse in">
                <div class="panel-body">
                    <ul class="chat row">
                        @if(count(Session::get('friendList'))>0)
                            @foreach(Session::get('friendList') as $friend)
                                <li class="left clearfix col-lg-4">
                                    <a href="#" title="View My Full Profile">
                                        {{HTML::image('image/Capture.png','',array('height'=>'80','width'=>'80','class'=>'img-responsive pull-left img-circle'))}}
                                    </a>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">
                                                &nbsp;&nbsp;
                                                <i class="fa fa-male"></i>
                                                {{(User::find($friend->request_id)->id == Auth::user()->id)? Str::limit(User::find($friend->accept_id)->nick_name,10,'...'):Str::limit(User::find($friend->request_id)->nick_name,10,'...')}}
                                            </strong><br>
                                            &nbsp;&nbsp;
                                            <!-- ChatBox trigger modal -->
                                            <a href="{{URL::to("user/friendChat/".((User::find($friend->request_id)->id == Auth::user()->id)? $friend->accept_id:$friend->request_id))}}" style="text-decoration: none;">
                                                <button class="btn btn-{{(((User::find($friend->request_id)->id == Auth::user()->id)? User::find($friend->accept_id)->status:User::find($friend->request_id)->status) == 1)? 'success':'info'}}">
                                                    {{(((User::find($friend->request_id)->id == Auth::user()->id)? User::find($friend->accept_id)->status:User::find($friend->request_id)->status) == 1)? 'Chat':'Text'}}
                                                </button>
                                            </a>
                                            <br>&nbsp;&nbsp; 
                                            <small class="text-muted">
                                                <span class="glyphicon glyphicon-time"></span>
                                                {{Date::convertTime((User::find($friend->request_id)->id == Auth::user()->id)? User::find($friend->accept_id)->login:User::find($friend->request_id)->login)}}
                                            </small>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>You have no UDCHAT friends so far</strong>
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
</div><!-- /.col-lg-12 -->

<!--Chat Box Modal -->
<?php
    $messgaeInfor=Session::get("messageInfor");
    $messageCount=count($messgaeInfor);
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
                            <li class="{{($messgaeInfor[$message]->sender_id == Auth::user()->id)? 'right':'left'}} clearfix">
                                <a href="#" title="View My Full Profile">
                                    <img alt="..." height="50" width="50" class="img-responsive {{($messgaeInfor[$message]->sender_id == Auth::user()->id)? 'pull-right':'pull-left'}} img-circle" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIwAAACMCAYAAACuwEE+AAAErUlEQVR4Xu3YwStscRjG8d8QQnZEFkqyY6NE/n0rlOxkS1ZqrCiFe/udOtPcue6YJ889Gc93Vtz7eo/3eT/9zjl6/X7/V+FDAhMm0APMhElR1iQAGCBICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpAcBIcVEMGAxICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpAcBIcVEMGAxICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpAcBIcVEMGAxICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpgakH8/7+Xs7Ozsrz83M5OTkpi4uLfwRwd3dXbm5uyvr6etnf32/+r9/vl6urq1J/tn729vbKxsbGRMF1fb2JfqkOi6YazOvrazk9PS1vb2+l1+v9BaZd7tPT0wBM+zNLS0vl6OioXF5eNtjq13Nzc2Oj7/p6HTqY+FJTC2Z4eXXaj8BcX1+Xh4eHUmvX1taaE6Y9cba3t8vOzs7g+3rKzM/PNyfP8vJyA6j+/P39fXMCra6uDnC6rjfpqTbxNjsonGowFxcX5eDgYHBKDN+S2tvO1tZWub29/RRMC6ieOI+Pj+X4+Licn5+X9iSq6P7H9TrYsfUSUwumTeGjZ4r232ZmZsru7m5zarQnTHtqjJ4w7feT3naGn5m+cj3rNjto9iPBDN9K2tvMZ7ekFkzNvJ4y9YQaflAeB/Sr1+tgz7ZL/DgwCwsLzVtTfdAd/aysrJTNzc3mremjZ5j6TNHeyuoD8MvLy19vUKMn2levZ9tkR41+HJjR1+oWQHvCjHtLmp2dbbDVt67Dw8PmpKlfD79BffZarVzvs7eyjgxIl4kDM+7vMP96vhm+Nalgxl1P2tQ3KZ56MN8kx5hfAzAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gz6G1HzSbXtC7t7AAAAAElFTkSuQmCC">
                                </a>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <strong class="{{($messgaeInfor[$message]->sender_id == Auth::user()->id)? 'pull-right':''}} primary-font">{{User::find($messgaeInfor[$message]->sender_id)->nick_name}}</strong> 
                                        <small class="{{($messgaeInfor[$message]->sender_id == Auth::user()->id)? '':'pull-right'}} text-muted">
                                            <span class="glyphicon glyphicon-time"></span> {{Date::convertTime($messgaeInfor[$message]->date_sent)}}
                                        </small>
                                    </div>
                                    <p>
                                       <div>
                                            {{ $messgaeInfor[$message]->message_content }}
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
                {{ Form::open(array('url' => "user/friendMessage/".Session::get('global'),'class'=>'form')) }}
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