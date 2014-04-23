<?php
class DebateController extends BaseController {
    public function debate(){
    
        return Redirect::route('debatePage');
    }
}