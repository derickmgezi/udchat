<?php

class DebateComment extends Eloquent {
    protected $table='debate_suggestion_comments';
    
    protected $fillable= array(
        'suggestion_id',
        'commented_by_id',
        'comment_type',
        'comment_content',
        'comment_time',
        'status'
    );
    
}