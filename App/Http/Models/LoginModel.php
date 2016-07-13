<?php

// use DB as DB;

class LoginModel
{

    public static function UserLogin($data = []){
        // if(count($data) > 0){
        if(
            Request::key('username', $data) && Request::key('password', $data)
        ){
            // search username to the database table
            $FoundUser = self::Find($data['username']);
            if($FoundUser){
                // compare passwords
                if($FoundUser->password === Hash::make($data['password'],$FoundUser->salt)){
                    // remember me 
                    // this is optional
                    Remember::me($FoundUser->user_id);
                    return $FoundUser->user_id;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
        return false;
    }

    public static function Find($user){
        if($user){
            $field = (is_numeric($user)) ? 'user_id' : 'username';
            $data = DB::ready()->get('user',[
                $field,'=',$user
            ])->first();
            return $data;
        }
    }
 
    public function getUsers(){
    	// okay
    	// $members = DB::ready()->get('users',['Username','=','a']);
    	// result
    	// return $members->results();
    	// return $members->first();
    	// return $members->error();
    	// return $members->count();

        // okay
    	// return DB::ready()->insert('users',[
    	// 	'Username'	=> 'hello',
    	// 	'Password'	=> 'world',
    	// 	'Salt'		=> 'salt'
    	// ]);

        // okay
        // return DB::ready()->update('users','UsersId',3,[
        //  'Password'  => 'xlkjadsflkj',
        //  'Username'  => 'lorem',
        // ]);
    }

}
