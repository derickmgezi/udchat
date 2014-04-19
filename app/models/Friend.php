<?php

class Friend extends Eloquent{
    
    protected $table = 'friends';
    
    protected $fillable= array(
        'id',
        'request_id',
        'accept_id',
        'status',
        'date_requested',
        'date_accepted'
    );
    
    //Defining Relationships
    public function user_requested(){
        return $this->belogsTo('User','request_id','id');
    }
    
    public function user_accepted(){
        return $this->belogsTo('User','accept_id','id');
    }
    
}
