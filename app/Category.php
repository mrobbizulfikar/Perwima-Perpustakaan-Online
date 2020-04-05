<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name','fine'
    ];

    public function book()
    {
        return $this->hasMany(Book::class);
    }
}
