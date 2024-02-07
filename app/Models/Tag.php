<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
    public function authors()
    {
       return $this->hasMany(Author::class);
    }
}
