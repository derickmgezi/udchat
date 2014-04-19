<?php
class AccountController extends BaseController {
    
    public function signup(){
        $validator=User::signupValidator(Input::all());
        
        if($validator->fails()){
            return Redirect::route('signupPage')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('global','signup');
        }else{
            $newUser=User::create(array(
                'first_name'=>Input::get('first_name'),
                'sir_name'=>Input::get('sir_name'),
                'gender'=>Input::get('gender'),
                'nick_name'=>Input::get('nick_name'),
                'first_login'=>date("Y-m-d H:i:s"),
                'login'=>date("Y-m-d H:i:s")
            ));
            if($newUser){
                Auth::login($newUser);
                //dd($newUser);
                return Redirect::to('user/news');
            }
        }
        
    }
    
    public function login(){
        $validator=User::loginValidator(Input::all());
        
        if($validator->fails()){
            return Redirect::route('signupPage')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('global','login');
        }else{
            $user=User::where('first_name',Input::get('f_name'))
                                    ->where('sir_name',Input::get('s_name'))
                                    ->where('nick_name',Input::get('n_name'))
                                    ->first();
            
            if($user){
                Auth::login($user);
                DB::table('users')
                    ->where('id', Auth::user()->id)
                    ->update(array(
                        'status' => 1,
                        'login'=>date("Y-m-d H:i:s")
                        ));
                return Redirect::to('user/news');
               // dd($user);
                
            }else{
                return Redirect::route('signupPage')
                        ->withInput()
                        ->with('global','Account Credentials Dont Match');
                        
            }
        }
    }
    
    public function signout(){
        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(array(
                'status' => 0,
                'logout' => date("Y-m-d H:i:s")
                ));
        
        Auth::logout();
        
        return Redirect::route('signupPage');
    }
}