<?php

class FriendsController extends \BaseController {
    
    public function friendList(){
        $friendList=Friend::where('request_id',Auth::user()->id)->where('status',1)
                ->orWhere('accept_id',Auth::user()->id)->where('status',1)
                ->get();
                //->whereNotIn('id', array(1, 2, 3))
        
        Session::put('friendList',$friendList);
        
        $friend_ids=array();
        $friend_count=0;
        
        foreach($friendList as $friend){
            if($friend->request_id != Auth::user()->id){
                $friend_ids[$friend_count]=$friend->request_id;
                $friend_count++;
            }else{
                $friend_ids[$friend_count]=$friend->accept_id;
                $friend_count++;
            }
        }
        
        if(count($friend_ids) != 0){
            $friendChats=Message::where('receiver_id',Auth::user()->id)
                    ->whereIn('sender_id',$friend_ids)
                    ->orderBy('date_sent', 'desc')
                    ->groupBy('sender_id')
                    ->get();
        }else{
            $friendChats=array();
        }
        
        Session::put('friendChats',$friendChats);
        
        $friend_requests=Friend::where('accept_id',Auth::user()->id)
                        ->where('status',0)
                        ->orderBy('date_requested')
                        ->get();

        Session::put('friend_requests',$friend_requests);
        
        return Redirect::route('friends');
    }
    
    public function friendChat($id){
        DB::table('messages')
            ->where('sender_id',$id)
            ->where('receiver_id',Auth::user()->id)
            ->where('status',0)
            ->update(array(
                'date_read'=>date("Y-m-d H:i:s"),
                'status'=>1
                ));
        
        $messageInfor=DB::table('messages')->where('sender_id',$id)
                            ->where('receiver_id',Auth::user()->id)
                            ->orWhere('sender_id',Auth::user()->id)
                            ->where('receiver_id',$id)
                            ->orderBy('date_sent', 'desc')
                            ->get();
        
        Session::put('messageInfor',$messageInfor);
        //dd(Session::get('messageInfor'));
        return Redirect::route('friends')
                        ->with('global',$id);
    }
    
    public function friendMessage($id){
        $saveMessage = Message::create(array(
            'sender_id' => Auth::user()->id,
            'receiver_id'=>$id,
            'message_content'=>Input::get('message_content'),
            'date_sent'=>date("Y-m-d H:i:s")
            ));
        
        if($saveMessage){
            $messageInfor=DB::table('messages')->where('sender_id',$id)
                            ->where('receiver_id',Auth::user()->id)
                            ->orWhere('sender_id',Auth::user()->id)
                            ->where('receiver_id',$id)
                            ->orderBy('date_sent', 'desc')
                            ->get();
            
            Session::put('messageInfor',$messageInfor);
            
            return Redirect::route('friends')
                        ->with('global',$id);
            
        }
    }
    
    public function accept_friend_request($id){
        $friend_request=Friend::where('request_id',$id)
                        ->where('accept_id',Auth::user()->id)
                        ->first();
        $friend_request->status = 1;
        $friend_request->date_accepted = date("Y-m-d H:i:s");
        $friend_request->save();
        
        return $this->friendList();
    }
    
    public function denie_friend_request($id){
        $friend_request=Friend::where('request_id',$id)
                        ->where('accept_id',Auth::user()->id)
                        ->first();
        
        $friend_request->delete();
        
        return $this->friendList();
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