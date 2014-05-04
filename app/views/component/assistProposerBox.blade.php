
<li class="timeline-inverted">
    <div class="timeline-badge info">
        <span class="glyphicon glyphicon-hand-up"></span>
    </div>
    <div class="timeline-panel">
        <div class="timeline-heading">
            <h4 class="timeline-title">{{User::find($point_of_addition->ad_by_id)->nick_name}} <button class="btn btn-info btn-xs">assisted</button> {{User::find($comment->commented_by_id)->nick_name}}</h4>
            <p>
                <small class="text-muted">
                    <span class="glyphicon glyphicon-time"></span> {{Date::convertTime($point_of_addition->ad_time)}} <strong class="pull-right">2 Likes</strong>
                </small>
            </p>
        </div>
        <div class="timeline-body">
            <p>{{$point_of_addition->ad_content}}</p>
            <hr>
            <button type="button" class="btn btn-primary btn-circle pull-right">
                <span class="fa fa-thumbs-up"></span>
            </button>
            <div class="btn-group">
                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                    <span class="fa fa-cogs"></span> 
                    <i class="fa fa-chevron-down"></i>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li data-toggle="modal" data-target="#editModal"><a href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                    </li>
                    <li><a href="#"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                    </li>
                    <!--<li class="divider"></li>
                    <li><a href="#">Separated link</a>
                    </li>-->
                </ul>
            </div>
        </div>
    </div>
</li>