<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'user_id', 'category_id', 'body','title'
    ];

    public function category(){
        return $this->belongsTo(\App\category::class,'category_id');
    }

    public function user(){
        return $this->belongsTo(\App\user::class,'user_id');
    }

    public static function scopeOrder($select){
        if ($select == 'asc'){
         return Article::orderBy('created_at', 'asc')->paginate(10);}
        elseif($select == 'desc'){
         return Article::orderBy('created_at', 'desc')->paginate(10);
        }
        else{
            return Article::paginate(10);
        }
    }
}
