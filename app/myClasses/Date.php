<?php

class Date {

    public static function convertTime($time) {
        $time= strtotime($time);
        $ago = time() - $time;

        if ($ago < 60) {
            return "just now";
        } elseif ($ago < 120) {
            return "1 min ago";
        } elseif ($ago < 3600) {
            $convert = floor($ago / 60);
            return "{$convert} mins ago";
        } elseif ($ago < 7200) {
            return "1 hour ago";
        } elseif ($ago < 86400) {
            $convert = floor($ago / (60 * 60));
            return "{$convert} hours ago";
        } elseif ($ago < 172800) {
            return "Yesterday";
        } elseif ($ago < (86400 * 7)) {
            $convert = floor($ago / 86400);
            return "{$convert} days ago";
        } elseif ($ago < (86400 * 14)) {
            return "1 week ago";
        } elseif ($ago < 86400 * 30.4375) {
            $convert = floor($ago / (86400 * 7));
            return "{$convert} weeks ago";
        } elseif ($ago < 86400 * 30.4375 * 12) {
            $convert = floor($ago / (86400 * 30.4375));
            return "{$convert} month ago";
        } elseif ($ago < 86400 * 30.4375 * 24) {
            return "1 year ago";
        } elseif ($ago < 86400 * 30.4375 * 12 * 10) {
            $convert = floor($ago / (86400 * 30.4375 * 12));
            return "{$convert} years ago";
        }
    }
    
    public static function convertTimeToWeeks($timestamp){
        $current_year       = date('Y');
        $year_initiation    = date('Y',strtotime($timestamp));
        
        $current_week    = date("W");
        $initiated_on    = date('W',strtotime($timestamp));
        
        if($year_initiation == $current_year){

            if($initiated_on == ($current_week-1)){
                return "This Week";
            }elseif($initiated_on == ($current_week-2)){
                return "Last Week";
            }else{
                return ($current_week - $initiated_on)." Weeks ago";
            }
        }else{
            $year_difference = ($current_year - $year_initiation);
            $week_difference = abs($current_week - $initiated_on);
            
            return $week_difference + ($year_difference * 52).' Weeks ago';
        }
    }

}
