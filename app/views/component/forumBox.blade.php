<div class="panel panel-default">
    <div class="panel-heading">
        <ul class="chat">
            <li class="left clearfix">
                <a href="#" title="View My Full Profile">
                    {{ HTML::image('image/Capture.PNG', '', array('height'=>'50', 'width'=>'50', 'class'=>'img-responsive pull-left img-circle'))}}
                </a>
                <div class="chat-body clearfix">
                    <div class="header">
                        <strong class="primary-font">{{User::find(ForumSuggestion::find($most_voted_educational_suggestion->suggestion_id)->suggested_by_id)->nick_name}}</strong> 
                        <small class="pull-right text-muted">
                            <span class="glyphicon glyphicon-time"></span> {{Date::convertTime(ForumSuggestion::find($most_voted_educational_suggestion->suggestion_id)->suggestion_time)}}
                        </small>
                    </div>
                    <p>
                        <div>
                            {{ForumSuggestion::find($most_voted_educational_suggestion->suggestion_id)->suggestion_content}}
                        </div>
                    </p>
                </div>
            </li>
        </ul>
        <div class="btn-group">
            <a href="{{URL::to('user/openEducationalCommentModal/'.$most_voted_educational_suggestion->suggestion_id)}}" type="button" class="btn btn-info">
                <span class="fa fa-pencil-square-o">&nbsp;</span><strong>Comment</strong>
            </a>
        </div>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <?php 
                $educational_comments=ForumComment::where('suggestion_id',$most_voted_educational_suggestion->suggestion_id)
                          ->get();
                $count = 0;
        ?>
        @if(count($educational_comments)>0)
            <ul class="chat">
                @foreach($educational_comments as $educational_comment)
                    @if($count % 2 == 0) <?php $count++; ?>
                        <li class="left clearfix">
                            <a href="#" title="View My Full Profile">
                                {{ HTML::image('image/Capture.PNG', '', array('height'=>'50', 'width'=>'50', 'class'=>'img-responsive pull-left img-circle'))}}
                            </a>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">{{User::find($educational_comment->commented_by_id)->nick_name}}</strong> 
                                    <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span> {{Date::convertTime($educational_comment->comment_time)}}
                                    </small>
                                </div>
                                <p>
                                    <div class="text-primary">
                                        {{$educational_comment->comment_content}}
                                    </div>
                                </p>
                                <small class="text-muted">
                                    <span class="pull-right">
                                        <?php 
                                            $educational_comment_likes = LikedForumComment::where('comment_id',$educational_comment->id)->get();
                                        ?>
                                        @if(count($educational_comment_likes) == 0)
                                            No likes yet
                                        @elseif(count($educational_comment_likes) == 1)
                                            1 like
                                        @else
                                            {{count($educational_comment_likes)}} likes
                                        @endif
                                    </span>
                                    @if($educational_comment->commented_by_id == Auth::user()->id)
                                    <a href="{{URL::to('user/editEducationalCommentModal/'.$educational_comment->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> edit</a>
                                        <a href="{{URL::to('user/deleteEducationalComment/'.$educational_comment->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> delete</a>
                                    @else
                                        @if(LikedForumComment::where('comment_id',$educational_comment->id)->where('liked_by_id',Auth::user()->id)->first())
                                        <button class="btn btn-success btn-sm disabled"><i class="fa fa-thumbs-up"></i> You liked this</button>
                                        @else
                                            <a href="{{URL::to('user/likeEducationalComment/'.$educational_comment->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-thumbs-o-up"></i> like</a>
                                        @endif
                                    @endif
                                </small>
                            </div>
                        </li>
                    @else <?php $count++; ?>
                        <li class="right clearfix">
                            <a href="#" title="View My Full Profile">
                                {{ HTML::image('image/Capture.PNG', '', array('height'=>'50', 'width'=>'50', 'class'=>'img-responsive pull-right img-circle'))}}
                            </a>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted">
                                        <span class="glyphicon glyphicon-time"></span> {{Date::convertTime($educational_comment->comment_time)}}</small>
                                    <strong class="pull-right primary-font">{{User::find($educational_comment->commented_by_id)->nick_name}}</strong>
                                </div>
                                <p>
                                    <div class="text-primary">
                                       {{$educational_comment->comment_content}}
                                    </div>
                                </p>
                                <small class="text-muted">
                                    <span>
                                        <?php 
                                            $educational_comment_likes = LikedForumComment::where('comment_id',$educational_comment->id)->get();
                                        ?>
                                        @if(count($educational_comment_likes) == 0)
                                            No likes yet
                                        @elseif(count($educational_comment_likes) == 1)
                                            1 like
                                        @else
                                            {{count($educational_comment_likes)}} likes
                                        @endif
                                    </span>
                                    @if($educational_comment->commented_by_id == Auth::user()->id)
                                        <div class="pull-right">
                                            <a href="{{URL::to('user/editEducationalCommentModal/'.$educational_comment->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> edit</a>
                                            <a href="{{URL::to('user/deleteEducationalComment/'.$educational_comment->id)}}"  class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> delete</a>
                                        </div>
                                    @else
                                        @if(LikedForumComment::where('comment_id',$educational_comment->id)->where('liked_by_id',Auth::user()->id)->first())
                                            <button class="btn btn-success btn-sm disabled pull-right"><i class="fa fa-thumbs-up"></i> You liked this</button>
                                        @else
                                            <a href="{{URL::to('user/likeEducationalComment/'.$educational_comment->id)}}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-thumbs-o-up"></i> like</a>
                                        @endif
                                    @endif
                                </small>
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>
        @else
            <div class="alert alert-info">No comments yet...</div>
        @endif
    </div><!-- /.panel-body -->
</div><!-- /.panel -->
