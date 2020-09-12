<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'article_id','icon','name','url','color',
    ];
    public function article(){
        return $this->belongsTo(Article::class);
    }
}
