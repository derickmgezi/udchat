<?php

class ForumController extends \BaseController {
    public function education(){
        $check_suggestion=ForumSuggestion::where('suggested_by_id',Auth::user()->id)
                                            ->where('suggestion_category','educational')
                                            ->where(
                                                    DB::raw("WEEK(suggestion_time,1)"),
                                                    '=',
                                                    date('W',strtotime(date("Y-m-d H:i:s")))
                                                    )
                                            ->first();
        
        if(count($check_suggestion) == 1){
            Session::put('has_suggested_educational_forum',1);
        }else{
            Session::put('has_suggested_educational_forum',0);
        }
        
        $most_voted_educational_suggestions =  ForumSuggestionVote::select("suggestion_id",DB::raw("count(voted_by_id) as votes"),DB::raw("week(vote_time,1) as week"))
                                        ->where(
                                                DB::raw("WEEK(vote_time,1)"),
                                                '<',
                                                date('W',strtotime(date("Y-m-d H:i:s")))
                                                )
                                        ->groupBy('suggestion_id')
                                        ->orderBy(DB::raw("WEEK(vote_time,1)"),'desc')
                                        ->orderBy(DB::raw("count(voted_by_id)"),'desc')
                                        //->groupBy(DB::raw("WEEK(vote_time,1)"))
                                        ->get();
        
        Session::put('most_voted_educational_suggestions',$most_voted_educational_suggestions);
        
        foreach(Session::get('most_voted_educational_suggestions') as $most_voted_educational_suggestion){
            echo 'id: '.$most_voted_educational_suggestion->suggestion_id.' votes: '.$most_voted_educational_suggestion->votes.' week: '.$most_voted_educational_suggestion->week.'<br>';
        }
        
        return Redirect::route('educationPage');
    }
    
    public function suggestEducationalForum() {
        $edit_suggestion=ForumSuggestion::where('suggested_by_id',Auth::user()->id)
                                            ->where(
                                                    DB::raw("WEEK(suggestion_time,1)"),
                                                    '=',
                                                    date('W',strtotime(date("Y-m-d H:i:s")))
                                                    )
                                            ->first();
        
        if(count($edit_suggestion) == 1){
            $edit_suggestion->suggestion_content = Input::get('suggestion_content');
            $edit_suggestion->save();
        }else{
            $new_suggestion= new  ForumSuggestion;
            $new_suggestion->suggested_by_id = Auth::user()->id;
            $new_suggestion->suggestion_content = Input::get('suggestion_content');
            $new_suggestion->suggestion_time = date("Y-m-d H:i:s");
            $new_suggestion->suggestion_category = 'educational';
            $new_suggestion->save(); 
        }
        
        return $this->education()
                    ->with('global','edit_educational_forum_success_message');
    }
    
    public function viewEducationalSuggestions() {
        $educational_suggestions=ForumSuggestion::where(
                                        DB::raw("WEEK(suggestion_time,1)"),
                                        '=',
                                        date('W',strtotime(date("Y-m-d H:i:s")))
                                        )
                                        ->where('suggestion_category','educational')
                                        ->orderBy('suggestion_time','desc')
                                        ->get();
        
        Session::put('educational_suggestions',$educational_suggestions);
        
        return $this->education()
                    ->with('global','educational_suggestions');
    }
    
    public function editSuggestedEducationalForumModal($id) {
        Session::put('educational_suggestion_id',$id);
        
         return Redirect::route('educationPage')
                        ->with('global','edit_educational_suggestion');
    }
    
    public function deleteSuggestedEducationalForum($id) {
        $educational_forum = ForumSuggestion::find($id);
        
        $educational_forum->delete();
        
        return $this->viewEducationalSuggestions();
    }
    
    public function voteSuggestedEducationalForum($id) {
        $new_vote= new ForumSuggestionVote;
        
        $new_vote->suggestion_id = $id;
        $new_vote->voted_by_id = Auth::user()->id;
        $new_vote->vote_time = date("Y-m-d H:i:s");
        
        $new_vote->save();
        
        return $this->viewEducationalSuggestions();
    }
    
    public function unvoteSuggestedEducationalForum($id) {
        $remove_vote=ForumSuggestionVote::where('suggestion_id',$id)
                                            ->where('voted_by_id',Auth::user()->id)
                                            ->first();
        $remove_vote->delete();
        
        return $this->viewEducationalSuggestions();
    }
    
    public function openEducationalCommentModal($id){
        $educational_comment_modal = ForumSuggestion::find($id);
        
        Session::put('educational_comment_modal',$educational_comment_modal);
        
        return Redirect::route('educationPage');
    }
    
    public function addEducationalComment($id){
        $educational_comment = new ForumComment;
        $educational_comment->suggestion_id = $id;
        $educational_comment->commented_by_id = Auth::user()->id;
        $educational_comment->comment_content = Input::get('educational_comment');
        $educational_comment->comment_time = date("Y-m-d H:i:s");
        
        $educational_comment->save();
        
        return Redirect::route('educationPage');
    }
    
    public function editEducationalCommentModal($id) {
        $edit_educational_comment_modal = ForumComment::find($id);
        
        Session::put('edit_educational_comment_modal',$edit_educational_comment_modal);
        
        return Redirect::route('educationPage');
    }
    
    public function editEducationalComment($id) {
        $save_edited_educational_comment = ForumComment::find($id);
        $save_edited_educational_comment->comment_content = Input::get('edited_educational_comment');
        $save_edited_educational_comment->save();
        
        return Redirect::route('educationPage');
    }
    
    public function deleteEducationalComment($id) {
        $delete_educational_comment = ForumComment::find($id);
        $delete_educational_comment->delete();
        
        return Redirect::route('educationPage');
    }
    
    public function likeEducationalComment($id) {
        $like_educational_comment = new LikedForumComment;
        $like_educational_comment->comment_id = $id;
        $like_educational_comment->liked_by_id = Auth::user()->id;
        $like_educational_comment->time_liked = date("Y-m-d H:i:s");
        
        $like_educational_comment->save();
        
        return Redirect::route('educationPage');
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}