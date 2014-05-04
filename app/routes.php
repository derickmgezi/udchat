<?php
/*Unauthenticated group*/
Route::group(array('before'=>'guest'),function(){
    //CSRF-Cross Site Request Forgery protection
    Route::group(array('before'=>'csrf'),function(){
        //Create account (POST)
        Route::post('signup',array(
            'as'=>'signup',
            'uses'=>'AccountController@signup'
        ));
        //login to account (POST)
        Route::post('login',array(
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

    Route::get('user/anonymousChatNewChat',array(
        'as'=>'anonymousChatNewChat',
        'uses'=>'AnonymousUserController@anonymousChatNewChat'
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
        'as'=>'friendsPage',
        'uses'=>'PageController@friendsPage'
    ));
    
    Route::get('user/acceptFriendRequest/{id}',array(
        'as'=>'acceptFriendRequest',
        'uses'=>'FriendsController@acceptFriendRequest'
    ));
    
    Route::get('user/denieFriendRequest/{id}',array(
        'as'=>'denieFriendRequest',
        'uses'=>'FriendsController@denieFriendRequest'
    ));
    
    Route::get('user/debate', array(
        'as'=>'debatePage',
        'uses'=>'PageController@debatePage'
    ));
    
    Route::post('user/suggestDebate', array(
        'as'=>'suggestDebate',
        'uses'=>'DebateController@suggestDebate'
    ));
    
    Route::get('user/openDebate',array(
        'as'=>'debate',
        'uses'=>'DebateController@debate'
    ));
    
    Route::get('user/viewDebateSuggestions',array(
        'as'=>'viewDebateSuggestions',
        'uses'=>'DebateController@viewDebateSuggestions'
    ));
    
    Route::get('user/editSuggestedDebate/{id}',array(
        'as'=>'editSuggestedDebate',
        'uses'=>'DebateController@editSuggestedDebate'
    ));
    
    Route::get('user/deleteSuggestedDebate/{id}',array(
        'as'=>'deleteSuggestedDebate',
        'uses'=>'DebateController@deleteSuggestedDebate'
    ));
    
    Route::get('user/voteSuggestedDebate/{id}', array(
        'as'=>'voteSuggestedDebate',
        'uses'=>'DebateController@voteSuggestedDebate'
    ));
    
    Route::get('user/unvoteSuggestedDebate/{id}', array(
        'as'=>'unvoteSuggestedDebate',
        'uses'=>'DebateController@unvoteSuggestedDebate'
    ));
      
    Route::get('user/openProposalModal/{id}', array(
        'as'=>'openProposalModal',
        'uses'=>'DebateController@openProposalModal'
    ));
    
    Route::get('user/openOpposalModal/{id}', array(
        'as'=>'openOpposalModal',
        'uses'=>'DebateController@openOpposalModal'
    ));
    
    Route::post('user/proposeDebate/{id}', array(
        'as'=>'proposeDebate',
        'uses'=>'DebateController@proposeDebate'
    ));
    
    Route::post('user/opposeDebate/{id}', array(
        'as'=>'opposeDebate',
        'uses'=>'DebateController@opposeDebate'
    ));
    
    Route::get('user/likeDebateSuggestionComment/{id}',array(
        'as'=>'likeComment',
        'uses'=>'DebateController@likeComment'
    ));
    
    Route::get('user/editDebateComment/{id}', array(
        'as'=>'editDebateComment',
        'uses'=>'DebateController@editDebateComment'
    ));
    
    Route::get('user/deleteDebateComment/{id}', array(
        'as'=>'deleteDebateComment',
        'uses'=>'DebateController@deleteDebateComment'
    ));
    
    Route::post('user/saveEditedDebateComment/{id}', array(
        'as'=>'saveEditedDebateComment',
        'uses'=>'DebateController@saveEditedDebateComment'
    ));
    
    Route::get('user/pointOfAdditionModal/{id}', array(
        'as'=>'pointOfAdditionModal',
        'uses'=>'DebateController@pointOfAdditionModal'
    ));
    
    Route::post('user/addPointOfAddition/{id}', array(
        'as'=>'addPointOfAddition',
        'uses'=>'DebateController@addPointOfAddition'
    ));
    
    Route::get('user/news',array(
        'as'=>'news',
        'uses'=>'NewsController@news'
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


