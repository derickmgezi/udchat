<li class="timeline-inverted">
    <div class="timeline-badge success" title="Proposing">
        <span class="fa fa-thumbs-up"></span>
    </div>
    <div class="timeline-panel">
        <div class="timeline-heading">
            <h4 class="timeline-title">{{User::find($comment->commented_by_id)->nick_name}} <button class="btn btn-success btn-xs">proposed</button></h4>
            <p>
                <small class="text-muted">
                    <span class="glyphicon glyphicon-time"></span> {{Date::convertTime($comment->comment_time)}} 
                    <strong class="pull-right">
                        @if(LikedDebateComment::where('comment_id',$comment->id)->count() == 0)
                            Not Likes Yet
                        @elseif(LikedDebateComment::where('comment_id',$comment->id)->count() == 1)
                            1 Like
                        @else
                            {{LikedDebateComment::where('comment_id',$comment->id)->count()}} Likes
                        @endif
                    </strong>
                </small>
            </p>
        </div>
        <div class="timeline-body">
            <p>{{$comment->comment_content}}</p>
            <hr>
            @if($comment->commented_by_id != Auth::user()->id)
                <?php 
                    $check_like=LikedDebateComment::where('comment_id',$comment->id)
                                                    ->where('liked_by_id',Auth::user()->id)
                                                    ->first();
                ?>
                @if($check_like)
                    <button type="button" class="btn btn-success disabled pull-right">
                        <span class="fa fa-thumbs-o-up"></span> You liked this
                    </button>
                @else
                    <a href="{{URL::to('user/likeDebateSuggestionComment/'.$comment->id)}}" type="button" class="btn btn-primary pull-right">
                        <span class="fa fa-thumbs-o-up"></span> Like
                    </a>
                @endif
            @endif
            <div class="btn-group">
                @if($comment->commented_by_id != Auth::user()->id)
                <a href="{{URL::to('user/pointOfAdditionModal/'.$comment->id)}}" type="button" class="btn btn-default btn-sm dropdown-toggle"><span class="fa fa-shield"></span> Point of Addition</a>
                @else
                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                    <span class="fa fa-cogs"></span> Manage 
                    <i class="fa fa-chevron-down"></i>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{URL::to('user/editDebateComment/'.$comment->id)}}">
                            <span class="glyphicon glyphicon-edit"></span> Edit
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{URL::to('user/deleteDebateComment/'.$comment->id)}}">
                            <span class="glyphicon glyphicon-trash"></span> Delete
                        </a>
                    </li>
                    <!--<li class="divider"></li>
                    <li><a href="#">Separated link</a>
                    </li>-->
                </ul>
                @endif
            </div>
        </div>
    </div>
</li>
<?php
    $propose_points_of_addition= PointOfAddition::where('comment_id',$comment->id)
                                        ->get();
?>
@if($propose_points_of_addition)
    @foreach($propose_points_of_addition as $point_of_addition)
        @include('component.assistProposerBox')
    @endforeach
@endif
