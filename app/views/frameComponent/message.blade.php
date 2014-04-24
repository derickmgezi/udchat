<li class="dropdown messages-dropdown">
    <?php 
        $unreadMessages=Message::where('status',0)
                        ->where('receiver_id',Auth::user()->id)
                        ->orderBy('date_sent','desc')
                        ->get();
        $countUnreadMeassages = count($unreadMessages);
        
        $sentBy=Message::where('status',0)
                        ->where('receiver_id',Auth::user()->id)
                        ->orderBy('date_sent','desc')
                        ->groupBy('sender_id')
                        ->get();
    ?>
    @if($countUnreadMeassages > 0)
    <a class="dropdown-toggle hidden-xs hidden-sm" data-toggle="dropdown" href="#">
        <span class="glyphicon glyphicon-envelope"></span> <strong >Messages</strong> <span class="badge">{{$countUnreadMeassages}}</span>  <i class="fa fa-chevron-down"></i>
    </a>
    <a class="dropdown-toggle visible-xs visible-sm" data-toggle="dropdown" href="#">
        <span class="glyphicon glyphicon-envelope"></span>
        <span class="badge">{{count($unreadMessages)}}</span>  <i class="fa fa-chevron-down"></i>
    </a>
    <ul class="dropdown-menu">
        @foreach($sentBy as $unreadMessage)
            <li class="{{(isset($line))? 'divider':''}}"></li>
            <li class="dropdown-header">{{count(Message::where('status',0)->where('receiver_id',Auth::user()->id)->where('sender_id',$unreadMessage->sender_id)->get())}} Unread Messages</li>
            <li class="message-preview">
                <a href="#">
                    <span class="avatar">{{HTML::image('image/50x50.gif','',array('class'=>'responsive','height'=>'50','width'=>'50'))}}</span>
                    <span class="name">{{User::find($unreadMessage->sender_id)->nick_name}}:</span>
                    <span class="message">{{Str::limit($unreadMessage->message_content,65,'...')}}</span>{{(strlen($unreadMessage->message_content) < 30)? '<br>':''}}
                    <span class="time"><i class="fa fa-clock-o"></i> {{Date::convertTime($unreadMessage->date_sent)}}</span>
                </a>
            </li>
            <?php $line=''; ?>
        @endforeach
        <li class="divider"></li>
        <li>
            <a class="text-center" href="#">
                <strong>Read All Messages</strong>
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </li>
    </ul>
    @endif
    <!-- /.dropdown-messages -->
</li><!-- /.dropdown -->
