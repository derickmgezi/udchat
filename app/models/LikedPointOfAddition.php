<?php

class LikedPointOfAddition extends Eloquent{
    protected $table = 'point_of_addition_likes';
    
    protected $fillable = array(
        'ad_id',
        'liked_by_id',
        'time_liked',
        'status'
    );
}

