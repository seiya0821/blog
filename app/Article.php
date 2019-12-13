<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public static function scopeOrder($select){
        if ($select == 'asc'){
         return Article::orderBy('created_at', 'asc')->paginate(10);
        }
        elseif($select == 'desc'){
         return Article::orderBy('created_at', 'desc')->paginate(10);
        }
        else{
            return Article::paginate(10);
        }
    }
}
