<?php

class ForumSuggestion extends Eloquent {
    protected $table = 'forum_suggestions';
    
    protected $fillable = array(
        'suggested_by_id',
        'suggestion_content',
        'suggestion_time',
        'suggestion_category',
        'status'
    );
}

