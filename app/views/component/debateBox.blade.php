<div class="panel panel-default">
    <div class="panel-heading">
        <ul class="chat">
            <li class="left clearfix">
                <a href="#" title="View My Full Profile">
                    <img title="" height="50" width="50" class="img-responsive pull-left img-circle" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIwAAACMCAYAAACuwEE+AAAErUlEQVR4Xu3YwStscRjG8d8QQnZEFkqyY6NE/n0rlOxkS1ZqrCiFe/udOtPcue6YJ889Gc93Vtz7eo/3eT/9zjl6/X7/V+FDAhMm0APMhElR1iQAGCBICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpAcBIcVEMGAxICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpAcBIcVEMGAxICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpAcBIcVEMGAxICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpgakH8/7+Xs7Ozsrz83M5OTkpi4uLfwRwd3dXbm5uyvr6etnf32/+r9/vl6urq1J/tn729vbKxsbGRMF1fb2JfqkOi6YazOvrazk9PS1vb2+l1+v9BaZd7tPT0wBM+zNLS0vl6OioXF5eNtjq13Nzc2Oj7/p6HTqY+FJTC2Z4eXXaj8BcX1+Xh4eHUmvX1taaE6Y9cba3t8vOzs7g+3rKzM/PNyfP8vJyA6j+/P39fXMCra6uDnC6rjfpqTbxNjsonGowFxcX5eDgYHBKDN+S2tvO1tZWub29/RRMC6ieOI+Pj+X4+Licn5+X9iSq6P7H9TrYsfUSUwumTeGjZ4r232ZmZsru7m5zarQnTHtqjJ4w7feT3naGn5m+cj3rNjto9iPBDN9K2tvMZ7ekFkzNvJ4y9YQaflAeB/Sr1+tgz7ZL/DgwCwsLzVtTfdAd/aysrJTNzc3mremjZ5j6TNHeyuoD8MvLy19vUKMn2levZ9tkR41+HJjR1+oWQHvCjHtLmp2dbbDVt67Dw8PmpKlfD79BffZarVzvs7eyjgxIl4kDM+7vMP96vhm+Nalgxl1P2tQ3KZ56MN8kx5hfAzAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gz6G1HzSbXtC7t7AAAAAElFTkSuQmCC">
                </a>
                <div class="chat-body clearfix">
                    <div class="header">
                        <strong class="primary-font">{{User::find(DebateSuggestion::find($most_voted_debate->suggestion_id)->suggested_by_id)->nick_name}}</strong> 
                        <small class="pull-right text-muted">
                            <span class="glyphicon glyphicon-time"></span> {{Date::convertTime(DebateSuggestion::find($most_voted_debate->suggestion_id)->suggestion_time)}}
                        </small>
                    </div>
                    <p>
                        {{DebateSuggestion::find($most_voted_debate->suggestion_id)->suggestion_content}}
                    </p>
                </div>
            </li>
        </ul>
        <div class="btn-group">
            <button type="button" class="btn btn-default btn-lg dropdown-toggle" data-toggle="dropdown">
                <span class="fa fa-cogs">&nbsp;&nbsp;</span><strong>Action </strong> <i class="fa fa-chevron-down"></i>
            </button>
            <ul class="dropdown-menu slidedown">
                <li>
                    <a href="{{URL::to('user/openProposalModal/'.$most_voted_debate->suggestion_id)}}" >
                        <span class="fa fa-thumbs-up"></span> <strong>Propose</strong>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="{{URL::to('user/openOpposalModal/'.$most_voted_debate->suggestion_id)}}">
                        <span class="fa fa-thumbs-down"></span> <strong>Oppose</strong>
                    </a>
                </li>
            </ul>
        </div>
    </div><!-- /.panel-heading -->
    <div class="panel-body">
            <?php 
                $comments=DebateComment::where('suggestion_id',$most_voted_debate->suggestion_id)
                          ->get();  
            ?>
            @if(count($comments)>0)
                <ul class="timeline">
                    @foreach($comments as $comment)
                        @if($comment->comment_type)
                            @include('component.proposerBox')
                        @else
                            @include('component.opposerBox')
                        @endif
                    @endforeach
                </ul>
            @else
                <div class="alert alert-info">No comments yet...</div>
            @endif
    </div><!-- /.panel-body -->
</div><!-- /.panel -->