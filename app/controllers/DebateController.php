<?php

class DebateController extends \BaseController {
    public function debate(){
        $check_suggestion=DebateSuggestion::where('suggested_by_id',Auth::user()->id)
                                            ->where(
                                                    DB::raw("WEEK(suggestion_time,1)"),
                                                    '=',
                                                    date('W',strtotime(date("Y-m-d H:i:s")))
                                                    )
                                            ->first();
        
        if(count($check_suggestion) == 1){
            Session::put('has_suggested',1);
        }else{
            Session::put('has_suggested',0);
        }
        
        $most_voted_debates=  DebateSuggestionVote::select("suggestion_id",DB::raw("count(voted_by_id) as votes"),DB::raw("week(vote_time,1) as week"))
                                        ->where(
                                                DB::raw("WEEK(vote_time,1)"),
                                                '<=',
                                                date('W',strtotime(date("Y-m-d H:i:s")))
                                                )
                                        ->groupBy('suggestion_id')
                                        ->orderBy(DB::raw("WEEK(vote_time,1)"),'desc')
                                        ->orderBy(DB::raw("count(voted_by_id)"),'desc')
                                        //->groupBy(DB::raw("WEEK(vote_time,1)"))
                                        ->get();
        
        Session::put('most_voted_debates',$most_voted_debates);
        foreach($most_voted_debates as $most_voted_debate){
            echo 'Suggestion id:'.$most_voted_debate->suggestion_id.' votes:'.$most_voted_debate->votes.' week:'.$most_voted_debate->week.'<br><br>';
        }
    
        return Redirect::route('debatePage');
    }
    
    public function suggestDebate() {
        $edit_suggestion=DebateSuggestion::where('suggested_by_id',Auth::user()->id)
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
            $new_suggestion= new  DebateSuggestion;
            $new_suggestion->suggested_by_id = Auth::user()->id;
            $new_suggestion->suggestion_content = Input::get('suggestion_content');
            $new_suggestion->suggestion_time = date("Y-m-d H:i:s");
            $new_suggestion->save(); 
        }
        
        return $this->debate()
                    ->with('global','success_message');
    }
    
    public function viewDebateSuggestions() {
        $suggestions=DebateSuggestion::where(
                                        DB::raw("WEEK(suggestion_time,1)"),
                                        '=',
                                        date('W',strtotime(date("Y-m-d H:i:s")))
                                        )
                                        ->orderBy('suggestion_time','desc')
                                        ->get();
        
        Session::put('suggestions',$suggestions);
        
        return $this->debate()
                    ->with('global','debate_suggestions');
    }
    
    public function editSuggestedDebate($id) {
        Session::put('suggestion_id',$id);
        
         return Redirect::route('debatePage')
                        ->with('global','edit_suggestion');
    }
    
    public function deleteSuggestedDebate($id) {
        DebateSuggestion::where('id',$id)->delete();
        
        return $this->viewDebateSuggestions();
    }
    
    public function voteSuggestedDebate($id) {
        $new_vote= new DebateSuggestionVote;
        
        $new_vote->suggestion_id = $id;
        $new_vote->voted_by_id = Auth::user()->id;
        $new_vote->vote_time = date("Y-m-d H:i:s");
        
        $new_vote->save();
        
        return $this->viewDebateSuggestions();
    }
    
    public function unvoteSuggestedDebate($id) {
        $remove_vote=DebateSuggestionVote::where('suggestion_id',$id)
                                            ->where('voted_by_id',Auth::user()->id)
                                            ->first();
        $remove_vote->delete();
        
        return $this->viewDebateSuggestions();
    }
    
    public function openProposalModal($id){
        $propose_suggestion_modal = DebateSuggestion::find($id);
        
        Session::put('propose_suggestion_modal',$propose_suggestion_modal);
        
        return Redirect::route('debatePage');
    }
    
    public function openOpposalModal($id){
        $oppose_suggestion_modal = DebateSuggestion::find($id);
        
        Session::put('oppose_suggestion_modal',$oppose_suggestion_modal);
        
        return Redirect::route('debatePage');
    }
    
    public function proposeDebate($id){
        $proposal = new DebateComment;
        $proposal->suggestion_id = $id;
        $proposal->commented_by_id = Auth::user()->id;
        $proposal->comment_content = Input::get('proposal_content');
        $proposal->comment_type = 1;
        $proposal->comment_time = date("Y-m-d H:i:s");
        
        $proposal->save();
        
        return Redirect::route('debatePage');
    }
    
    public function opposeDebate($id) {
        $opposal = new DebateComment;
        $opposal->suggestion_id = $id;
        $opposal->commented_by_id = Auth::user()->id;
        $opposal->comment_content = Input::get('opposal_content');
        $opposal->comment_type = 0;
        $opposal->comment_time = date("Y-m-d H:i:s");
        
        $opposal->save();
        
        return Redirect::route('debatePage');
    }

    public function likeComment($id) {
        $like_comment = new LikedDebateComment;
        $like_comment->comment_id = $id;
        $like_comment->liked_by_id = Auth::user()->id;
        $like_comment->time_liked = date("Y-m-d H:i:s");
        
        $like_comment->save();
        
        return Redirect::route('debatePage');
    }
    
    public function editDebateComment($id) {
        $debate_comment = DebateComment::find($id);
        
        Session::put('debate_comment',$debate_comment);
        
        return Redirect::route('debatePage');
    }
    
    public function saveEditedDebateComment($id) {
        $save_edited_debate_comment = DebateComment::find($id);
        $save_edited_debate_comment->comment_content = Input::get('edited_comment');
        $save_edited_debate_comment->save();
        
        return Redirect::route('debatePage');
    }
    
    public function deleteDebateComment($id) {
        $delete_debate_comment = DebateComment::find($id);
        $delete_debate_comment->delete();
        
        return Redirect::route('debatePage');
    }
    
    public function pointOfAdditionModal($id) {
        $debate_comment_infor = DebateComment::find($id);
        
        Session::put('debate_comment_infor',$debate_comment_infor);
        
        return Redirect::route('debatePage');
    }
    
    public function addPointOfAddition($id) {
        $add_point_of_addition = new PointOfAddition;
        $add_point_of_addition->comment_id = $id;
        $add_point_of_addition->ad_by_id = Auth::user()->id;
        $add_point_of_addition->ad_content = Input::get('point_of_addition');
        $add_point_of_addition->ad_time = date("Y-m-d H:i:s");
        $add_point_of_addition->save();
        
        return Redirect::route('debatePage');
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