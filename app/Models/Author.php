<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'surnames', 'nationality','gender', 'date_birth', 'date_death', 'photo_url', 'description'];

    public function book(){
        // return $this->hasOne(Author::class);
        return $this->hasMany(Book::class);
    }
}
