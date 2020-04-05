<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'category_id','isbn','title','description','image','author','publisher','year','page','status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function book()
    {
        return $this->hasOne(Transaction::class);
    }
    
    public function history()
    {
        return $this->hasMany(History::class);
    }
}
