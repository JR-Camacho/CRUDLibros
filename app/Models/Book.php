<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'gender', 'release_date', 'front_url', 'author_id'];

    public function author(){
        // return $this->hasOne(Author::class);
        return $this->belongsTo(Author::class);
    }
}
