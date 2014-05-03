<?php

class LikedDebateComment extends Eloquent{
    protected $table='debate_suggestion_comment_likes';
    
    protected $fillable=array(
        'comment_id',
        'liked_by_id',
        'time_liked',
        'status'
        );
    
}

