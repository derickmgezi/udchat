@include('frame.mainHeader+sidebar')

<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">
            <i class="glyphicon glyphicon-fire"></i> Debate
            @if(Session::get('has_suggested') == 0)
                <a class="btn btn-success btn-lg" data-toggle="modal" data-target="#suggestModal">
                    <strong>Suggest</strong>
                </a>
            @else
            <a class="btn btn-success btn-lg disabled" title="Your suggestion was submited">
                    <strong>Suggest</strong>
                </a>
            @endif
            <a href="{{URL::route('viewDebateSuggestions')}}" class="btn btn-warning btn-lg">
                <strong><i class="fa fa-eye"></i> View Suggestions</strong>
            </a>
        </h2>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-lg-8">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#thisWeek" data-toggle="tab"><strong>This Week</strong></a></li>
            <li><a href="#lastWeek" data-toggle="tab"><strong>Last Week</strong></a></li>
            <li class="dropdown">
                <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown"><strong>Last</strong> <i class="fa fa-chevron-down"></i></a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
                    <li><a href="#2Weeks" tabindex="-1" data-toggle="tab"><strong>2 Weeks</strong></a></li>
                    <li><a href="#3Weeks" tabindex="-1" data-toggle="tab"><strong>3 Weeks</strong></a></li>
                </ul>
            </li>
        </ul>
        <br>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="thisWeek">
                @include('component.debateBox')
            </div>
            <div class="tab-pane fade" id="lastWeek">
                @include('component.debateBox')
            </div>
            <div class="tab-pane fade" id="2Weeks">
                @include('component.debateBox')
            </div>
            <div class="tab-pane fade" id="3Weeks">
                @include('component.debateBox')
            </div>
        </div>
    </div><!-- /.col-lg-8 -->
    <div class="col-lg-4">
        @include('component.posterList')
    </div><!-- /.col-lg-4 -->
</div><!-- /.row -->

<!--Suggest modal-->
<div class="modal fade" id="suggestModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content panel panel-default">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><a href="#"><span class="glyphicon glyphicon-pencil"></span> Suggest Debate of the Next Week</a></h4>
            </div>
            {{ Form::open(array('url' => "user/suggestDebate/",'class'=>'form')) }}
            <div class="modal-body panel-body">
                <textarea required name="suggestion_content" class="form-control" rows="3">{{(Session::has('suggestion_id'))? DebateSuggestion::where('id',Session::get('suggestion_id'))->first()->suggestion_content:''}}</textarea>
                <?php Session::forget('suggestion_id'); ?>
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
        <div class="modal-content panel panel-default custom-panel">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><a href="#" style="text-decoration: none;"><span class="fa fa-thumbs-up"></span> Suggestion Success</a></h4>
            </div>
            <div class="modal-body panel-body">
                <div class="alert alert-info"><center><h3><strong class="my-Antic-Slab-Font">Suggestion Added Successfully</strong></h3></center></div>
            </div>
            <div class="modal-footer">
                <a href="{{URL::route('viewDebateSuggestions')}}" class="btn btn-success btn-lg">
                    <strong><i class="fa fa-eye"></i> View Suggestions</strong>
                </a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Suggestions modal-->
<?php 
    $suggestion=Session::get('suggestions');
    $count_suggestions = count($suggestion);
    
    $check_for_vote=DebateSuggestionVote::where('voted_by_id',Auth::user()->id)
                                            ->where(
                                                DB::raw("WEEK(vote_time,1)"),
                                                '=',
                                                date('W',strtotime(date("Y-m-d H:i:s")))
                                            )
                                            ->first();
   
?>            
<div class="modal fade" id="suggestionsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content custom-panel panel panel-default {{($count_suggestions > 5)? 'chat-panel':''}}">
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
                                                {{User::find($suggestion[$count]->suggested_by_id)->nick_name}}
                                            </strong> 
                                            <small class="pull-right text-muted">
                                                <span class="glyphicon glyphicon-time"></span> {{Date::convertTime($suggestion[$count]->suggestion_time)}}
                                            </small>
                                        </div>
                                        <p>
                                            <div>
                                                {{$suggestion[$count]->suggestion_content}}
                                            </div>
                                        </p>
                                        @if($suggestion[$count]->suggested_by_id == Auth::user()->id)
                                            <a href="{{URL::to('user/editSuggestedDebate/'.$suggestion[$count]->id)}}" class="btn btn-warning btn-sm">edit</a>
                                            <a href="{{URL::to('user/deleteSuggestedDebate/'.$suggestion[$count]->id)}}" class="btn btn-danger btn-sm">delete</a>
                                        @else
                                            <?php 
                                                $voted_for=DebateSuggestionVote::where('voted_by_id',Auth::user()->id)
                                                                                ->where('suggestion_id',$suggestion[$count]->id)
                                                                                ->where(
                                                                                    DB::raw("WEEK(vote_time,1)"),
                                                                                    '=',
                                                                                    date('W',strtotime(date("Y-m-d H:i:s")))
                                                                                )
                                                                                ->first();
                                            ?>
                                            @if($voted_for)
                                                <a href="{{URL::to('user/unvoteSuggestedDebate/'.$suggestion[$count]->id)}}" class="btn btn-warning btn-sm">Unvote</a>
                                            @else
                                                <a href="{{URL::to('user/voteSuggestedDebate/'.$suggestion[$count]->id)}}" class="btn btn-primary btn-sm {{(count($check_for_vote) == 1)? 'disabled':''}}">Vote</a>
                                            @endif
                                        @endif
                                        <small class="text-muted pull-right">
                                            <?php 
                                                $votes=DebateSuggestionVote::where('suggestion_id',$suggestion[$count]->id)->get();
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
                                                <span class="glyphicon glyphicon-time"></span> {{Date::convertTime($suggestion[$count]->suggestion_time)}}</small>
                                            <strong class="pull-right primary-font">
                                               {{User::find($suggestion[$count]->suggested_by_id)->nick_name}}
                                            </strong>
                                        </div>
                                        <p>
                                            <div>
                                                {{$suggestion[$count]->suggestion_content}}
                                            </div>
                                        </p>
                                        @if($suggestion[$count]->suggested_by_id == Auth::user()->id)
                                        <div class="pull-right">
                                                <a href="{{URL::to('user/editSuggestedDebate/'.$suggestion[$count]->id)}}" class="btn btn-warning btn-sm">edit</a>
                                                <a href="{{URL::to('user/deleteSuggestedDebate/'.$suggestion[$count]->id)}}" class="btn btn-danger btn-sm">delete</a>
                                            </div>
                                        @else
                                            <?php 
                                                $voted_for=DebateSuggestionVote::where('voted_by_id',Auth::user()->id)
                                                                                ->where('suggestion_id',$suggestion[$count]->id)
                                                                                ->where(
                                                                                    DB::raw("WEEK(vote_time,1)"),
                                                                                    '=',
                                                                                    date('W',strtotime(date("Y-m-d H:i:s")))
                                                                                )
                                                                                ->first();
                                            ?>
                                            @if($voted_for)
                                                <a href="{{URL::to('user/unvoteSuggestedDebate/'.$suggestion[$count]->id)}}" class="btn btn-warning btn-sm pull-right">Unvote</a>
                                            @else
                                                <a href="{{URL::to('user/voteSuggestedDebate/'.$suggestion[$count]->id)}}" class="btn btn-primary btn-sm pull-right {{(count($check_for_vote) == 1)? 'disabled':''}}">Vote</a>
                                            @endif
                                        @endif
                                        <small class="text-muted">
                                            <?php 
                                                $votes=DebateSuggestionVote::where('suggestion_id',$suggestion[$count]->id)->get();
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

@include('frame.mainFooter')