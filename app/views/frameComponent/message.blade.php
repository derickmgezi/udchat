<li class="dropdown">
    <?php 
        $unreadMessages=Message::where('status',0)
                        ->where('receiver_id',Auth::user()->id)
                        ->orderBy('date_sent','desc')
                        ->get();
        $countUnreadMeassages = count($unreadMessages);
    ?>
    @if($countUnreadMeassages > 0)
    <a class="dropdown-toggle hidden-xs hidden-sm" data-toggle="dropdown" href="#">
        <span class="glyphicon glyphicon-envelope"></span> <strong >Messages</strong> <span class="badge">{{$countUnreadMeassages}}</span>  <i class="fa fa-chevron-down"></i>
    </a>
    <a class="dropdown-toggle visible-xs visible-sm" data-toggle="dropdown" href="#">
        <span class="glyphicon glyphicon-envelope"></span>
        <span class="badge">{{count($unreadMessages)}}</span>  <i class="fa fa-chevron-down"></i>
    </a>
    <ul class="dropdown-menu dropdown-messages">
        @foreach($unreadMessages as $unreadMessage)
            <li class="{{(isset($line))? 'divider':''}}"></li>
            <li>
                <a href="#">
                    <div>
                        <strong>{{User::find($unreadMessage->sender_id)->nick_name}}</strong>
                        <span class="pull-right text-muted">
                            <em>{{Date::convertTime($unreadMessage->date_sent)}}</em>
                        </span>
                    </div>
                    <div>{{Str::limit($unreadMessage->message_content,80,'...')}}</div>
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
