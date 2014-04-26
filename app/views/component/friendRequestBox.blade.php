<div class="col-lg-6">
            <div class="panel-group" id="accordion">
                <div class="{{(count(Session::get('friend_requests')) > 3)? 'chat-panel':''}} panel panel-default">
                    <div class="panel-heading row">
                        <div class="col-lg-8">
                            <button type="button" class="btn btn-primary btn-block" data-parent="#accordion" data-toggle="collapse" data-target="#female">
                                {{count(Session::get('friend_requests'))}} <srong>Friend Requests</srong> <span class="glyphicon glyphicon-user"></span> 
                            </button>
                        </div>
                    </div>
                    <div id="female" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <ul class="chat row">
                                @if(count(Session::get('friend_requests')) != 0)
                                    @foreach(Session::get('friend_requests') as $friend_request)
                                            <li class="left clearfix col-lg-12">
                                                <a href="#" title="View My Full Profile">
                                                    <img alt="..." height="80" width="80" class="img-responsive pull-left img-circle" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIwAAACMCAYAAACuwEE+AAAErUlEQVR4Xu3YwStscRjG8d8QQnZEFkqyY6NE/n0rlOxkS1ZqrCiFe/udOtPcue6YJ889Gc93Vtz7eo/3eT/9zjl6/X7/V+FDAhMm0APMhElR1iQAGCBICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpAcBIcVEMGAxICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpAcBIcVEMGAxICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpAcBIcVEMGAxICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpgakH8/7+Xs7Ozsrz83M5OTkpi4uLfwRwd3dXbm5uyvr6etnf32/+r9/vl6urq1J/tn729vbKxsbGRMF1fb2JfqkOi6YazOvrazk9PS1vb2+l1+v9BaZd7tPT0wBM+zNLS0vl6OioXF5eNtjq13Nzc2Oj7/p6HTqY+FJTC2Z4eXXaj8BcX1+Xh4eHUmvX1taaE6Y9cba3t8vOzs7g+3rKzM/PNyfP8vJyA6j+/P39fXMCra6uDnC6rjfpqTbxNjsonGowFxcX5eDgYHBKDN+S2tvO1tZWub29/RRMC6ieOI+Pj+X4+Licn5+X9iSq6P7H9TrYsfUSUwumTeGjZ4r232ZmZsru7m5zarQnTHtqjJ4w7feT3naGn5m+cj3rNjto9iPBDN9K2tvMZ7ekFkzNvJ4y9YQaflAeB/Sr1+tgz7ZL/DgwCwsLzVtTfdAd/aysrJTNzc3mremjZ5j6TNHeyuoD8MvLy19vUKMn2levZ9tkR41+HJjR1+oWQHvCjHtLmp2dbbDVt67Dw8PmpKlfD79BffZarVzvs7eyjgxIl4kDM+7vMP96vhm+Nalgxl1P2tQ3KZ56MN8kx5hfAzAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gz6G1HzSbXtC7t7AAAAAElFTkSuQmCC">
                                                </a>
                                                <div class="chat-body clearfix">
                                                    <div class="header">
                                                        <strong class="primary-font">&nbsp;&nbsp;&nbsp;<i class="fa fa-male"></i> {{User::find($friend_request->request_id)->nick_name}}</strong><br>
                                                        &nbsp;&nbsp;
                                                        <a href="{{URL::to("user/acceptFriendRequest/".$friend_request->request_id)}}" style="text-decoration: none;">
                                                            <button class="btn btn-success">
                                                                Accept
                                                            </button>
                                                        </a>
                                                        <a href="{{URL::to("user/denieFriendRequest/".$friend_request->request_id)}}" style="text-decoration: none;">
                                                            <button class="btn btn-danger">
                                                                Deny
                                                            </button><br>&nbsp;&nbsp; 
                                                        </a>
                                                        <small class="text-muted">
                                                            <span class="glyphicon glyphicon-time"></span>2 min ago
                                                        </small>
                                                    </div>
                                                </div>
                                            </li>
                                    @endforeach
                                @else
                                    <div class="alert alert-info alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <strong>You have no friend requests</strong>
                                    </div>
                                @endif
                            </ul>
                        </div>
                        <div class="panel-footer row">
                            <div class="input-group col-lg-7 col-lg-offset-3">
                                <select class="form-control">
                                    <option disabled selected>Arrage By...</option>
                                    <option>Gender</option>
                                    <option>Request Time</option>
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