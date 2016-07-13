<?php 
/**
* 
*/
class Remember{

	public static function me($id){

		$table = 'user_session';
		$field = 'user_id';
		$hashField = 'hash';

        // search if user exist into the user_session table
        $hashCheck = DB::ready()->get($table,[
            $field , '=' , $id
        ])->first();
        // if hashCheck count = 0 then insert new user session
        $hash = Hash::unique();
        if(!$hashCheck){
            DB::ready()->insert($table,[
                $field   => $id,
                $hashField => $hash
            ]);
        }else{
            $hash = $hashCheck->hash;
        }
        // create a cookie for future reference
        Cookie::put([
            'name' => Config::get('remember/cookie_name'),
            'value' => $hash,
            'expiry' => Config::get('remember/cookie_expiry')
        ]);
	}

    public static function check(){
        // remember me settings
        $table = 'user_session';
        $hashField = 'hash';
        $hash = Config::get('remember/cookie_name');
        $data = Cookie::get($hash);

        $isRememberedFound = DB::ready()->get($table,[
            $hashField,'=',$data
        ])->first();

        if($isRememberedFound){
            Session::put(Config::get('session/profile'),$isRememberedFound->user_id);
        }
    }
}