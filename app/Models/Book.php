<?php

namespace App\Models;

use App\Models\Genre;
use App\Models\Author;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    public function review($review) 
    {
        if($review == "true")
            $this->likes++;
        else
            $this->likes--;
        
        $this->save();
        return $this;
    }

    public function imageURL()
    {
        if($this->cover) return 'storage/' . $this->cover;
        return 'images/book.png';
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'book_genre');
    }
}
