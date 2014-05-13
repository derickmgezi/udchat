<li>
    <div class="timeline-badge warning">
        <span class="glyphicon glyphicon-hand-up"></span>
    </div>
    <div class="timeline-panel">
        <div class="timeline-heading">
            <h4 class="timeline-title">{{User::find($point_of_addition->ad_by_id)->nick_name}} <button class="btn btn-warning btn-xs">assisted</button> {{User::find($comment->commented_by_id)->nick_name}}</h4>
            <p>
                <small class="text-muted">
                    <span class="glyphicon glyphicon-time"></span> {{Date::convertTime($point_of_addition->ad_time)}} 
                    <strong class="pull-right">
                        <?php $points_of_addition= count(LikedPointOfAddition::where('ad_id',$point_of_addition->id)->get()) ?>
                        @if($points_of_addition == 0)
                            No likes Yet
                        @elseif($points_of_addition == 1)
                            1 like
                        @else
                            {{$points_of_addition}} Likes
                        @endif
                    </strong>
                </small>
            </p>
        </div>
        <div class="timeline-body">
            <p>{{$point_of_addition->ad_content}}</p>
            <hr>
            @if($point_of_addition->ad_by_id == Auth::user()->id)
                <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                        <span class="fa fa-cogs"></span> Manage <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{URL::to('user/editPointOfAdditionModal/'.$point_of_addition->id)}}">
                                <span class="glyphicon glyphicon-edit"></span> Edit
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{URL::to('user/deletePointOfAddition/'.$point_of_addition->id)}}">
                                <span class="glyphicon glyphicon-trash"></span> Delete
                            </a>
                        </li>
                        <!--
                        <li><a href="#">Separated link</a>
                        </li>-->
                    </ul>
                </div>
            @else
                @if(LikedPointOfAddition::where('ad_id',$point_of_addition->id)->where('liked_by_id',Auth::user()->id)->first())
                    <button type="button" class="btn btn-success btn-xs pull-right">
                        <span class="fa fa-thumbs-o-up"></span> Liked
                    </button>
                @else
                    <a href="{{URL::to('user/likePointOfAddition/'.$point_of_addition->id)}}" type="button" class="btn btn-primary btn-xs pull-right">
                        <span class="fa fa-thumbs-o-up"></span> Like
                    </a>
                @endif
            @endif
        </div>
    </div>
</li>