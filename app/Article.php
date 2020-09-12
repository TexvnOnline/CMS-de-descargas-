<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{   
    protected $fillable = [
        'user_id','subcategory_id','slug','title','name','descriptionH','Content','Requirements','Instructions','image','visits','cover','activate',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    public function links(){
        return $this->hasMany(Link::class);
    }
}
