<?php

class Message extends Eloquent{
    protected $table = 'messages';
    
    protected $fillable= array(
        'id',
        'sender_id',
        'receiver_id',
        'message_content',
        'date_sent',
        'date_read',
        'status'
        );
        
    public function sender(){
        return $this->belongsTo('User','sender_id');
    }
    
    public function receiver(){
        return $this->belongsTo('User','receiver_id');
    }
}

