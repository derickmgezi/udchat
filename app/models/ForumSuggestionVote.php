<?php

class ForumSuggestionVote extends Eloquent {
    protected $table = 'forum_suggestion_votes';
    
    protected $fillable = array(
        'suggestion_id',
        'voted_by_id',
        'vote_time',
        'status',
    );
}

