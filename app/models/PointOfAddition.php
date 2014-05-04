<?php

Class PointOfAddition extends Eloquent {
    protected $table = 'point_of_additions';
            
    protected $fillable = array(
        'comment_id',
        'ad_by_id',
        'ad_content',
        'ad_time',
        'status'
    );
    
    protected $guarded = array(
        'id',
        'created_at',
        'updated_at'
    );
}

