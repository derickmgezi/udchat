<?php
/*Unauthenticated group*/
Route::group(array('before'=>'guest'),function(){
    //CSRF-Cross Site Request Forgery protection
    Route::group(array('before'=>'csrf'),function(){
        //Create account (POST)
        Route::post('home',array(
            'as'=>'signup',
            'uses'=>'AccountController@signup'
        ));
        //login to account (POST)
        Route::post('/',array(
            'as'=>'login',
            'uses'=>'AccountController@login'
        ));
    });
    //End CSRF-Cross Site Request Forgery protection
    
    //Create account (GET)
    Route::get('/',array(
        'as'=>'signupPage',
        'uses'=>'PageController@signupPage'
    ));
    
    Route::get('home/login',array(
        'as'=>'loginPage',
        'uses'=>'LoginController@loginPage'
    ));

});
/*End of Unauthenticated group*/

/*Authenticated group*/
Route::group(array('before'=>'auth'),function(){
    //Signout (GET)
    Route::get('/user/signout',array(
        'as'=>'signout',
        'uses'=>'AccountController@signout'
    ));
    
    Route::get('user/anonymousUsers',array(
        'as'=>'anonymousUsers',
        'uses'=>'AnonymousUserController@anonymousUsers'
    ));
    
    Route::get('user/anonymous',array(
        'as'=>'anonymous',
        'uses'=>'PageController@anonymous'
    ));
    
    Route::get('user/anonymousChat/{id}',array(
        'as'=>'anonymousChat',
        'uses'=>'AnonymousUserController@anonymousChat'
    ));

    Route::post('user/anonymousMessage/{id}',array(
        'as'=>'anonymousMessage',
        'uses'=>'AnonymousUserController@anonymousMessage'
    ));

    Route::get('user/friendList',array(
        'as'=>'friendList',
        'uses'=>'FriendsController@friendList'
    ));
    
    Route::get('user/friendChat/{id}',array(
        'as'=>'friendChat',
        'uses'=>'FriendsController@friendChat'
    ));
    
    Route::post('user/friendMessage/{id}',array(
        'as'=>'friendMessage',
        'uses'=>'FriendsController@friendMessage'
    ));
    
    Route::get('user/friends',array(
        'as'=>'friends',
        'uses'=>'PageController@friends'
    ));
    
    Route::get('user/accept_friend_request/{id}',array(
        'as'=>'accept_friend_request',
        'uses'=>'FriendsController@accept_friend_request'
    ));
    
    Route::get('user/denie_friend_request/{id}',array(
        'as'=>'denie_friend_request',
        'uses'=>'FriendsController@denie_friend_request'
    ));
       
    Route::get('user/news',array(
        'as'=>'news',
        'uses'=>'NewsController@news'
    ));
    
    Route::get('user/debate',array(
        'as'=>'debate',
        'uses'=>'DebateController@debate'
    ));

    Route::get('user/forum/education',array(
        'as'=>'education',
        'uses'=>'EducationController@education'
    ));

    Route::get('user/forum/politics',array(
        'as'=>'politics',
        'uses'=>'PoliticsController@politics'
    ));

    Route::get('user/forum/social',array(
        'as'=>'social',
        'uses'=>'SocialController@social'
    ));

    Route::get('user/regular',array(
        'as'=>'regular',
        'uses'=>'RegularController@regular'
    ));

    Route::get('user/business',array(
        'as'=>'business',
        'uses'=>'BusinessController@business'
    ));
    
});
/*End of Authenticated group*/


