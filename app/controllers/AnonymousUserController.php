<?php

class AnonymousUserController extends \BaseController {


    public function anonymousChatTyping(){
        $receiver_id  = Input::get('cid');
        $sender_id   = Auth::user()->id;

        $message     = Message::whereRaw('sender_id = ? and receiver_id = ? ', array($sender_id, $receiver_id))->count();
        if($message != 0){
            $message = Message::whereRaw('sender_id = ? and receiver_id = ? ', array($sender_id, $receiver_id))->first();
            $message->checking_typing = 1;
            $message->save();
        }
    }

    public function anonymousChatCheckTyping($id){
        $receiver_id  = $id;
        $sender_id   = Auth::user()->id;
        $message     = Message::whereRaw('sender_id = ? and receiver_id = ? ', array($sender_id, $receiver_id))->count();
        if($message != 0){
            $typing = Message::whereRaw('sender_id = ? and receiver_id = ? ', array($sender_id, $receiver_id))->first()->checking_typing;
            if($typing == 1){
                return " is typing ...";
            }else{
                return "";
            }
        }else{
            return " is typing ...";
        }
    }

    public function anonymousUsers(){
        $friend_list=Friend::where('request_id',Auth::user()->id)->where('status',1)
                    ->orWhere('accept_id',Auth::user()->id)->where('status',1)
                    ->get();
        
        $friend_ids=array(Auth::user()->id);
        $friend_count=1;
        foreach($friend_list as $friend){
            if($friend->accept_id != Auth::user()->id){
                $friend_ids[$friend_count]= $friend->accept_id;
                $friend_count++;
            }else{
                $friend_ids[$friend_count]= $friend->request_id;
                $friend_count++;
            }
        }
        
        $anonyUsers=User::where('status',1)
                    ->whereNotIn('id',$friend_ids)
                    ->get();
        
        Session::put('anonyUsers',$anonyUsers);
        
        $anonyChats=Message::where('receiver_id',Auth::user()->id)
                    ->whereNotIn('sender_id',$friend_ids)
                    ->groupBy('sender_id')
                    ->orderBy('updated_at', 'desc')
                    ->get();
        
        Session::put('anonyChats',$anonyChats);
        
        return Redirect::route('anonymous');
    }
    
    public function anonymousChat($id){
        $unread_messages = Message::where('sender_id',$id)
                                    ->where('receiver_id',Auth::user()->id)
                                    ->where('status',0)->get();
        
        foreach($unread_messages as $message){
            $message->date_read = date("Y-m-d H:i:s");
            $message->status = 1;
            $message->save();
        }
        
        $messageInfor=Message::where('sender_id',$id)
                                ->where('receiver_id',Auth::user()->id)
                                ->orWhere('sender_id',Auth::user()->id)
                                ->where('receiver_id',$id)
                                ->orderBy('date_sent', 'desc')
                                ->get();
        
        //Session::put('messageInfor',$messageInfor);
        return View::make('loader.chatloader', compact('messageInfor'));
    }

    public function anonymousChatNewChat(){
        return View::make('loader.newmessage');
    }
    
    public function anonymousMessage($id){

        $message = Message::whereRaw('sender_id = ? and receiver_id = ?', array(Auth::user()->id,$id))->first();
        $message->checking_typing = 0;
        $message->save();


        $saveMessage = new Message(array(
            'sender_id' => Auth::user()->id,
            'receiver_id' => $id,
            'message_content' => Input::get('message_content'),
            'date_sent' => date("Y-m-d H:i:s")
            ));
        
//        $saveMessage = Message::create(array(
//            'sender_id' => Auth::user()->id,
//            'receiver_id'=>$id,
//            'message_content'=>Input::get('message_content'),
//            'date_sent'=>date("Y-m-d H:i:s")
//            ));
        
        $saveMessage -> save();


        if($saveMessage){
            $messageInfor =  Message::where('sender_id',$id)
                            ->where('receiver_id',Auth::user()->id)
                            ->orWhere('sender_id',Auth::user()->id)
                            ->where('receiver_id',$id)
                            ->orderBy('date_sent', 'desc')
                            ->get();
            
            Session::put('messageInfor',$messageInfor);
            
            return Redirect::route('anonymous')
                        ->with('global',$id);
            
        }
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