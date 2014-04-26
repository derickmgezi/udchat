<?php

Class DebateSuggestionVote extends Eloquent{
    
    protected $table='debate_suggestion_votes';
    
    protected $fillable=array(
        'suggestion_id',
        'voted_by_id',
        'vote_time',
        'status'
    );
    
}

