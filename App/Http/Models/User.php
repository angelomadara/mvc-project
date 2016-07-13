<?php


// use DB as DB;

class User
{
    public $x;

	public static function create($fields = []){
		return DB::ready()->insert('user',$fields);
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

    public static function sample(){
        return 'hello';
    }

    public static function raw(){
        return DB::select('user as t1')
                        ->fields(['t1.username','t1.password','t1.name as fullname','t3.*'])
                        // ->where('t1.username','LIKE','juandelacruz')
                        ->leftjoin('user_session as t2','t1.user_id','=','t2.user_id')
                        ->leftjoin('groups as t3','t1.user_group','=','t3.group_id')
                        ->fetchAll();
        // return DBRAW::raw("SELECT * FROM user",[]);
    }
}