<?php
class NewsController extends BaseController {
public function news(){
    return View::make('user.news');
    }
}