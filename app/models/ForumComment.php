<?php

class ForumComment extends Eloquent{
    protected $table = 'forum_suggestion_comments';
    
    protected $fillable = array(
        'suggestion_id',
        'commented_by_id',
        'comment_content',
        'comment_time',
        'status'
    );
}

