<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {
        
        protected $fillable= array(
            'id',
            'first_name',
            'sir_name',
            'nick_name',
            'gender',
            'bio',
            'firstLogin',
            'login',
            'logout'
            );
        
	protected $table = 'users';

	protected $hidden = array('password');

	//Defining the Validators
        public static function signupValidator($input){
            $rules=array(
                'first_name'=>'required|max:40',
                'sir_name'=>'required|max:40',
                'gender'=>'required',
                'nick_name'=>'required|max:20|unique:users,nick_name'
            );
            return Validator::make($input, $rules);
        }
        
        public static function loginValidator($input){
            $rules=array(
                'f_name'=>'required|max:40',
                's_name'=>'required|max:40',
                'n_name'=>'required|max:20|Exists:users,nick_name'
            );
            return Validator::make($input, $rules);
        }
        
        //Defining Relationships
        public function sent_requests(){
            return $this->hasMany('Friend','request_id');
        }
        
        public function received_requests(){
            return $this->hasMany('Friend','accept_id');
        }
        
        public function sent_messages(){
            return $this->hasMany('Message','sender_id');
        }
        
        public function received_messages(){
            return $this->hasMany('Message','receiver_id');
        }
        
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}
	
	/////////////////////////////
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
		return 'remember_token';
	}

}