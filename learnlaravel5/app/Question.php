<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Question extends Model
{
    public function add()
    {
    	if(!userins()->is_logged_in()){
    		return ['status'=>0,'msg'=>'login require'];
        }
        if(!rq('title')){
            return ['status'=>0,'msg'=>'title require'];
        }

        $this->title = rq('title');
        $this->user_id = session('user_id');
        if(rq('desc')){
            $this->desc = rq('desc');
        }
        if($this->save()){
        	return ['status'=>1,'msg'=>'问题发表成功',['id' => $this->id]];
        }
        return ['status'=>0,'msg'=>'问题发表失败'];
    }
}
