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