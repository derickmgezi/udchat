@include('frame.mainHeader+sidebar')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header hidden-xs">
            <div class="alert alert-warning">
                <div class="text-info">
                    <i class="fa fa-book"></i> Education
                    @if(Session::get('has_suggested_educational_forum') == 0)
                        <a class="btn btn-success btn-lg" data-toggle="modal" data-target="#suggestModal">
                            <strong>Suggest</strong>
                        </a>
                    @else
                    <a class="btn btn-success btn-lg disabled" title="Your suggestion was submited">
                            <strong>Suggest</strong>
                        </a>
                    @endif
                    <a href="{{URL::route('viewEducationalSuggestions')}}" type="button" class="btn btn-warning btn-lg">
                        <strong><i class="fa fa-eye"></i> Suggestions</strong>
                    </a>
                </div>
            </div>
        </h2>
        <h2 class="page-header visible-xs">
            <i class="fa fa-book"></i>
            <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#suggestModal">
                <strong>Suggest</strong>
            </button>
            <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#suggestionsModal">
                <strong><i class="fa fa-eye"></i> Suggestions</strong>
            </button>
        </h2>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-lg-8">
            <?php 
                $active_week = 1;
                $active_week_content = 1;
                $check_week_tab = 0;
                $check_week_content = 0;
                $drop_down_menu = 0;
                $most_voted_educational_suggestions = Session::get('most_voted_educational_suggestions');
            ?>
        @if(count($most_voted_educational_suggestions) > 0)
            <ul class="nav nav-tabs">
                @foreach($most_voted_educational_suggestions as $most_voted_educational_suggestion)
                    <?php
                            if($most_voted_educational_suggestion->week == $check_week_tab){
                                continue;
                            }else{
                                $check_week_tab = $most_voted_educational_suggestion->week;
                            } 
                        ?>
                    @if($drop_down_menu != 2)
                        <li class="{{($active_week)? 'active':''}} <?php $active_week=0;?>">
                            <a href="#{{$most_voted_educational_suggestion->suggestion_id}}" data-toggle="tab">
                                <strong>{{Date::convertTimeToWeeks(ForumSuggestion::find($most_voted_educational_suggestion->suggestion_id)->suggestion_time)}}</strong>
                            </a>
                        </li><?php $drop_down_menu++; ?>
                    @else
                        @if($drop_down_menu == 2)<?php $drop_down_menu++;?>
                            <li class="dropdown">
                                <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-chevron-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
                        @endif
                                    <li><a href="#{{$most_voted_educational_suggestion->suggestion_id}}" tabindex="-1" data-toggle="tab">
                                            <strong>{{Date::convertTimeToWeeks(ForumSuggestion::find($most_voted_educational_suggestion->suggestion_id)->suggestion_time)}}</strong>
                                        </a>
                                    </li>
                    @endif
                @endforeach
                                </ul>
                            </li>
            </ul>
            <br>
            <div class="tab-content">
                @foreach($most_voted_educational_suggestions as $most_voted_educational_suggestion)
                    <?php
                        if($most_voted_educational_suggestion->week == $check_week_content){
                            continue;
                        }else{
                            $check_week_content = $most_voted_educational_suggestion->week;
                        } 
                    ?>
                    <div class="tab-pane fade {{($active_week_content)? 'in active':''}} <?php $active_week_content=0;?>" id="{{$most_voted_educational_suggestion->suggestion_id}}">
                        @include('component.forumBox')
                    </div>
                @endforeach
            </div>
        @else
            <div class="panel panel-default">
                <div class="panel-heading">
                    <button type="button" class="btn btn-success btn-sm">Read</button>
                </div>
                <div class="panel-body">
                    <div class="alert alert-warning">
                        BataShop is a secure online shopping application that enable people to sell and buy
                        products of on the Internet.<br>
                    </div>
                    <div class="alert alert-info">
                        <small>
                                Also with BataShop you can buy products of your own choosing, what you need to do is
                                go into the Buy section and select an Item which will be sent to your 
                                <strong><b><abbr title="A container on which things are pushed along">shopping cart</abbr></b></strong> and from there you will be able to buy the product(s).
                        </small>
                    </div>
                    <div class="alert alert-info">
                        <small>
                            BataShop enable's you to upload an Item that you want to sell using the Sell section
                            that is found within the app.<br>
                        </small>
                    </div>
                    <div class="alert alert-success">
                        <small>
                            BataShop ensurers you that all the information you provide is kept confidential and all
                            transaction take place under a highly secure and safe environment.<br>
                        </small>
                    </div>
                </div>
            </div>
        @endif
    </div><!-- /.col-lg-8 -->
    <div class="col-lg-4 visible-lg">
        @include('component.posterList')
    </div><!-- /.col-lg-4 -->
</div><!-- /.row -->

<!--Suggest modal-->
<div class="modal fade" id="suggestModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content panel panel-default">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><a href="#"><span class="glyphicon glyphicon-pencil"></span> Suggest Educational Forum of the Next Week</a></h4>
            </div>
            {{ Form::open(array('url' => "user/suggestEducationalForum/",'class'=>'form')) }}
            <div class="modal-body panel-body">
                <textarea required name="suggestion_content" class="form-control" rows="3">{{(Session::has('educational_suggestion_id'))? ForumSuggestion::where('id',Session::get('educational_suggestion_id'))->first()->suggestion_content:''}}</textarea>
                <?php Session::forget('educational_suggestion_id'); ?>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-lg">Submit Suggestion</button>
            </div>
            {{ Form::close() }}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Success Message modal-->
<div class="modal fade" id="successMessageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content panel panel-default">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><a href="#" style="text-decoration: none;"><span class="fa fa-thumbs-up"></span> Suggestion Success</a></h4>
            </div>
            <div class="modal-body panel-body">
                <div class="alert alert-info"><center><h3><strong class="my-Antic-Slab-Font">Suggestion Added Successfully</strong></h3></center></div>
            </div>
            <div class="modal-footer">
                <a href="{{URL::route('viewEducationalSuggestions')}}" class="btn btn-success btn-lg">
                    <strong><i class="fa fa-eye"></i> View Suggestions</strong>
                </a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Suggestions modal-->
<?php 
    $educational_suggestion=Session::get('educational_suggestions');
    $count_suggestions = count($educational_suggestion);
    
    $check_for_vote=ForumSuggestionVote::where('voted_by_id',Auth::user()->id)
                                            ->where(
                                                DB::raw("WEEK(vote_time,1)"),
                                                '=',
                                                date('W',strtotime(date("Y-m-d H:i:s")))
                                            )
                                            ->first();
   
?> 
<div class="modal fade" id="suggestionsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content panel panel-default">
            <div class="modal-header panel-heading"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><a href="#"><span class="glyphicon glyphicon-inbox"></span> This Week Suggestions</a></h4>
            </div>
            <div class="modal-body panel-body">
                <ul class="chat">
                    @if($count_suggestions > 0)
                        @for($count = 0; $count < $count_suggestions; $count++)
                            @if( $count%2 == 0)
                                <li class="left clearfix">
                                    <a href="#" title="View My Full Profile">
                                        <img alt="..." height="50" width="50" class="img-responsive pull-left img-circle" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIwAAACMCAYAAACuwEE+AAAErUlEQVR4Xu3YwStscRjG8d8QQnZEFkqyY6NE/n0rlOxkS1ZqrCiFe/udOtPcue6YJ889Gc93Vtz7eo/3eT/9zjl6/X7/V+FDAhMm0APMhElR1iQAGCBICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpAcBIcVEMGAxICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpAcBIcVEMGAxICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpAcBIcVEMGAxICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpgakH8/7+Xs7Ozsrz83M5OTkpi4uLfwRwd3dXbm5uyvr6etnf32/+r9/vl6urq1J/tn729vbKxsbGRMF1fb2JfqkOi6YazOvrazk9PS1vb2+l1+v9BaZd7tPT0wBM+zNLS0vl6OioXF5eNtjq13Nzc2Oj7/p6HTqY+FJTC2Z4eXXaj8BcX1+Xh4eHUmvX1taaE6Y9cba3t8vOzs7g+3rKzM/PNyfP8vJyA6j+/P39fXMCra6uDnC6rjfpqTbxNjsonGowFxcX5eDgYHBKDN+S2tvO1tZWub29/RRMC6ieOI+Pj+X4+Licn5+X9iSq6P7H9TrYsfUSUwumTeGjZ4r232ZmZsru7m5zarQnTHtqjJ4w7feT3naGn5m+cj3rNjto9iPBDN9K2tvMZ7ekFkzNvJ4y9YQaflAeB/Sr1+tgz7ZL/DgwCwsLzVtTfdAd/aysrJTNzc3mremjZ5j6TNHeyuoD8MvLy19vUKMn2levZ9tkR41+HJjR1+oWQHvCjHtLmp2dbbDVt67Dw8PmpKlfD79BffZarVzvs7eyjgxIl4kDM+7vMP96vhm+Nalgxl1P2tQ3KZ56MN8kx5hfAzAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gz6G1HzSbXtC7t7AAAAAElFTkSuQmCC">
                                    </a>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">
                                                {{User::find($educational_suggestion[$count]->suggested_by_id)->nick_name}}
                                            </strong> 
                                            <small class="pull-right text-muted">
                                                <span class="glyphicon glyphicon-time"></span> {{Date::convertTime($educational_suggestion[$count]->suggestion_time)}}
                                            </small>
                                        </div>
                                        <p>
                                            <div>
                                                {{$educational_suggestion[$count]->suggestion_content}}
                                            </div>
                                        </p>
                                        @if($educational_suggestion[$count]->suggested_by_id == Auth::user()->id)
                                            <a href="{{URL::to('user/editSuggestedEducationalForum/'.$educational_suggestion[$count]->id)}}" class="btn btn-warning btn-sm">edit</a>
                                            <a href="{{URL::to('user/deleteSuggestedEducationalForum/'.$educational_suggestion[$count]->id)}}" class="btn btn-danger btn-sm">delete</a>
                                        @else
                                            <?php 
                                                $voted_for=ForumSuggestionVote::where('voted_by_id',Auth::user()->id)
                                                                                ->where('suggestion_id',$educational_suggestion[$count]->id)
                                                                                ->where(
                                                                                    DB::raw("WEEK(vote_time,1)"),
                                                                                    '=',
                                                                                    date('W',strtotime(date("Y-m-d H:i:s")))
                                                                                )
                                                                                ->first();
                                            ?>
                                            @if($voted_for)
                                                <a href="{{URL::to('user/unvoteSuggestedEducationalForum/'.$educational_suggestion[$count]->id)}}" class="btn btn-warning btn-sm">Unvote</a>
                                            @else
                                                <a href="{{URL::to('user/voteSuggestedEducationalForum/'.$educational_suggestion[$count]->id)}}" class="btn btn-primary btn-sm {{(count($check_for_vote) == 1)? 'disabled':''}}">Vote</a>
                                            @endif
                                        @endif
                                        <small class="text-muted pull-right">
                                            <?php 
                                                $votes=ForumSuggestionVote::where('suggestion_id',$educational_suggestion[$count]->id)->get();
                                                $count_votes=count($votes);
                                            ?>
                                            @if($count_votes == 0 )
                                                No votes Yet
                                            @elseif($count_votes == 1)
                                                1 person voted
                                            @else
                                                {{$count_votes}} people voted
                                            @endif
                                        </small>
                                    </div>
                                </li>
                            @else
                                <li class="right clearfix">
                                    <a href="#" title="View My Full Profile">
                                        <img alt="..." height="50" width="50" class="img-responsive pull-right img-circle" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIwAAACMCAYAAACuwEE+AAAErUlEQVR4Xu3YwStscRjG8d8QQnZEFkqyY6NE/n0rlOxkS1ZqrCiFe/udOtPcue6YJ889Gc93Vtz7eo/3eT/9zjl6/X7/V+FDAhMm0APMhElR1iQAGCBICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpAcBIcVEMGAxICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpAcBIcVEMGAxICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpAcBIcVEMGAxICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpgakH8/7+Xs7Ozsrz83M5OTkpi4uLfwRwd3dXbm5uyvr6etnf32/+r9/vl6urq1J/tn729vbKxsbGRMF1fb2JfqkOi6YazOvrazk9PS1vb2+l1+v9BaZd7tPT0wBM+zNLS0vl6OioXF5eNtjq13Nzc2Oj7/p6HTqY+FJTC2Z4eXXaj8BcX1+Xh4eHUmvX1taaE6Y9cba3t8vOzs7g+3rKzM/PNyfP8vJyA6j+/P39fXMCra6uDnC6rjfpqTbxNjsonGowFxcX5eDgYHBKDN+S2tvO1tZWub29/RRMC6ieOI+Pj+X4+Licn5+X9iSq6P7H9TrYsfUSUwumTeGjZ4r232ZmZsru7m5zarQnTHtqjJ4w7feT3naGn5m+cj3rNjto9iPBDN9K2tvMZ7ekFkzNvJ4y9YQaflAeB/Sr1+tgz7ZL/DgwCwsLzVtTfdAd/aysrJTNzc3mremjZ5j6TNHeyuoD8MvLy19vUKMn2levZ9tkR41+HJjR1+oWQHvCjHtLmp2dbbDVt67Dw8PmpKlfD79BffZarVzvs7eyjgxIl4kDM+7vMP96vhm+Nalgxl1P2tQ3KZ56MN8kx5hfAzAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gz6G1HzSbXtC7t7AAAAAElFTkSuQmCC">
                                    </a>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <small class=" text-muted">
                                                <span class="glyphicon glyphicon-time"></span> {{Date::convertTime($educational_suggestion[$count]->suggestion_time)}}</small>
                                            <strong class="pull-right primary-font">
                                               {{User::find($educational_suggestion[$count]->suggested_by_id)->nick_name}}
                                            </strong>
                                        </div>
                                        <p>
                                            <div>
                                                {{$educational_suggestion[$count]->suggestion_content}}
                                            </div>
                                        </p>
                                        @if($educational_suggestion[$count]->suggested_by_id == Auth::user()->id)
                                        <div class="pull-right">
                                                <a href="{{URL::to('user/editSuggestedEducationalForum/'.$educational_suggestion[$count]->id)}}" class="btn btn-warning btn-sm">edit</a>
                                                <a href="{{URL::to('user/deleteSuggestedEducationalForum/'.$educational_suggestion[$count]->id)}}" class="btn btn-danger btn-sm">delete</a>
                                            </div>
                                        @else
                                            <?php 
                                                $voted_for=ForumSuggestionVote::where('voted_by_id',Auth::user()->id)
                                                                                ->where('suggestion_id',$educational_suggestion[$count]->id)
                                                                                ->where(
                                                                                    DB::raw("WEEK(vote_time,1)"),
                                                                                    '=',
                                                                                    date('W',strtotime(date("Y-m-d H:i:s")))
                                                                                )
                                                                                ->first();
                                            ?>
                                            @if($voted_for)
                                                <a href="{{URL::to('user/unvoteSuggestedEducationalForum/'.$educational_suggestion[$count]->id)}}" class="btn btn-warning btn-sm pull-right">Unvote</a>
                                            @else
                                                <a href="{{URL::to('user/voteSuggestedEducationalForum/'.$educational_suggestion[$count]->id)}}" class="btn btn-primary btn-sm pull-right {{(count($check_for_vote) == 1)? 'disabled':''}}">Vote</a>
                                            @endif
                                        @endif
                                        <small class="text-muted">
                                            <?php 
                                                $votes=ForumSuggestionVote::where('suggestion_id',$educational_suggestion[$count]->id)->get();
                                                $count_votes=count($votes);
                                            ?>
                                            @if($count_votes == 0 )
                                                No votes Yet
                                            @elseif($count_votes == 1)
                                                1 person voted
                                            @else
                                                {{$count_votes}} people voted
                                            @endif
                                        </small>
                                    </div>
                                </li>
                            @endif
                        @endfor
                    @else
                        <div class="alert alert-info">
                            <center>
                                <h3><strong class="my-Antic-Slab-Font">No Suggestions</strong></h3>
                            </center>
                        </div>
                    @endif
                </ul>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Comment Modal -->
@if(Session::has('educational_comment_modal'))
<div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content panel panel-default">
            <div class="modal-header panel-heading"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><a href="#"><span class="fa fa-comment"></span> Leave a comment</a></h4>
            </div>
            <div class="modal-body panel-body">
                <ul class="chat">
                    <li class="left clearfix">
                        <button type="button" class="btn btn-info btn-circle btn-lg pull-left">
                            <span class="glyphicon glyphicon-user"></span>
                        </button>
                        <div class="chat-body clearfix">
                            <div class="header">
                                <strong class="primary-font">{{User::find((Session::get('educational_comment_modal')->suggested_by_id))->nick_name}}</strong> <button class="btn btn-xs btn-info">suggested the forum</button>
                                <small class="pull-right text-muted">
                                    <span class="glyphicon glyphicon-time"></span> {{Date::convertTime(Session::get('educational_comment_modal')->suggestion_time)}}</small>
                            </div>
                            <p>
                                {{Session::get('educational_comment_modal')->suggestion_content}}
                            </p>
                        </div>
                    </li>
                    {{ Form::open(array('url' => "user/addEducationalComment/".Session::get('educational_comment_modal')->id,'class'=>'form')) }}
                        <div class="input-group">
                            <input id="btn-input" required="" type="text" name="educational_comment" class="form-control input-lg" placeholder="Give us your comment on this here..." />
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-success btn-lg" id="btn-chat">
                                    <span class="fa fa-comment"></span>
                                </button>
                            </span>
                        </div>
                    {{ Form::close() }}
                </ul>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endif

<!--Edit Educational Comment Modal -->
@if(Session::has('edit_educational_comment_modal'))
<div class="modal fade" id="editEducationCommentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content panel panel-default">
            <div class="modal-header panel-heading"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><a href="#"><span class="fa fa-comment"></span> Leave a comment</a></h4>
            </div>
            <div class="modal-body panel-body">
                <ul class="chat">
                    <li class="left clearfix">
                        <button type="button" class="btn btn-info btn-circle btn-lg pull-left">
                            <span class="glyphicon glyphicon-user"></span>
                        </button>
                        <div class="chat-body clearfix">
                            <div class="header">
                                <strong class="primary-font">{{User::find(ForumSuggestion::find((Session::get('edit_educational_comment_modal')->suggestion_id))->suggested_by_id)->nick_name}}</strong> <button class="btn btn-xs btn-info">suggested the forum</button>
                                <small class="pull-right text-muted">
                                    <span class="glyphicon glyphicon-time"></span> {{Date::convertTime(ForumSuggestion::find((Session::get('edit_educational_comment_modal')->suggestion_id))->suggestion_time)}}</small>
                            </div>
                            <p>
                                {{ForumSuggestion::find((Session::get('edit_educational_comment_modal')->suggestion_id))->suggestion_content}}
                            </p>
                        </div>
                    </li>
                    <button type="button" class="btn btn-xs btn-infor"><strong>Edit Your Comment</strong></button>
                    {{ Form::open(array('url' => 'user/editEducationalComment/'.Session::get('edit_educational_comment_modal')->id)) }}
                        <textarea required="" name="edited_educational_comment" class="form-control" rows="5">{{Session::get('edit_educational_comment_modal')->comment_content}}</textarea>
                        <hr>
                        <button type="submit" class="btn btn-primary btn-lg pull-right"><i class="fa fa-save"></i> Save</button>
                    {{Form::close()}}
                </ul>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endif

@include('frame.mainFooter')

