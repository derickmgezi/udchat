<?php

class DebateSuggestion extends Eloquent {
    protected $table='debate_suggestions';
    
    protected $fillable= array(
        'suggested_by_id',
        'suggestion_content',
        'suggestion_time',
        'status'
    );
    
    
}

